<?php

namespace App\Http\Controllers;

use App\Http\Requests\engrDocumentation;
use Carbon\Carbon;
use App\Models\User;
use App\Models\oneChat;
use App\Models\groupChat;
use App\Models\groupInfo;
use Illuminate\Http\Request;
use App\Models\appointmentInfo;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use PhpParser\Node\Stmt\TryCatch;

class engineerController extends Controller
{
    function showengineerpanel(){
        return view('engineerpanel.engineer');
    }
    public function newengineerpanel(){
        $date = Carbon::today();
        $app = appointmentInfo::where('engrid',Auth::user()->id)->where('meetingdate','<=',$date)->get();
        $todayclient = appointmentInfo::where('engrid',Auth::user()->id)->where('meetingdate',$date)->get();
        $upcomclient = appointmentInfo::where('engrid',Auth::user()->id)->where('meetingdate','>',$date)->get();
        return view('newengineerpanel.engineerviewpage')->with(['data'=>$app,'todayclient'=>$todayclient,'upcomclient'=>$upcomclient]);
    }
     public function engappointment(){
        $date = Carbon::today();
        $app = appointmentInfo::where('engrid',Auth::user()->id)->where('meetingdate','>=',$date)->get();
        return view('engineerappointment.engappiontviewpage')->with(['data'=>$app]);
    }
     public function engschedule(){
        return view('engineerschedule.engschedulepageview');
    }
     public function engclient(){
        $app = appointmentInfo::where('engrid',Auth::user()->id)->distinct()->get(['clientid']);
        return view('engineerclient.engclientviewpage')->with(['data'=>$app]);
    }
     public function engclientprofile(){
       
        return view('engineerclientprofile.engclientprofileviewpage');
    }
     public function enginvoice(){
        $app = appointmentInfo::where('engrid',Auth::user()->id)->get();
        return view('engineerinvoice.enginvoiceviewpage')->with(['data'=>$app]);
    }
      public function engprofilesetting(){
        return view('engineerprofilesetting.profilesettingpageview');
    }
      public function engreviews(){
        $res = User::find(Auth::user()->id);
        $paginateres =$res->comment()->paginate(5);
        // dd($paginateres);
        return view('engineerpage.engineerreviews.engclientreviewsviewpage')->with('engrcmt',$paginateres);
    }
    public function replyengrcmt(Request $res){
        try{
            $date = Carbon::now();
            $ress = Comment::where('id',$res->rowid)->update([
                'replies'=>$res->replymsg,
                'repliesdate'=>$date,
            ]);
            if($res){
                return response()->json('yes');
            }else{
                return response()->json('no');
            }
           
        }catch(\Exception $e){
            dd($e);
        }
    }
      public function engregister(){
        return view('registerpage.registerpageview');
    }
    public function getallgroup(){
        $group = groupInfo::get();
        $countgroup = count($group);
        return response()->json([
            'group'=>$group,
            'countgroup'=>$countgroup
        ]);
    }
    public function getallgroupengr(){
        $group = groupInfo::get();
        $arrayuser = [];
        foreach($group as $groups){
            $engrarray = changestrtoarr($groups->groupmember);
            if(in_array(Auth::user()->id,$engrarray)){
                $arrayuser[] = $groups;
            }
        }
        $countgroup = count($arrayuser);
        return response()->json([
            'group'=>$arrayuser,
            'countgroup'=>$countgroup
        ]);
      
    }
    public function engrfetchmessagegroup(Request $res){
        $data = groupChat::where('groupid',$res->engr_id)->get();
        return response()->json($data);
    }
   
     public function engrlogin(){
        return view('loginview.loginpageview');
    }
    
    public function engehomepage(){
        return view('newpanel.newpanelview');
    }
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
     public function engeconformemailpage(){ 
        return view('conform_email.conformemailpage');
    }
      public function engerequest(){ 
        $usestatus = Auth::user()->status;
        if($usestatus == 0){
            return view('engineerrequestadmin.requestpageview');
        }else{
            return redirect(RouteServiceProvider::ENGE);
        }
    }
    public function getcomments(){
        $res = Auth::user()->comment;
        dd($res);

    }
    public function engrfetchmessage(Request $res){
        $chatmess = oneChat::where('engrid',$res->engrid)->where('clientid',$res->clientid)->get();
        return response()->json(['data'=>$chatmess]);
    }
    public function engrdocsmentation(engrDocumentation $request){
        dd($request);
    }
    public function getchatuser(){
        $userid = oneChat::where('engrid',Auth::user()->id)->distinct()->get('clientid');
        $clientarray = [];
        $admin = User::where('role','admin')->get();
        $clientarray[] = $admin[0]; 
        foreach($userid as $result){
            $clientarray[] = User::find($result->clientid);
        }
        return response()->json($clientarray);
    }
    public function conformemailenge(Request $res){ 
       
        if($res->conformemail == Auth::user()->emailcode){
            User::where('id',Auth::user()->id)->update(['emailstatus'=>1]);
           return redirect(RouteServiceProvider::DOCSSTATUS);
        }
        else{
            return redirect()->back();
        }
    }
}
