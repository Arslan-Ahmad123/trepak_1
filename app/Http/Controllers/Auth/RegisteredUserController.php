<?php

namespace App\Http\Controllers\Auth;



use App\Services\LoginService;
use App\Models\User;
use App\Events\conformemail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\signupEngineerRequest;


class RegisteredUserController extends Controller
{
   
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(signupEngineerRequest $request,LoginService $loginService)
    {
        $user = $loginService->storeSignupdata($request);
        $users = Auth::user()->role;
        $userstatus = Auth::user()->status;        
        if($user == 'admin'){
            return redirect(RouteServiceProvider::ADMIN);
        }elseif($users == 'enge'){
            Event(new conformemail($user));
            if(Auth::user()->emailstatus == 0){
                return redirect(RouteServiceProvider::EMAILVERIFY);
            }
            if($userstatus == 0){
                return redirect(RouteServiceProvider::ENGE);
            }
                return redirect(RouteServiceProvider::ENGE);
                            
      }else{
           return redirect(RouteServiceProvider::HOME);
      }   
    }
}
