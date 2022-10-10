<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\conformemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('loginview.loginpageview');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

         $user = Auth::user();
         $users = Auth::user()->role;
         $userstatus = $user->status;        
       if($users == 'admin'){
           return redirect(RouteServiceProvider::ADMIN);
        }elseif($users == 'enge'){
            if($user->adminengr == 1){
                User::where('id',$user->id)->update(['adminengr'=>2]);
                if(Auth::user()->docsstatus == 0){
                    return redirect(RouteServiceProvider::DOCSSTATUS);
                   }else{
                    if(Auth::user()->status == 0){
                        return redirect(RouteServiceProvider::ADMINSTATUS);
                    }else{
                        return redirect(RouteServiceProvider::ENGE);
                    }
                   }
            }else{
                //  Event(new conformemail($user));
                if(Auth::user()->emailstatus == 0){   
                    return redirect(RouteServiceProvider::EMAILVERIFY);
                }else{
                   if(Auth::user()->docsstatus == 0){
                    return redirect(RouteServiceProvider::DOCSSTATUS);
                   }else{
                    if(Auth::user()->status == 0){
                        return redirect(RouteServiceProvider::ADMINSTATUS);
                    }else{
                        return redirect(RouteServiceProvider::ENGE);
                    }
                   }
                } 
            }
                      
      }else{
        if(session()->has('indexengrid')){
            if(session()->get('indexroute') == 'viewprofileeng'){
                return redirect()->route('view_profileeng');
            }elseif(session()->get('indexroute') == 'booking'){
                return redirect()->route('book_ing');
            }elseif( is_numeric(session()->get('indexengrid'))){
                return redirect()->route('search_engr_card');
            }else{
                return redirect()->route('search_engr');
            }
        }else{
            return redirect(RouteServiceProvider::HOME);
        }
        
        // if(session()->has('path')){
        //     $path = session()->get('path');
        //     $back_slash = strpos($path,'/');
        //     $new_path = substr($path,0,$back_slash); 
            
        //         return redirect(RouteServiceProvider::PROCEED);
            
        // }else if(session()->has('sessionsearchengineer')){
            
        //     return redirect()->route(session()->get('sessionsearchengineer'),['id'=>session()->get('sessionsearchengineer_catid'),'']);
        // }
        
        // else if(session()->has('viewprofileeng')){
           
        //     $engr = User::find(session()->get('viewprofileeng'));
        //     return view('engineerprofile.engineerprofileview')->with('engr',$engr);
        // }
        // else{
          
        //     return redirect(RouteServiceProvider::HOME);
        // }
      }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
