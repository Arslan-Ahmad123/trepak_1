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

                if(Auth::user()->emailstatus == '0' || Auth::user()->emailstatus == '1'){
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
        
          //    searchbarengineer
          // proceed
         
          if($routename == 'searchengineer'){
               if(session()->has('routename')){
                    session()->forget('routename');
                    session()->forget('search_id');
                    session()->put('routename',$routename);
                    session()->put('search_id',$request->id);
               }else{
                    session()->put('routename',$routename);
                    session()->put('search_id',$request->id);
               }
          }elseif($routename == 'searchbarengineer'){
               if(session()->has('routename')){
                    session()->forget('routename');
                    session()->forget('city_name');
                    session()->forget('category_id');
                    session()->forget('search_client_lat');
                    session()->forget('search_client_lon');
                    session()->put('routename',$routename);
                    session()->put('city_name',$request->cityname);
                    session()->put('category_id',$request->date);
                    session()->put('search_client_lat',$request->addresslat);
                    session()->put('search_client_lon',$request->addresslon);
                   
                    
               }else{
                    session()->put('routename',$routename);
                    session()->put('city_name',$request->cityname);
                    session()->put('category_id',$request->date);
                    session()->put('search_client_lat',$request->addresslat);
                    session()->put('search_client_lon',$request->addresslon);
               }
          }elseif($routename == 'proceed'){
            
               if(session()->has('routename')){
                    session()->forget('routename');
                    session()->forget('engr_id');
                    session()->forget('select_date');
                    session()->put('routename',$routename);
                    session()->put('engr_id',$request->engr_id);
                    session()->put('select_date',$request->engr_date);
                    
               }else{
                    session()->put('routename',$routename);
                    session()->put('engr_id',$request->engr_id);
                    session()->put('select_date',$request->engr_date);
               }
          }else{
               
          }
         
            return redirect('login');
       }
    }
}
