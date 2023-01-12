<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use App\Models\oneChat;
use App\Models\groupChat;
use App\Models\groupInfo;

use Illuminate\Http\Request;
use App\Services\EngrService;
use App\Events\sendVideoevent;
use App\Models\appointmentInfo;
use App\Models\videoConsaltant;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\engrDocumentation;

class engineerController extends Controller
{
    function showengineerpanel()
    {
        return view('engineerpanel.engineer');
    }
    public function newengineerpanel()
    {
        $date = Carbon::today();
        $app = appointmentInfo::where('engrid', Auth::user()->id)->where('meetingdate', '<=', $date)->get();
        $todayclient = appointmentInfo::where('engrid', Auth::user()->id)->where('meetingdate', $date)->get();
        $upcomclient = appointmentInfo::where('engrid', Auth::user()->id)->where('meetingdate', '>', $date)->get();
        return view('newengineerpanel.engineerviewpage')->with(['data' => $app, 'todayclient' => $todayclient, 'upcomclient' => $upcomclient]);
    }
    public function engappointment()
    {
        $date = Carbon::today();
        $app = appointmentInfo::where('engrid', Auth::user()->id)->where('meetingdate', '>=', $date)->where('engrstatus', '!=', 1)->where('engrstatus', '!=', 2)->get();
        return view('engineerappointment.engappiontviewpage')->with(['data' => $app]);
    }
    public function engschedule()
    {
        return view('engineerschedule.engschedulepageview');
    }
    public function engclient()
    {
        $app = appointmentInfo::where('engrid', Auth::user()->id)->distinct()->get(['clientid']);

        return view('engineerclient.engclientviewpage')->with(['data' => $app]);
    }
    public function engclientprofile()
    {

        return view('engineerclientprofile.engclientprofileviewpage');
    }
    public function enginvoice()
    {
        $app = appointmentInfo::where('engrid', Auth::user()->id)->get();
        return view('engineerinvoice.enginvoiceviewpage')->with(['data' => $app]);
    }
    public function engprofilesetting()
    {
        return view('engineerprofilesetting.profilesettingpageview');
    }
    public function engreviews()
    {
        $res = User::find(Auth::user()->id);
        $paginateres = $res->comment()->paginate(5);
        // dd($paginateres);
        return view('engineerpage.engineerreviews.engclientreviewsviewpage')->with('engrcmt', $paginateres);
    }
    public function replyengrcmt(Request $res)
    {
        try {
            $date = Carbon::now();
            $ress = Comment::where('id', $res->rowid)->update([
                'replies' => $res->replymsg,
                'repliesdate' => $date,
            ]);
            if ($res) {
                return response()->json('yes');
            } else {
                return response()->json('no');
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function engregister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('registerpage.registerpageview');
        }
    }
    public function getallgroup()
    {
        $group = groupInfo::get();
        $countgroup = count($group);
        return response()->json([
            'group' => $group,
            'countgroup' => $countgroup
        ]);
    }
    public function getallgroupengr()
    {
        $group = groupInfo::get();
        $arrayuser = [];
        foreach ($group as $groups) {
            $engrarray = changestrtoarr($groups->groupmember);
            if (in_array(Auth::user()->id, $engrarray)) {
                $arrayuser[] = $groups;
            }
        }
        $countgroup = count($arrayuser);
        return response()->json([
            'group' => $arrayuser,
            'countgroup' => $countgroup
        ]);
    }
    public function engrfetchmessagegroup(Request $res)
    {
        $data = groupChat::where('groupid', $res->engr_id)->get();
        return response()->json($data);
    }

    public function engrlogin()
    {
        if (Auth::check()) {
            return redirect()->back();
        } else {
            return view('loginview.loginpageview');
        }
    }

    public function engehomepage()
    {
        return view('newpanel.newpanelview');
    }
    public function destroy(Request $request)
    {
        if (Cache::has('userlogin' . Auth::user()->id)) {
            Cache::pull('userlogin' . Auth::user()->id);
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
    }
    public function engeconformemailpage()
    {
        return view('conform_email.conformemailpage');
    }
    public function engerequest()
    {
        if (Auth::user()->status == 1) {
            return redirect()->back();
        } else {
            $usestatus = Auth::user()->status;
            if ($usestatus == 0) {
                return view('engineerrequestadmin.requestpageview');
            } else {
                return redirect(RouteServiceProvider::ENGE);
            }
        }
    }
    public function getcomments()
    {
        $res = Auth::user()->comment;
        dd($res);
    }
    public function engrfetchmessage(Request $res)
    {
        $chatmess = oneChat::where('engrid', $res->engrid)->where('clientid', $res->clientid)->get();
        return response()->json(['data' => $chatmess]);
    }
    public function engrdocsmentation(EngrService $storengrDocs, engrDocumentation $res)
    {

        $msg = $storengrDocs->storeEngr_documentation($res);

        if ($msg == 'yes')
            return redirect(RouteServiceProvider::ADMINSTATUS);
        elseif ($msg == 'Plase select pdf file')
            return redirect()->back();
        else
            return redirect()->back();
    }
    public function engrvideores()
    {
        $resun = videoConsaltant::where('engr_id', Auth::user()->id)->where('engr_reply', NULL)->where('client_reply', NULL)->where('orderstatus', 0)->paginate(10);

        $engr_reply = videoConsaltant::where('engr_id', Auth::user()->id)->where('orderstatus', 0)->where('engr_reply', '<>', NULL)->where('client_reply', NULL)->paginate(10);
        $client_reply = videoConsaltant::where('engr_id', Auth::user()->id)->where('orderstatus', 0)->where('engr_reply', '<>', NULL)->where('client_reply', '<>', NULL)->paginate(10);

        $rescon = videoConsaltant::where('engr_id', Auth::user()->id)->where('orderstatus', 1)->paginate(10);

        return view('engineervideoconsul.engineervideoviewpage')->with(['res_un_c' => $resun, 'res_c' => $rescon, 'engr_reply' => $engr_reply, 'client_reply' => $client_reply]);
    }
    public function engineerreplyvideo(Request $res)
    {
        if ($res->video_response == 'done') {
            $client_info = User::find($res->client_video_id)->toArray();
            $engineer_info = Auth::user();
            $order_in  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();
            $order_info =  $order_in[0];

            videoConsaltant::find($res->db_row_id)->update([
                'engr_reply' => 'Done',
                'orderstatus' => 1
            ]);

            // new sendVideoevent($client_info,$engineer_info,$order_info);
            event(new sendVideoevent($client_info, $engineer_info, $order_info));
            return redirect()->back();
        } else {
            $order_check  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();
            if ($order_check[0]['client_time'] == $res->engrtime && $order_check[0]['client_date'] == $res->engrdate) {
                $client_info = User::find($res->client_video_id)->toArray();
                $engineer_info = Auth::user();
                $order_in  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();
                $order_info =  $order_in[0];

                videoConsaltant::find($res->db_row_id)->update([
                    'engr_reply' => 'Done',
                    'orderstatus' => 1
                ]);

                // new sendVideoevent($client_info,$engineer_info,$order_info);
                event(new sendVideoevent($client_info, $engineer_info, $order_info));
                return redirect()->back();
            } else {
                // dd('time is  not match' . $order_check[0]['client_time']  .' : '.$res->engrtime);
                $engrreply = $res->engrdate . ',' . $res->engrtime;

                videoConsaltant::find($res->db_row_id)->update([
                    'engr_reply' => $engrreply
                ]);
                return redirect()->back();
            }
        }
    }
    public function getchatuser()
    {
        $userid = oneChat::where('engrid', Auth::user()->id)->distinct()->get('clientid');

        $clientarray = [];

        $admin = User::where('role', 'admin')->get()->toArray();
        if (count($admin) > 0) {
            $imageuser = asset('engrphoto/' . $admin[0]['pic']);
            $admin[0]['user_img'] = $imageuser;
            $clientarray[] = $admin[0];
        }

        foreach ($userid as $result) {
            $user_d = User::where('id', $result->clientid)->get()->toArray();

            if ($user_d[0]['signupoption'] == 1) {
                $imageuser = $user_d[0]['pic'];
            } else {
                $imageuser = asset('engrphoto/' . $user_d[0]['pic']);
            }

            $user_d[0]['user_img'] = $imageuser;
            $clientarray[] =  $user_d[0];
        }
        return response()->json($clientarray);
    }
    public function conformemailenge(Request $res)
    {
        if (Auth::check() && Auth::user()->role == 'enge') {
            if (Auth::user()->emailstatus == 1) {
                return redirect()->back();
            } else {
                if ($res->conformemail == Auth::user()->emailcode) {
                    User::where('id', Auth::user()->id)->update(['emailstatus' => 1]);
                    return redirect(RouteServiceProvider::DOCSSTATUS);
                } else {
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->back();
        }
    }
    public function fetchorderinfo(appointmentInfo $id)
    {
        $engrinfo = getuser($id->engrid);
        $clientinfo = getuser($id->clientid);
        $engrcategory = getcategoryname($engrinfo->engrcategoryid);
        $dataarray = [$id, $engrinfo, $clientinfo, $engrcategory];
        return response()->json($dataarray);
    }
    public function acceptappointment(appointmentInfo $id)
    {
        $status = $id->update([
            'engrstatus' => 1
        ]);
        if ($status) {
            return response()->json("Appointment Accept Successfully");
        } else {
            return response()->json("Appointment Not Accept");
        }
    }
    public function cancelappointment(appointmentInfo $id)
    {
        $status = $id->update([
            'engrstatus' => 2
        ]);
        if ($status) {
            return response()->json("Appointment cancelSuccessfully");
        } else {
            return response()->json("Appointment Not cancel");
        }
    }
}
