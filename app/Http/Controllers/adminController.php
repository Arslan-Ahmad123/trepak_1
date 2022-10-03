<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\groupChat;
use App\Models\groupInfo;
use App\Models\engCategory;
use App\Models\packageInfo;
use Illuminate\Http\Request;
use App\Events\groupChatevent;
use Illuminate\Support\Facades\Log;
use App\Events\conformationEngineer;
use App\Models\oneChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;

class adminController extends Controller
{
    function showadminpanel(){
        return view('adminpanel.admin');
    }
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function registerengineer(){
        $res = User::where('role','enge')->where('status','0')->get();
        // if(count($res))
        return view('adminpanel.registerengineerview')->with('res',$res);
    }
    public function particularEngineer($id){
        Event(new conformationEngineer($id));
        User::where('id', $id)
        ->where('role', 'enge')
        ->update(['status' => 1]);
         $res = User::where('role','enge')->where('status','0')->get();
        return view('adminpanel.registerengineerview')->with('res',$res);

    }
    
    public function newadminportal(){
        return view('newadminpanel.adminpageview');
    }
    public function homepage(){
        return view('newpanel.newpanelview');
    }
    
    public function adminconformenge(){
        return view('adminpages.conformengineer.conformenge')->with(['enge'=>User::where('role','enge')->where('status',1)->get()]);
    }
    public function adminunregisenge(){
        return view('adminpages.pendingengineer.pendingenge')->with(['enge'=>User::where('role','enge')->where('status',0)->get()]);
    }
     public function regisenge(User $id){
        $id->status = 1;
        $id->save();
        return view('adminpages.pendingengineer.pendingenge')->with(['enge'=>User::where('role','enge')->where('status',0)->get()]);
    }
    public function clientpage(){
        return view('adminpages.client.clientpage')->with(['enge'=>User::where('role','user')->get()]);
    }
    
    public function registercategory(){
        return view('adminpages.categoryengineer.categorypageview');
    }
    public function saveengineercategory(Request $res){
       $res->validate([
        'engrcategory'=>['required','unique:eng_categories,engrcategory'],
        'engrcategorylogo'=>['required'],
      ]);
      $img = $res->engrcategorylogo->getClientOriginalName();
      $res->engrcategorylogo->move(public_path().'/categorylogo/',  $img);
      
      $save =  engCategory::create([
        'engrcategory'=>$res->engrcategory,
        'engrcategorylogo'=>$img,
      ]);
      if($save){
         return redirect()->back();
      }
     
    }
    public function viewcategory(){
        return view('adminpages.viewcategory.view_categ')->with(['category'=>engCategory::get()]);
    }
    public function fetch_categorydata(engCategory $id){
        return $id->toJson();
        // return response()->json(['data'=>'yes']);
    }
    
