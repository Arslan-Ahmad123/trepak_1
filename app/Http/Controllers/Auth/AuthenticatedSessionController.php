<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\conformemail;
use Illuminate\Http\Request;
use App\Services\ClientService;
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
    public function create(ClientService $clientservices)
    {
        // dd(Auth::user());
        $redirectPageName = $clientservices->showIndexpage();
        if($redirectPageName == 'ADMIN'){
         return redirect(RouteServiceProvider::ADMIN);
        } 
        
        if($redirectPageName == 'ENGEEMAIL'){
         return redirect(RouteServiceProvider::EMAILVERIFY);
        }  
          
        if($redirectPageName == 'SUBMITDOCS'){
         return redirect(RouteServiceProvider::DOCSSTATUS);
        }        
        if($redirectPageName == 'ENGE'){
         return redirect(RouteServiceProvider::ENGE);
        }
        if($redirectPageName == 'ENGEFAILED'){
         return redirect(RouteServiceProvider::ADMINSTATUS);
        } 
        if(Auth::check() && Auth::user()->role ==  null){
         return redirect()->route('role_view');
         }
         if(Auth::check() && Auth::user()->role == 'user'){
            return redirect(RouteServiceProvider::INDEXPAGE);
        }      
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
        if ($users == 'admin') {
            return redirect(RouteServiceProvider::ADMIN);
        } elseif ($users == 'enge') {
            if ($user->adminengr == 1) {
                User::where('id', $user->id)->update(['adminengr' => 2]);
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
        } else {
           
         
                 if(session()->has('search_id')){
                    return redirect()->route('search_engineer');
                  }
                  if(session()->has('select_date')){  
                    return redirect()->route('proceedlogin');
                  }
                  if(session()->has('city_name')){  
                    return redirect()->route('getsearchbarengineer');
                  }
                // return redirect()->route('userfrontpageview');
                return redirect(RouteServiceProvider::INDEXPAGE);
            

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
