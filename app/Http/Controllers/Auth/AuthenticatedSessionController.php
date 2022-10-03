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
                Event(new conformemail($user));
                User::where('id',$user->id)->update(['adminengr'=>2]);
                if($userstatus == 0){   
                    return redirect()->route('engerequest');
                }else{
                    return redirect(RouteServiceProvider::ENGE);
                } 
            }else{
                if($userstatus == 0){   
                    return redirect()->route('engerequest');
                }else{
                    return redirect(RouteServiceProvider::ENGE);
                } 
            }
                          
      }else{
      
        
        if(session()->has('path')){
            $path = session()->get('path');
            $back_slash = strpos($path,'/');
            $new_path = substr($path,0,$back_slash); 
            
                return redirect(RouteServiceProvider::PROCEED);
            
        }else if(session()->has('sessionsearchengineer')){
            
            return redirect()->route(session()->get('sessionsearchengineer'),['id'=>session()->get('sessionsearchengineer_catid'),'']);
        }
        
        else if(session()->has('viewprofileeng')){
           
            $engr = User::find(session()->get('viewprofileeng'));
            return view('engineerprofile.engineerprofileview')->with('engr',$engr);
        }
        else{
          
            return redirect(RouteServiceProvider::HOME);
        }
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
