<?php

namespace App\Services;

use App\Models\User;
use App\Events\conformemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class LoginService
{
    public function storeSignupdata($request)
    {
        $email_code = rand(111111, 999999);
        $longitude = $request->longitude * 1E6;
        $latitude = $request->latitude * 1E6;
        if ($request->has('pic')) {
            $imagename = $request->pic->getClientOriginalName();
            $saveimage = time() . '.' . $imagename;
            $request->pic->move(public_path() . '/engrphoto/',  $saveimage);
        } else {
            $saveimage =  'demo.png';
        }
        if ($request->has('engrcategory')) {
          $engrcategoryid = $request->engrcategory;
        } else {
            $engrcategoryid = 0;
        }
        $user = User::create([
            'pic' => $saveimage,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'longitude' =>  $longitude,
            'latitude' => $latitude,
            'engrcategoryid'=> $engrcategoryid,
            'emailcode' => $email_code,
            'subcity' => "Model Town",
            'city' => "Gujranwala",
            'state' => "punjab",
            'country' => 'Pakistan',
            'email' => $request->email,
            'password' => Hash::make($request->password),
           
            'emailstatus' => 1,
            'status' => 1,
            'docsstatus' => 0,
        ]);
        return $user;
       
    }
}
