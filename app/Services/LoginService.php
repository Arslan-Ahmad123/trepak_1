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
        $longitude = $request->longitude;
        $latitude = $request->latitude;
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
            'address' => $request->addres,
            'subcity' => $request->subcity,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'short_country' => $request->short_country,
            'email' => $request->email,
            'password' => Hash::make($request->password),
           
            'emailstatus' => 0,
            'status' => 0,
            'docsstatus' => 0,
        ]);
        return $user;
       
    }
}
