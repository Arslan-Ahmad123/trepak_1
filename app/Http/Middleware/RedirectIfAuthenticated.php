<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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
                $users = Auth::user();
                $userstatus = Auth::user()->status;        
                if($user == 'admin'){
                        return redirect(RouteServiceProvider::ADMIN);
                }elseif($user == 'enge'){
                    if ($users->adminengr == 1) {
                        User::where('id', $users->id)->update(['adminengr' => 2]);
                        if (Auth::user()->docsstatus == 0) {
                            return redirect(RouteServiceProvider::DOCSSTATUS);
                        } else {
                            if (Auth::user()->status == 0) {
                                return redirect(RouteServiceProvider::ADMINSTATUS);
                            } else {
                                return redirect(RouteServiceProvider::ENGE);
                            }
                        }
                    } else {
                        if (Auth::user()->emailstatus == 0) {
                            return redirect(RouteServiceProvider::EMAILVERIFY);
                        } else {
                            if (Auth::user()->docsstatus == 0) {
                                return redirect(RouteServiceProvider::DOCSSTATUS);
                            } else {
                                if (Auth::user()->status == 0) {
                                    return redirect(RouteServiceProvider::ADMINSTATUS);
                                } else {
                                    return redirect(RouteServiceProvider::ENGE);
                                }
                            }
                        }
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
