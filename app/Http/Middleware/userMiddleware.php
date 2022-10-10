<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          // dd(url()->current());
          // dd(Route::current()->getName());
          // dd($request->id);
          $routename = Route::current()->getName();
         if(Auth::check()){
        if(Auth::user()->role == 'user'){
          // dd('yes');
          
           if($routename == 'userlogout' || $routename == 'userfrontpageview'){
                return $next($request);
           }else{

                if(Auth::user()->emailstatus == '0'){
               return $next($request);
                    }
               else{
                   
                    return redirect()->route('conformemailpage');
               }

           }
         
          
             
        }
        else{
            return redirect()->back();
        }
       }else{
     //     dd($request->id);
          // if($routename == 'viewprofileeng'){
               
          //      session()->put('indexengrid',$request->userid);
          //      session()->put('indexroute',$routename);
             
          // }elseif($routename == 'booking'){
               
          //      session()->put('indexengrid',$request->userid);
          //      session()->put('indexroute',$routename);
          // }elseif($request->has('cityname')){
               
          //      session()->put('indexengrid',$request->date);
          //      session()->put('indexroute',$routename);
          // }elseif(!$request->has('id')){
             
          //       session()->put('indexengrid',$request->id);
          //       session()->put('indexroute',$routename);
          // }else{
          //      dd('no');
          // }
         
            return redirect('login');
       }
    }
}