    public function updatedata_category(Request $res){
       $pic =  $res->pic;
       if($pic == ""){
         $fetch_rec = engCategory::Where('id',$res->category_id)->first();
         $fetch_rec_name = engCategory::Where('engrcategory',$res->category_name)->first();
         if(count((array)$fetch_rec_name) > 0){
            return response()->json(['data'=>"Category name aleready exist!!"]);
         }else{
            engCategory::where('id', $res->category_id)->update(['engrcategory'=>$res->category_name]);
            return response()->json(['data'=>"Record update"]);
         }
        }else{
            $fetch_rec = engCategory::Where('id',$res->category_id)->first();
         $fetch_rec_name = engCategory::Where('engrcategory',$res->category_name)->first();
         $fetch_rec_logo = engCategory::Where('engrcategorylogo',$res->pic)->first();
         if(count((array)$fetch_rec_name) > 0 && count((array)$fetch_rec_logo) > 0){
            return response()->json(['data'=>"Category and logo aleready exist!!"]);
         }else if(count((array)$fetch_rec_name) > 0 && count( (array)$fetch_rec_logo) == 0){
              unlink(public_path().'/categorylogo/'.$res->old_pic);
              $img = $res->pic->getClientOriginalName();
             $res->pic->move(public_path().'/categorylogo/',  $img);
             engCategory::where('id', $res->category_id)->update(['engrcategorylogo'=>$img]);
            return response()->json(['data'=>"Record update"]);
         }else if(count((array)$fetch_rec_name) == 0 && count((array)$fetch_rec_logo) > 0){
             engCategory::where('id', $res->category_id)->update(['engrcategory'=>$res->category_name]);
            return response()->json(['data'=>"Record update"]);
         }
         else{
            unlink(public_path().'/categorylogo/'.$res->old_pic);
              $img = $res->pic->getClientOriginalName();
             $res->pic->move(public_path().'/categorylogo/',  $img);
             engCategory::where('id', $res->category_id)->update(['engrcategorylogo'=>$img,'engrcategory'=>$res->category_name]);
           
            return response()->json(['data'=>$img]);
         }
       }
    }
     public function deletedata_category(engCategory $id){
        $category = $id;
        $res = $category->delete();
        if($res){
            unlink(public_path().'/categorylogo/'.$id->engrcategorylogo);
            return response()->json('yes');
        }else{
            return response()->json('no');
        }
    }
    public function createpackage(){
        return view('adminpages.createpackage.packagepageview');
    }
    public function viewsavepackage(){
        return view('adminpages.viewpackage.viewallpkg');
    }
    public function savepackage(Request $res){
        
        if(packageInfo::where('packagename',$res->packagename)->count() > 0){
            return view('adminpages.createpackage.packagepageview')->with(['msg'=>'Package Name Already Exist']);
        }else{
             $res = packageInfo::create($res->all());
        if($res){
           return view('adminpages.viewpackage.viewallpkg');
        }else{
           return view('adminpages.createpackage.packagepageview');
        }
        }
       

    }
    public function fetch_packagedata(packageInfo $id){
        return response()->json($id);
    }
    public function updatedata_package(Request $res){
        if(packageInfo::where('id','!=',$res->package_id)->where('packagename',$res->packagename)->count() > 0){
            return view('adminpages.createpackage.packagepageview')->with(['msg'=>'Package Name Already Exist']);
        }else{
             $res = packageInfo::where('id',$res->package_id)->update([
                'packagename'=>$res->packagename,
                'packagetype'=>$res->packagetype,
                'packageprice'=>$res->packageprice,
                'packagespecification'=>$res->packagespecification,
                'packageduration'=>$res->packageduration,
             ]);
        if($res){
            return response()->json('success');
        }else{
            return response()->json('fail');
        }
        }
    }
    public function deletedata_package(packageInfo $id){
        $category = $id;
        $res = $category->delete();
        if($res){
           
            return response()->json('yes');
        }else{
            return response()->json('no');
        }
    }
    public function admincreateengr(Request $request){
        $request->validate([
            'pic' => ['required','image','mimes:jpeg,jpg,png'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'education' => ['required'],
            'specialize' => ['required'],
            'experience' => ['required'],
            'currentcomp' => ['required'],
            'chargeperhour' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
         $email_code = rand(111111,999999);
         $longi =$request->longitude * 1E6;
        $lati = $request->latitude * 1E6;
        $image = $request->pic->getClientOriginalName();
         $request->pic->move(public_path().'/pitcher/',  $image);
         $user = User::create([
            'pic' => $image,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'address' => $request->address,
            'adminengr' => 1,
            'longitude' =>$longi,
            'latitude' => $lati,
            'emailcode' => $email_code,
            'status'=>1,
            'subcity'=>"Model Town",
            'city'=>"Gujranwala",
            'state'=>"punjab",
            'country'=> 'Pakistan',
            'engrcategoryid' => $request->engrcategory,
            'education' => $request->education,
            'specialization' => $request->specialize,
            'experience' => $request->experience,
            'pricerange' => $request->chargeperhour,
            'currentcompany' => $request->currentcomp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $staus = $user ? 'Record Save Successfully' : 'Record Not Save Successfully'; 
        return view('adminpages.viewallengr.viewallengr')->with(['status'=>$staus]);
    }
    public function editengrinfo(User $id){
        return view('adminpages.editengrinfo.editengrinfo')->with(['data'=>$id]);
    }
    public function deleteengr(User $id){
        dd($id);
    }
    public function set_session_groupid(Request $res){
        if(session()->has('storegroupid')){
            session()->forget('storegroupid');
            session()->put('storegroupid',$res->groupid);
            Log::info(["storegroupid"=>session()->get('storegroupid')]);
        }else{
            session()->put('storegroupid',$res->groupid);
            Log::info(["storegroupid"=>session()->get('storegroupid')]);

        }
       return response()->json('store session');
    }
    public function del_session_groupid(){
        if(session()->has('storegroupid')){
            session()->forget('storegroupid');
            Log::info(["delgroupid"=>'yes']);
            return response()->json('delete session');

        }else{
            return response()->json('store not exist');
        }
       
    }
    
    public function storemessage(Request $res){
      
        $res=  groupChat::create([
            'senderid'=>Auth::user()->id,
            'groupid'=>$res->groupid,
            'message'=>$res->message,
        ]);
        if($res){
            event (new groupChatevent($res->groupid,Auth::user()->id,$res->message));
            return ['success'=>true];
        }else{
            return ['success'=>false];
        }
       
        
    }
    public function getchatuseradmin(Request $res){
        $data = User::where('role','enge')->get();
        // $datacount = User::where('role','enge')->count();
        return response()->json($data);
    }
    public function updateengrinfo(Request $request){
        $id = $request->id;
        if($request->pic){
            $oldimg = $request->oldpic;
            $image = $request->pic->getClientOriginalName();
            $request->pic->move(public_path().'/pitcher/',  $image);
            unlink(public_path().'/pitcher/'.$oldimg);
        }else{
            $image = $request->oldpic;
        }
        if($request->password){
            $password = Hash::make($request->password);
        }else{
            $password = $request->oldpassword;
        }
        if(User::where('id','!=',$id)->where('email',$request->email)->count() > 0){
            return redirect()->back()->with(['status'=>'Email Already Exist']);
        }else{
            $user = User::where('id',$id)->update([
                'pic' => $image,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'mobile' => $request->mobile,
                'engrcategoryid' => $request->engrcategory,
                'education' => $request->education,
                'specialization' => $request->specialize,
                'experience' => $request->experience,
                'pricerange' => $request->chargeperhour,
                'currentcompany' => $request->currentcomp,
                'email' => $request->email,
                'password' => $password,
            ]);
            return view('adminpages.viewallengr.viewallengr');
        }
       
    }
    
}
