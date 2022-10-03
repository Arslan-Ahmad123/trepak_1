<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class engineermiddleware
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
        $url = Route::current()->getName();
        // dd($url);
        
        if(Auth::check()){
        if(Auth::user()->role == 'enge'){
            if($url == 'engehomepage' || $url == 'engineerlogout' || $url == 'engeconformemailpage' || $url == 'engerequest'){
                return $next($request);
            }else{
                 if(Auth::user()->emailstatus == 1){
                    if(Auth::user()->status == 1){
                         return $next($request);
                    }else{
                         return redirect()->route('engerequest');
                    }

               
            }
             else{
                return redirect()->route('engeconformemailpage');
              }
            }
           


        }else{
            return redirect()->back();
        }
       
       }else{
            return redirect()->route('login');
       }
    }
}
