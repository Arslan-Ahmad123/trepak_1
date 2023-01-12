<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Mockery\Undefined;
use App\Models\Comment;
use App\Models\oneChat;
use PharIo\Manifest\Url;
use App\Models\EngrRating;
use App\Models\EngrReview;
use App\Models\engCategory;
use App\Events\oneChatevent;
use Illuminate\Http\Request;
use App\Events\sendVideoevent;
use App\Models\appointmentInfo;
use App\Models\videoConsaltant;
use App\Services\ClientService;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class index extends Controller
{
    public $clientservices;
    public function __construct(ClientService $clientservices)
    {
        $this->clientservices = $clientservices;
    }
    public function showindex()
    {
        $redirectPageName = $this->clientservices->showIndexpage();
        if ($redirectPageName == 'ADMIN') {
            return redirect(RouteServiceProvider::ADMIN);
        }

        if ($redirectPageName == 'ENGEEMAIL') {
            return redirect(RouteServiceProvider::EMAILVERIFY);
        }

        if ($redirectPageName == 'SUBMITDOCS') {
            return redirect(RouteServiceProvider::DOCSSTATUS);
        }
        if ($redirectPageName == 'ENGE') {
            return redirect(RouteServiceProvider::ENGE);
        }
        if ($redirectPageName == 'ENGEFAILED') {
            return redirect(RouteServiceProvider::ADMINSTATUS);
        }
        return redirect(RouteServiceProvider::INDEXPAGE);
    }
    public function showindex_page()
    {

        $redirectPageName = $this->clientservices->showIndexpage();

        if ($redirectPageName == 'ADMIN') {
            return redirect(RouteServiceProvider::ADMIN);
        }

        if ($redirectPageName == 'ENGEEMAIL') {
            return redirect(RouteServiceProvider::EMAILVERIFY);
        }

        if ($redirectPageName == 'SUBMITDOCS') {
            return redirect(RouteServiceProvider::DOCSSTATUS);
        }
        if ($redirectPageName == 'ENGE') {
            return redirect(RouteServiceProvider::ENGE);
        }
        if ($redirectPageName == 'ENGEFAILED') {
            return redirect(RouteServiceProvider::ADMINSTATUS);
        }
        if (Auth::check() && Auth::user()->role ==  null) {
            return redirect()->route('role_view');
        }
        return view('newpanel.newpanelview');
        // if(Auth::check()){

        //     if(Auth::user()->role ==  'admin'){
        //         return redirect()->back();
        //     }elseif(Auth::user()->role ==  'enge'){
        //         $previousurl = url()->previous();
        //         dd($previousurl);
        //         // return redirect()->back();
        //     }elseif(Auth::user()->role ==  'user'){
        //         return view('newpanel.newpanelview');
        //     }
        //     else{ 
        //             return redirect()->route('role_view');   
        //     }
        // }else{
        //     return view('newpanel.newpanelview');
        // }
    }

    public function searchbarengineer(Request $res)
    {
        $res->validate([
            'cityname' => 'required',
            'date' => 'required',
            'addresslat' => 'required',
            'addresslon' => 'required',
        ]);
        $address_ex =  explode(',', $res->cityname);

        $categoryid = engCategory::where('engrcategory', $res->date)->get('id')->toArray();
        if ($categoryid == null) {
            session()->put('engr_cat', 'Please Select Correct Category Name!!');
            return redirect()->back();
        } else {
            $resultSearchEngineer = $this->clientservices->searchEngineraddressWise($categoryid[0]['id'], $address_ex[0], $res->addresslat, $res->addresslon);

            // dd($resultSearchEngineer);

            return view('searchengineerbar.searchengineerview')->with($resultSearchEngineer);
        }

        // $categoryid = engCategory::where('engrcategory',$res->date)->get('id')->toArray();
        // $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise($categoryid[0]['id']);
        // return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
    }

    public function getsearchbarengineer()
    {
        if (session()->has('search_client_lat')) {
            $address_ex =  explode(',', session()->get('city_name'));

            $categoryid = engCategory::where('engrcategory', session()->get('category_id'))->get('id')->toArray();
            if (count($categoryid) > 0) {
                $resultSearchEngineer = $this->clientservices->searchEngineraddressWise($categoryid[0]['id'], $address_ex[0], session()->get('search_client_lat'), session()->get('search_client_lon'));
                session()->forget('search_client_lat');
                session()->forget('search_client_lon');
                session()->forget('category_id');
                session()->forget('city_name');
                return view('searchengineerbar.searchengineerview')->with($resultSearchEngineer);
            } else {
                session()->forget('search_client_lat');
                session()->forget('search_client_lon');
                session()->forget('category_id');
                session()->forget('city_name');
                session()->put('engr_cat', 'Please Select Correct Category Name!!');
                return redirect(RouteServiceProvider::INDEXPAGE);
            }

            // $categoryid = engCategory::where('engrcategory',$res->date)->get('id')->toArray();
            // $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise($categoryid[0]['id']);
            // return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
        } else {
            return redirect(RouteServiceProvider::INDEXPAGE);
        }
    }

    public function search_engr()
    {
        // session()->has('indexengrid')
        if (session()->has('indexengrid')) {
            $categoryid = engCategory::where('engrcategory', session()->get('indexengrid'))->get('id')->toArray();
            $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise($categoryid[0]['id']);
            return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
        } else {
            return redirect()->route('indexpage');
        }
    }
    public function engineersearch(Request $res)
    {
        $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise1($res->id);
        // return $resultSearchEngineer['engr'];
        return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
    }
    public function engineersearch1(Request $res)
    {
        $engrs = User::where('role', '=', 'enge')->where('engrcategoryid', '=', $res->id)->paginate(5);
        foreach ($engrs as $engr) {
            (Cache::has('userlogin' . $engr['id'])) ? $engr['onlinestatus'] = '#5bc155' : $engr['onlinestatus'] = '#f13535';
            $engrs1[] = $engr;
        }
        $category = engCategory::find($res->id);
        $data = ['engrs' => $engrs, 'category' => $category];
        return view('searchengineer.searchengineerview')->with($data);
    }
    public function filterengineer1(Request $res)
    {
        $rating = $res->rating;
        $review = $res->review;
        $experience = $res->experience;
        $cat_id = $res->cat_id1;
        $engrs1 = [];
        $review_data = [];
        if ($experience != 0) {
            $engrs = User::where('role', '=', 'enge')->where('engrcategoryid', '=', $res->id)->orderBy('created_at', 'ASC')->get();
        } else {
            $engrs = User::where('role', '=', 'enge')->where('engrcategoryid', '=', $res->id)->get();
        }
        if (isset($rating)) {
            foreach ($engrs as $engr) {
                (Cache::has('userlogin' . $engr->id)) ? $engr['onlinestatus'] = '#5bc155' : $engr['onlinestatus'] = '#f13535';
                $count1 = EngrRating::where('engr_id', '=', $engr['id'])->where('rating', '=', $rating)->count();
                if ($count1 == 0) {
                    $engr = [];
                } else {
                    $engr['rating'] = $rating;
                    $engrs1[] = $engr;
                }
            }
            if ($review != 0) {
                foreach ($engrs1 as $engr1) {
                    $count2 = EngrReview::where('engr_id', '=', $engr1['id'])->where('review', '!=', '')->count();
                    if ($count2 == 0) {
                        $engr1 = [];
                    } else {
                        $review_data[] = ['count' => $count2, 'id' => $engr1->id];
                    }
                }
                array_multisort(array_column($review_data, 'count'), SORT_DESC, $review_data);
                foreach ($review_data as $arr) {
                    foreach ($arr as $key => $data) {
                        if ($key == 'count') {
                            $count = $data;
                        }
                        if ($key == 'id') {
                            foreach ($engrs1 as $engr) {
                                if ($engr->id == $data) {
                                    $engr['review_count'] = $count;
                                    $engrs2[] = $engr;
                                }
                            }
                        }
                    }
                }
                $engrs1 = $engrs2;
            }
        } else if ($review != 0) {
            foreach ($engrs as $engr1) {
                $count2 = EngrReview::where('engr_id', '=', $engr1['id'])->where('review', '!=', '')->count();
                if ($count2 == 0) {
                    $engr1 = [];
                } else {
                    $review_data[] = ['count' => $count2, 'id' => $engr1->id];
                }
            }
            array_multisort(array_column($review_data, 'count'), SORT_DESC, $review_data);
            foreach ($review_data as $arr) {
                foreach ($arr as $key => $data) {
                    if ($key == 'count') {
                        $count = $data;
                    }
                    if ($key == 'id') {
                        foreach ($engrs as $engr) {
                            if ($engr->id == $data) {
                                $engr['review_count'] = $count;
                                $engrs2[] = $engr;
                            }
                        }
                    }
                }
            }
            $engrs1 = $engrs2;
        }

        $category = engCategory::find($res->id);
        if (empty($engrs1)) {
            $data = ['engrs' => $engrs, 'category' => $category];
        } else {
            $data = ['engrs' => $engrs1, 'category' => $category];
        }
        return view('searchengineer.searchengineerview')->with($data);
    }


    public function engineer_search()
    {
        if (session()->has('search_id')) {
            $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise(session()->get('search_id'));
            return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
        } else {
            return redirect(RouteServiceProvider::INDEXPAGE);
        }
    }
    public function search_engr_card()
    {
        if (session()->has('indexengrid')) {
            $resultSearchEngineer = $this->clientservices->searchEnginerCategoryWise(session()->get('indexengrid'));
            return view('searchengineer.searchengineerview')->with($resultSearchEngineer);
        } else {
            return redirect()->route('indexpage');
        }
    }
    public function registerformshow(Request $res)
    {
        return view('auth.register')->with(['city_name' => $res->city_name, 'eng_type' => $res->eng_type]);
    }
    public function showuserpanel()
    {

        //    $eng_type = engCategory::get('category');
        // return view('newpanel.newpanelview')->with(['engtype'=>$eng_type]);
        // dd(Route::current());
        return view('newpanel.newpanelview');
    }
    public function destroy()
    {
        $this->clientservices->logoutClient();
        return redirect('/');
    }
    public function viewprofileeng(Request $res)
    {

        $engineerComment =  $this->clientservices->viewEngineerComment($res);

        return view('engineerprofile.engineerprofileview')->with(['engr' => $engineerComment]);
    }
    public function clientreplyvideo(Request $res)
    {

        if ($res->video_response == 'done') {
            // $client_info = User::find($res->client_video_id)->toArray();
            // $engineer_info = Auth::user();
            $order_in  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();
            $orderinfo = explode(',', $order_in[0]['engr_reply']);

            // $order_info =  $order_in[0];

            videoConsaltant::find($res->db_row_id)->update([
                'client_date' => $orderinfo[0],
                'client_time' => $orderinfo[1],
                'orderstatus' => 1
            ]);

            // new sendVideoevent($client_info,$engineer_info,$order_info);
            //  event(new sendVideoevent($client_info,$engineer_info,$order_info));
            return redirect()->back();
        } else {

            $order_check  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();

            $order_i = explode(',', $order_check[0]['engr_reply']);

            if ($order_i[1] == $res->engrtime && $order_i[0] == $res->engrdate) {

                // $client_info = User::find($res->client_video_id)->toArray();
                // $engineer_info = Auth::user();
                $order_in  = videoConsaltant::where('id', $res->db_row_id)->get()->toArray();
                // $order_info =  $order_in[0];

                videoConsaltant::find($res->db_row_id)->update([
                    'client_date' => $order_i[0],
                    'client_time' => $order_i[1],
                    'orderstatus' => 1
                ]);

                // new sendVideoevent($client_info,$engineer_info,$order_info);
                //  event(new sendVideoevent($client_info,$engineer_info,$order_info));
                return redirect()->back();
            } else {

                // dd('time is  not match' . $order_check[0]['client_time']  .' : '.$res->engrtime);
                $engrreply = $res->engrdate . ',' . $res->engrtime;

                videoConsaltant::find($res->db_row_id)->update([
                    'client_reply' => $engrreply
                ]);
                return redirect()->back();
            }
        }
    }
    public function viewp_rofileeng()
    {
        if (session()->has('indexengrid')) {
            $engineerComment =  $this->clientservices->viewEngineerComment('test');

            return view('engineerprofile.engineerprofileview')->with(['engr' => $engineerComment]);
        } else {
            return redirect()->route('indexpage');
        }
    }
    public function register_show()
    {
        return view('registerpage.registerpageview');
    }
    public function register_form()
    {
        return redirect()->back();
    }
    public function booking(Request $res)
    {

        $engr = User::find($res->bookingid);
        return view('booking.bookingpageview')->with('engr', $engr);
    }
    public function book_ing()
    {
        if (session()->has('indexengrid')) {
            $engr = User::find(session()->get('indexengrid'));
            return view('booking.bookingpageview')->with('engr', $engr);
        } else {
            return redirect()->route('indexpage');
        }
    }
    public function proceed(Request $res)
    {

        $times = Carbon::now();
        $engineerFind = User::find($res->engr_id);
        return view('proceedtopay.proceedpageview')->with(['engr' => $engineerFind, 'meetingdate' => $res->engr_date, 'meetingtime' => $times]);
    }
    public function proceedlogin()
    {
        if (session()->has('engr_id')) {
            $times = Carbon::now();
            $engineerFind = User::find(session()->get('engr_id'));
            return view('proceedtopay.proceedpageview')->with(['engr' => $engineerFind, 'meetingdate' => session()->get('select_date'), 'meetingtime' => $times]);
        } else {
            return redirect()->route('indexpage');
        }
    }
    public function loginproceed()
    {
        if (session()->has('path')) {
            return view('proceedtopay.proceedpageview');
        } else {
            if (Auth::check()) {
                return redirect()->route('userfrontpageview');
            } else {
                return redirect()->route('home');
            }
        }
    }
    public function commentmessage(Request $res)
    {
        // $res->validate([
        //     'comment'=>'required'
        // ]);
        $engrdata = User::find($res->engr_id);
        $servicesrating = ($res->rating == null) ? 0 : $res->rating;
        $responserating = ($res->responserating == null) ? 0 : $res->responserating;
        if (Auth::user()->role == 'user') {
            $savecmt = Comment::create([
                'clientid' => Auth::user()->id,
                'engrid' => $res->engr_id,
                'comment' => $res->msg_cmt,
                'service' => $servicesrating,
                'response' => $responserating,
            ]);
            if ($savecmt) {
                session()->put('cmt_engrid', $res->engr_id);
                return redirect()->route('viewprofileeng');
                // return view('engineerprofile.engineerprofileview')->with(array('msg'=>'Successfully save your comment','engr'=>$engrdata));

            } else {
                return view('engineerprofile.engineerprofileview')->with(array('msg' => 'Not save your comment', 'engr' => $engrdata));
            }
        }
    }
    public function clientsearchengr()
    {
        return  redirect(RouteServiceProvider::INDEXPAGE);
        // $engr = User::where('role','enge')->paginate(5);
        // return view('client.searchengr.searchengepageview')->with('engr',$engr);
    }
    public function conformorder(Request $res)
    {

        $dateorder = Carbon::parse($res->engrdate)->format('Y-m-d');
        $clientid = Auth::user()->id;
        $checkres = appointmentInfo::where('engrid', $res->engr_id)->where('clientid', $clientid)->where('clientstatus', 0)->count();
        if ($checkres > 0) {
            $ress = appointmentInfo::create([
                'engrid' => $res->engr_id,
                'clientid' => $clientid,
                'meetingdate' => $dateorder,
                'bookingfee' => $res->bookingfee,
                'consultingfee' => $res->consultingfee,
                'tlprice' => $res->totalfee,
                'paymentmethod' => $res->payment_radio,
            ]);
            if ($ress) {
                session()->put('conformengrid', $res->engr_id);
                session()->put('conformmeetingdate', $res->engrdate);
                return redirect()->route('conformorderpage');
            }
        } else {
            $ress = appointmentInfo::create([
                'engrid' => $res->engr_id,
                'clientid' => $clientid,
                'meetingdate' => $dateorder,
                'bookingfee' => $res->bookingfee,
                'consultingfee' => $res->consultingfee,
                'tlprice' => $res->totalfee,
                'paymentmethod' => $res->payment_radio,
            ]);
            if ($ress) {
                session()->put('conformengrid', $res->engr_id);
                session()->put('conformmeetingdate', $res->engrdate);
                return redirect()->route('conformorderpage');
            }
        }
    }
    public function conformorderpage()
    {
        if (session()->has('conformengrid')) {
            return view('client.successbooking.bookingpageview');
        } else {
            return redirect()->route('clientprofile');
        }
    }
    public function fetchorderinfo(appointmentInfo $id)
    {
        $engrinfo = getuser($id->engrid);
        $clientinfo = getuser($id->clientid);
        $engrcategory = getcategoryname($engrinfo->engrcategoryid);
        $dataarray = [$id, $engrinfo, $clientinfo, $engrcategory];
        return response()->json($dataarray);
        // return response()->json($id);
        // return response()->json("Hello World");
    }
    public function clientprofile()
    {
        $order = appointmentInfo::where('clientid', Auth::user()->id)->paginate(10);

        return view('client.clientprofile.clientprofile')->with('order', $order);
    }
    public function clientprofilesetting()
    {
        return view('client.profilesetting.clientprofilepageview');
    }
    public function engineerprofile()
    {
        return view('client.profilesetting.clientprofilepageview');
    }
    public function clientchangepassword()
    {
        return view('client.changepassword.changepassword');
    }
    public function conformemailpage()
    {
        return view('conform_email.conformemailpage');
    }
    public function onegetchatmsg(Request $res)
    {
        $getmessages = oneChat::where([['senderid', $res->senderid], ['reciverid', $res->reciverid]])->orwhere([['reciverid', $res->senderid], ['senderid', $res->reciverid]])->orderBy('created_At', 'ASC')->get();

        return response()->json($getmessages);
    }
    public function fetchrole(Request $res)
    {
        $user = User::find($res->id);
        return response()->json($user->role);
    }
    public function send_message(Request $res)
    {
        if (Auth::user()->role == 'user') {
            $ress = oneChat::create([
                'clientid' => $res->senderid,
                'engrid' => $res->reciverid,
                'senderid' => $res->senderid,
                'reciverid' => $res->reciverid,
                'message' => $res->message,
            ]);
        } else {
            $ress = oneChat::create([
                'clientid' => $res->reciverid,
                'engrid' => $res->senderid,
                'senderid' => $res->senderid,
                'reciverid' => $res->reciverid,
                'message' => $res->message,
            ]);
        }

        if ($res) {
            event(new oneChatevent($res->senderid, $res->reciverid, $res->message));
            return ['success' => true];
        }
    }
    public function conformemailcode(Request $res)
    {
        if (Auth::user()->emailstatus == 1) {
            return redirect()->back();
        } else {
            if ($res->conformemail == Auth::user()->emailcode) {
                User::where('id', Auth::user()->id)->update(['emailstatus' => 1]);
                return redirect(RouteServiceProvider::HOME);
            } else {
                return redirect()->back();
            }
        }
    }
    public function searchspecificcategory(Request $res)
    {
        $specific_engr = User::where('role', 'enge')->where('status', 1)->where('emailstatus', 1)->where('engrcategoryid', $res->id)->get();
        $count_tl = count($specific_engr);
        return response()->json(['data' => $specific_engr, 'tlcount' => $count_tl]);
    }
    public function clientrating(Request $request)
    {
        $engr_id = $request->engrid;
        $client_id = $request->clientid;
        $order_id = $request->orderid;
        $rating = $request->rating;
        $res = EngrRating::create([
            'engr_id' => $engr_id,
            'client_id' => $client_id,
            'order_id' => $order_id,
            'rating' => $rating
        ]);
        if ($res) {
            return response()->json("Rating Added Successfully");
        } else {
            return response()->json("Rating not Added");
        }
    }
    public function clientreview(Request $request)
    {
        $engr_id = $request->engrid;
        $client_id = $request->clientid;
        $order_id = $request->orderid;
        $review = $request->review;
        $res = EngrReview::create([
            'engr_id' => $engr_id,
            'client_id' => $client_id,
            'order_id' => $order_id,
            'review' => $review
        ]);
        if ($res) {
            return response()->json("Review Added Successfully");
        } else {
            return response()->json("Review not Added");
        }
    }
    public function completeorder($id)
    {
        $res = appointmentInfo::find($id)->update([
            'clientstatus' => 1
        ]);
        if ($res) {
            return response()->json("Order Completed");
        } else {
            return response()->json("Order not comlpeted");
        }
    }
}
