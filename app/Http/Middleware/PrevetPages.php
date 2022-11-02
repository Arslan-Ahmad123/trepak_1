<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check()){
            if(Auth::user()->role == 'enge'){
                return redirect(RouteServiceProvider::ENGE);
            }elseif(Auth::user()->role == 'user'){
                return redirect()->route('index_page');
            }elseif(Auth::user()->role == 'admin'){
                return redirect(RouteServiceProvider::ADMIN);
            }else{
                return redirect()->route('role_view');
              
            }
        }else{
            return $next($request);
        }
    }
}
