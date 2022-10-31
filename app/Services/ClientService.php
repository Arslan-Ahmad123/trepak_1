<?php

namespace App\Services;

use App\Models\User;
use App\Models\engCategory;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ClientService
{
    public function showIndexpage()
    {
       
        if (Auth::check()) {
            $user = Auth::user()->role;
            $userstatus = Auth::user()->status;
            if ($user == 'admin') {
                return ('ADMIN');
                // return redirect(RouteServiceProvider::ADMIN);
            } elseif ($user == 'enge') {
                if(Auth::user()->emailstatus == 0){
                    return ('ENGEEMAIL');
                }
                if(Auth::user()->docsstatus == 0){
                    return ('SUBMITDOCS');
                }
                if ($userstatus == 0) {
                    // dd('Your request go to Admin');
                    return ('ENGEFAILED');
                }
                    return ('ENGE');
                    // return redirect(RouteServiceProvider::ENGE);
                
            } else {
                return ('INDEXPAGE');
                //    return Redirect::to(RouteServiceProvider::INDEXPAGE);
            }
        } else {
            // $eng_type = engCategory::get('engrcategory');
            //    $json_type = json_encode($eng_type);
            // return view('newpanel.newpanelview')->with(['engtype'=>$eng_type]);
            // return view('Arfan');
            return ('INDEXPAGE');
            // return Redirect::to(RouteServiceProvider::INDEXPAGE);
            // return view('loginview.loginpageview');
        }
    }
    public function searchEnginerCategoryWise($id)
    {
        $categoryname = engCategory::find($id);
        $engr = User::where('role', 'enge')->where('engrcategoryid', $id)->paginate(10);
        $allengr = User::where('role', 'enge')->where('engrcategoryid', $id)->get();
        $totalengr = User::where('role', 'enge')->count();
        $new_longitude =  Auth::user()->longitude / 1000000;
        $new_latitude = Auth::user()->latitude / 1000000;
        $engr_array = [];
        $user = User::where('role', 'enge')->where('engrcategoryid', $id)->get()->toArray();
    
        foreach ($user as $users) {
    
            $old_longitude = $users['longitude'] / 1000000;
            $old_latitude = $users['latitude'] / 1000000;
            $dLat = deg2rad($new_latitude - $old_latitude);
            $dLon = deg2rad($new_longitude - $old_longitude);
            $radius = 6371;
            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($old_latitude)) * cos(deg2rad($new_latitude)) *
                sin($dLon / 2) * sin($dLon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $d = $radius * $c; // Distance in km
            if ($d <= 100) {
                // array_push($users, $d);
                // array_push($users,$categoryname->engrcategory);
                $users['distance'] = $d;
                $users['categoryname'] = $categoryname->engrcategory;
                $users['user_id'] = Auth::user()->id;
                if($users['signupoption'] == 1){
                    $users['imagepath'] = $users['pic'];
                }else{
                    $users['user_id'] = asset('engrphoto/'.$users['pic']);
                }
                $engr_array[] = $users;
              
            }
        }
        
        if(session()->has('all_engrs')){
            session()->forget('all_engrs');
            session()->push('all_engrs', $engr_array);
        }else{
            session()->push('all_engrs', $engr_array);
        }
       return ['engr' => $engr, 'tlengr' => $totalengr, 'cate_name' => $categoryname, 'category_id' => $id,'allengr'=>json_encode($allengr)];
    }
    public function searchEngineraddressWise($id,$city,$lat,$lon)
    {
        $categoryname = engCategory::find($id);
        $engr = User::where('role', 'enge')->where('engrcategoryid', $id)->paginate(10);
        $allengr = User::where('role', 'enge')->where('engrcategoryid', $id)->where('city',$city)->get();
        $totalengr = User::where('role', 'enge')->count();
        $new_longitude =  $lon;
        $new_latitude = $lat;
        $engr_array = [];
        $user = User::where('role', 'enge')->where('engrcategoryid', $id)->get()->toArray();
    
        foreach ($user as $users) {
    
            $old_longitude = $users['longitude'] / 1000000;
            $old_latitude = $users['latitude'] / 1000000;
            $dLat = deg2rad($new_latitude - $old_latitude);
            $dLon = deg2rad($new_longitude - $old_longitude);
            $radius = 6371;
            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($old_latitude)) * cos(deg2rad($new_latitude)) *
                sin($dLon / 2) * sin($dLon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $d = $radius * $c; // Distance in km
            if ($d <= 100) {
                // array_push($users, $d);
                // array_push($users,$categoryname->engrcategory);
                $users['distance'] = $d;
                $users['client_lon'] = $lon;
                $users['client_lat'] = $lat;
                $users['distance'] = $d;
                $users['categoryname'] = $categoryname->engrcategory;
                $users['user_id'] = Auth::user()->id;
                if($users['signupoption'] == 1){
                    $users['imagepath'] = $users['pic'];
                }else{
                    $users['user_id'] = asset('engrphoto/'.$users['pic']);
                }
              
                $engr_array[] = $users;
              
            }
        }
        
        if(session()->has('all_engrs')){
            session()->forget('all_engrs');
            session()->push('all_engrs', $engr_array);
        }else{
            session()->push('all_engrs', $engr_array);
        }
       return ['engr' => $engr, 'tlengr' => $totalengr, 'cate_name' => $categoryname, 'category_id' => $id,'allengr'=>json_encode($allengr)];
    }
    public function logoutClient()
    {
        Auth::guard('web')->logout();
        Request()->session()->invalidate();
        Request()->session()->regenerateToken();
    }
    public function viewEngineerComment($res)
    {
        if (session()->has('cmt_engrid')) {
            $engr_id = session()->get('cmt_engrid');
        }elseif(session()->has('indexroute')){
             $engr_id = session()->get('indexengrid');
        }
        else {
            $engr_id = $res->userid;
        }
        // dd(User::where('id',$res->userid)->get());
        $value = Auth::user()->id;
        $engr = User::with(['comment' => function ($q) use ($value) {
            $q->where('clientid', '=', $value); // '=' is optional

        }])->where('id', $engr_id)->get()->toArray();

        // dd(json_encode()); 
        $object = (object) $engr[0];
        return $object;
    }
}
