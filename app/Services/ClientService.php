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
        $totalengr = User::where('role', 'enge')->where('engrcategoryid', $id)->count();
        return ['engr' => $engr, 'tlengr' => $totalengr, 'cate_name' => $categoryname, 'category_id' => $id];
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
