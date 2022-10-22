<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user()->role;
                $userstatus = Auth::user()->status;        
                if($user == 'admin'){
                        return redirect(RouteServiceProvider::ADMIN);
                }elseif($user == 'enge'){
                        if($userstatus == 0){
                            dd('Your request go to Admin');
                        }else{
                            return redirect(RouteServiceProvider::ENGE);
                        }                
                }elseif($user == 'enge'){
                    return redirect(RouteServiceProvider::INDEXPAGE);
                }
                else{
                         return redirect()->back();
                } 
                           
                        }
                    }

        return $next($request);
    }
}
