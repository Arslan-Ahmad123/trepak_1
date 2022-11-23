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
use App\Models\appointmentInfo;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\engrDocumentation;

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
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return view('registerpage.registerpageview');
        }
        
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
        if(Auth::check()){
            return redirect()->back();
        }else{
            return view('loginview.loginpageview');
        }
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
        if(Auth::user()->status == 1){
            return redirect()->back();
        }else{
            $usestatus = Auth::user()->status;
            if($usestatus == 0){
                return view('engineerrequestadmin.requestpageview');
            }else{
                return redirect(RouteServiceProvider::ENGE);
            }
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
    public function engrdocsmentation(EngrService $storengrDocs,engrDocumentation $res){
   
       $msg = $storengrDocs->storeEngr_documentation($res);
      
        if($msg =='yes')
            return redirect(RouteServiceProvider::ADMINSTATUS);
        elseif($msg == 'Plase select pdf file')
            return redirect()->back();
        else
            return redirect()->back();
       
    }
    public function getchatuser(){
        $userid = oneChat::where('engrid',Auth::user()->id)->distinct()->get('clientid');
        
        $clientarray = [];

        $admin = User::where('role','admin')->get()->toArray();
      if(count($admin) > 0){
        $imageuser = asset('engrphoto/'.$admin[0]['pic']);
        $admin[0]['user_img'] = $imageuser;
        $clientarray[] = $admin[0];
      }
        
        foreach($userid as $result){
            $user_d = User::where('id',$result->clientid)->get()->toArray();
        
            if($user_d[0]['signupoption'] == 1){
                $imageuser = $user_d[0]['pic'];
            }else{
                $imageuser = asset('engrphoto/'.$user_d[0]['pic']);
            }
        
            $user_d[0]['user_img'] = $imageuser;
            $clientarray[] =  $user_d[0]; 
        }
        return response()->json($clientarray);
    }
    public function conformemailenge(Request $res){ 
      if(Auth::check() && Auth::user()->role == 'enge'){
        if(Auth::user()->emailstatus == 1){
            return redirect()->back();
           }else{
            if($res->conformemail == Auth::user()->emailcode){
                User::where('id',Auth::user()->id)->update(['emailstatus'=>1]);
               return redirect(RouteServiceProvider::DOCSSTATUS);
            }
            else{
                return redirect()->back();
            }
           }
      }else{
        return redirect()->back();
      }
       
    }
}
