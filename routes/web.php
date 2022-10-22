<?php

use App\Models\User;
use App\Models\engCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [index::class, 'showindex'])->name('home');
Route::get('/indexpage', [index::class, 'showindex_page'])->name('indexpage');
// Route::view('/indexpage', [index::class,'showindex_page'])->name('indexpage');
// ===================email ===========================
Route::get('/conformemail', function () {
    return view('conformemail.conformemail');
})->name('conformemail');
Route::post('/resendemail', function () {
    return redirect()->back();
})->name('resendemail');
Route::get('/fetchallrangeengr', function () {
    $getuser = User::with('category')->where('role', 'enge')
        ->get()->toArray();
    return response()->json($getuser);
});
Route::get('/logingoogle', function () {
    return Socialite::driver('google')->redirect();
})->name('logingoogle');
Route::get('/fetchcategorynamemap/{id?}', function (engCategory $id) {
    return $id->engrcategory;
})->name('fetchcategorynamemap');

Route::get('/google/callback', function () {
   
  
    $user = Socialite::driver('google')->stateless()->user();
   
    $users       =   User::where(['email' => $user->email])->first();
   
    if ($users) {
        Auth::login($users);
       
        if (Auth::user()->role == 'enge') {
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
        } elseif(Auth::user()->role == 'user') {
            return redirect()->route('indexpage');
        }else{
            dd('Please select your role first');
        }
     
    } else {
        
        $users = User::create([
            'pic' => $user->avatar,
            'fname' => $user->name,
            'emailcode' => rand(111111,999999),
            'email' => $user->email,
            'password' => Hash::make('null12345'),
            'signupoption' => 1,

        ]);
        Auth::login($users);
        dd("please select your role first");
    }

    
});
Route::get('/loginfacebook', function () {

    return Socialite::driver('facebook')->redirect();
})->name('loginfacebook');
Route::get('fetchallcategoryengr', function () {
    return response()->json(engCategory::all()->toArray());
});
Route::post('sessionforrole', function (Request $res) {
    session()->put('userrole', $res->role_val);
    session()->put('userrolecategory', $res->role_category);
    return response()->json('ok');
});
Route::get('/facebook/callback', function () {
   
    // if(session()->has('state')){
    //     session()->forget('state');
    //     Session::put('state',Str::random(40));
    // }else{
    //     Session::put('state',Str::random(40));
    // }
    $user = Socialite::driver('facebook')->stateless()->user();
   
    $users       =   User::where(['email' => $user->email])->first();
    if ($users) {
        Auth::login($users);
        if (Auth::user()->role == 'enge') {
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
        } elseif(Auth::user()->role == 'user') {
            return redirect()->route('indexpage');
        }else{
            dd('Please select your role first');
        }
    } else {
       
        $users = User::create([
            'pic' => $user->avatar,
            'fname' => $user->name,
            'emailcode' => rand(111111,999999),
            'email' => $user->email,
            'password' => Hash::make('null12345'),
            'signupoption' => 1,
        ]);
        Auth::login($users);
        dd('Pleae Select Your Role first');
    }

});
Route::get('role_view',function(){
return view('roleselect.select_role');
})->name('role_view');

// ===================email ===========================
require __DIR__ . '/auth.php';
require __DIR__ . '/clienturl.php';
require __DIR__ . '/engineerurl.php';
require __DIR__ . '/adminurl.php';
