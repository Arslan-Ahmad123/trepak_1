<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class PrevetPages
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
        if (Auth::check()) {
            //    =========================
            $users = Auth::user();
            if (Auth::user()->role == 'admin') {
                return redirect(RouteServiceProvider::ADMIN);
            } elseif (Auth::user()->role == 'enge') {
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
                    //  Event(new conformemail($user));
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
            } elseif (Auth::user()->role == 'user') {
                if (session()->has('search_id')) {
                    return redirect()->route('search_engineer');
                }
                if (session()->has('select_date')) {
                    return redirect()->route('proceedlogin');
                }
                if (session()->has('city_name')) {
                    return redirect()->route('getsearchbarengineer');
                }
              
                // return redirect()->route('userfrontpageview');
                return redirect(RouteServiceProvider::INDEXPAGE);
            } else {
                return redirect()->route('role_view');
            }

            //    =========================
        } else {
            return $next($request);
        }
    }
}
