<?php

use App\Models\User;
use App\Models\engCategory;
use Illuminate\Support\Str;
use App\Events\conformemail;
use Illuminate\Http\Request;
use App\Http\Controllers\index;
use App\Models\appointmentInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

route::get('/timeformat', function () {
    $date = '17:00';
    $newDate = \Carbon\Carbon::createFromFormat('H:i', $date)->format('h:i A');
    dd($newDate);
});
Route::get('/', [index::class, 'showindex'])->name('home');
Route::get('/indexpage', [index::class, 'showindex_page'])->name('indexpage');
Route::get('/index_page', [index::class, 'showindex_page'])->name('index_page');
// Route::view('/indexpage', [index::class,'showindex_page'])->name('indexpage');
// ===================email ===========================
Route::get('userstatusonline', function () {
    if (Cache::has('userlogin' . Auth::user()->id)) {
    } else {
        Cache::put('userlogin' . Auth::user()->id, true);
    }
    return response()->json('yes make a new active status');
});
Route::get("getallonlineenge", function () {
    $getalluser = User::select('id')->where('role', 'enge')->get()->toArray();
    $online_engr = [];
    foreach ($getalluser as $id_user) {
        if (Cache::has('userlogin' . $id_user['id'])) {
            $online_engr[] = $id_user['id'];
        }
    }
    return response()->json($online_engr);
})->name('getallonlineenge');
Route::post('onlineenge_arr', function (Request $res) {
    if (Cache::has('userlogin' . $res->engr_arr)) {
        return response()->json('yes');
    } else {
        return response()->json('no');
    }
})->name('onlineenge_arr');
Route::post("getallonlineenge_arr", function (Request $res) {
    $getalluser = $res->engr_arr;
    $online_engr = [];
    foreach ($getalluser as $id_user) {
        if (Cache::has('userlogin' . $id_user)) {
            $online_engr[] = $id_user;
        }
    }
    return response()->json($online_engr);
})->name('getallonlineenge_arr');
Route::get('userstatusoffline', function () {
    if (Cache::has('userlogin' . Auth::user()->id)) {
        Cache::pull('userlogin' . Auth::user()->id);
    }
    return response()->json('yes offline status');
});

Route::get('/conformemail', function () {

    if (Auth::check() && Auth::user()->role == 'enge') {
        if (Auth::user()->emailstatus == 1) {
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
            return view('conformemail.conformemail');
        }
    } else {
        return redirect()->back();
    }
})->name('conformemail');
Route::post('/resendemail', function () {

    if (Auth::check() && Auth::user()->role == 'enge') {
        if (Auth::user()->emailstatus == 1) {
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
            $user = Auth::user();
            Event(new conformemail($user));
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
        return redirect()->back();
    }
})->name('resendemail');
Route::post('submit_role', function (Request $res) {

    if ($res->select_role == 'enge') {
        User::where('email', Auth::user()->email)->update([
            'role' => $res->select_role,
            'engrcategoryid' => $res->select_engr_category,
            'latitude' => $res->lat,
            'longitude' => $res->lon,
            'city' => $res->city,
            'subcity' => $res->locality,
            'state' => $res->state,
            'country' => $res->country,
            'short_country' => $res->shortcountry,
            'address' => $res->address,
        ]);
        $user =  User::where('email', Auth::user()->email)->get();
        Event(new conformemail($user[0]));
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
    } else {
        User::where('email', Auth::user()->email)->update([
            'role' => $res->select_role,
            'latitude' => $res->lat,
            'longitude' => $res->lon,
            'city' => $res->city,
            'subcity' => $res->locality,
            'state' => $res->state,
            'country' => $res->country,
            'short_country' => $res->shortcountry,
            'address' => $res->address,
        ]);
        return redirect(RouteServiceProvider::INDEXPAGE);
    }
})->name('submit_role');
Route::get('/fetchallrangeengr', function () {
    $getuser = User::with('category')->where('role', 'enge')
        ->get()->toArray();
    return response()->json($getuser);
});
Route::get('/fetchallrangeengrdfl', function () {
    $getuser = User::with('category')->where('role', 'enge')->where('country', 'pakistan')
        ->get()->toArray();
    return response()->json($getuser);
});
Route::get('/logingoogle', function (Request $request) {
    return Socialite::driver('google')->redirect();
})->name('logingoogle');
Route::get('/fetchcategorynamemap/{id?}', function (engCategory $id) {
    return $id->engrcategory;
})->name('fetchcategorynamemap');

Route::get('/google/callback', function () {
    if (Auth::check()) {
        $users =  Auth::user();

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
    } else {
        $user = Socialite::driver('google')->stateless()->user();
        $users       =   User::where(['email' => $user->email])->first();

        event(new Registered($users));

        if ($users) {
            if ($users->signupoption == 0) {
                User::where(['email' => $user->email])->update([
                    'pic' => $user->avatar,
                    'fname' => $user->name,
                    'password' => Hash::make('null12345'),
                    'signupoption' => 1,
                ]);
            }
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

                Cache::put('userlogin' . Auth::user()->id, true);
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
        } else {
            $users = User::create([
                'pic' => $user->avatar,
                'fname' => $user->name,
                'emailcode' => rand(111111, 999999),
                'email' => $user->email,
                'password' => Hash::make('null12345'),
                'emailstatus' => 0,
                'signupoption' => 1,
                'status' => 0,
            ]);
            Auth::login($users);
            return redirect()->route('role_view');
        }
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



    if (Auth::check()) {
        $users =  Auth::user();

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
    } else {
        $user = Socialite::driver('facebook')->stateless()->user();
        $users       =   User::where(['email' => $user->email])->first();
        event(new Registered($users));
        session()->set('user_login', 'yes');
        if ($users) {
            if ($users->signupoption == 0) {
                User::where(['email' => $user->email])->update([
                    'pic' => $user->avatar,
                    'fname' => $user->name,
                    'password' => Hash::make('null12345'),
                    'signupoption' => 1,
                ]);
            }
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

                Cache::put('userlogin' . Auth::user()->id, true);
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
        } else {

            $users = User::create([
                'pic' => $user->avatar,
                'fname' => $user->name,
                'emailcode' => rand(111111, 999999),
                'email' => $user->email,
                'password' => Hash::make('null12345'),
                'emailstatus' => 0,
                'signupoption' => 1,
                'status' => 0,
            ]);
            Auth::login($users);
            return redirect()->route('role_view');
        }
    }
});
Route::get('role_view', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'enge') {
            if (Auth::user()->emailstatus == 0) {
                return redirect(RouteServiceProvider::EMAILVERIFY);
            } else {
                if (Auth::user()->docsstatus == 0) {
                    return redirect(RouteServiceProvider::DOCSSTATUS);
                } else {
                    if (Auth::user()->status == 0) {
                        return redirect(RouteServiceProvider::ADMINSTATUS);
                    } else {
                        return redirect()->back();
                    }
                }
            }
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->back();
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
            // return redirect(RouteServiceProvider::INDEXPAGE);
            return redirect()->back();
        } else {
            if (Auth::user()->role == null) {
                return view('roleselect.select_role');
            } else {
                return redirect()->back();
            }
        }
    } else {
        return redirect()->back();
    }
})->name('role_view');
Route::get('getdistance', function () {

    $new_longitude =  Auth::user()->longitude;
    $new_latitude = Auth::user()->latitude;

    $engr_array = [];
    $user = User::where('role', 'enge')->get()->toArray();

    foreach ($user as $user) {

        $old_longitude = $user['longitude'];
        $old_latitude = $user['latitude'];
        $dLat = deg2rad($new_latitude - $old_latitude);
        $dLon = deg2rad($new_longitude - $old_longitude);
        $radius = 6371;
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($old_latitude)) * cos(deg2rad($new_latitude)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $radius * $c; // Distance in km

        if ($d <= 100) {

            array_push($user, $d);

            $engr_array[] = $user;
        }
    }
    dd($engr_array);
    session()->push('all_engrs', $engr_array);



    //          $lat =  Auth::user()->longitude; 
    //     $lon = Auth::user()->latitude;

    //        $user =  DB::table("users")

    // ->select("users.id"

    //     ,DB::raw("2 * 6371 * atan2(sqrt(sin((".$lat." - users.latitude) / 2) *sin((".$lon." - users.longitude)) + cos(deg2rad(users.latitude)) * cos(deg2rad(".$lat.")) *sin((".$lat." - users.latitude) / 2) *sin((".$lon." - users.longitude)/2)    ),sqrt(1- sin((".$lat." - users.latitude) / 2) *sin((".$lon." - users.longitude)) + cos(deg2rad(users.latitude)) * cos(deg2rad(".$lat.")) *sin((".$lat." - users.latitude) / 2) *sin((".$lon." - users.longitude)/2)    ))    AS distance"))

    //     ->where('role','enge')

    //     ->paginate(5);
    //                dd($user);
    // $lat =  Auth::user()->longitude; 
    // $lon = Auth::user()->latitude;
    // $user =  User::select("users.id"
    //         ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
    //         * cos(radians(users.latitude)) 
    //         * cos(radians(users.longitude) - radians(" . $lon . ")) 
    //         + sin(radians(" .$lat. ")) 
    //         * sin(radians(users.latitude))) AS distance"))->where('role','enge')
    //         ->get();
    //         dd($user);

    //     $query = new User();
    //     $from_latitude =  Auth::user()->longitude;
    //     $from_longitude = Auth::user()->latitude;
    //     $distance = 100;
    //     $raw = DB::raw('ROUND ( ( 6371 * acos( cos( radians('.$from_latitude.') ) * cos( radians( latitude /1000000) ) * cos( radians( longitude /1000000) - radians('.$from_longitude.') ) + sin( radians('.$from_latitude.') ) * sin( radians( latitude /1000000) ) ) ) ) AS distance');
    //    $res =  $query->select('*')->addSelect($raw)->orderBy( 'distance', 'ASC' )->groupBy('distance')->having('distance', '<=', $distance);
    //    dd($res );
});

Route::get('returnsession', function () {
    $res = session()->get('all_engrs');
    if ($res == null) {
        return response()->json([]);
    } else {
        return response()->json($res[0]);
    }
})->name('returnsession');
Route::get('returnclientsession', function () {
    $res = session()->get('search_client_address');
    if ($res == null) {
        return response()->json([]);
    } else {
        return response()->json($res);
    }
})->name('returnclientsession');
Route::post('getuserlanlog', function (Request $res) {
    $new_longitude =  $res->lon;
    $new_latitude = $res->lat;
    $engr_array = [];
    $user = User::where('role', 'enge')->get()->toArray();

    foreach ($user as $users) {
        $category = engCategory::find($users['engrcategoryid']);
        $old_longitude = $users['longitude'];
        $old_latitude = $users['latitude'];
        $dLat = deg2rad($new_latitude - $old_latitude);
        $dLon = deg2rad($new_longitude - $old_longitude);
        $radius = 6371;
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($old_latitude)) * cos(deg2rad($new_latitude)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $radius * $c; // Distance in km
        if ($d <= 100) {

            // array_push($users, $d);
            // array_push($users,$categoryname->engrcategory);
            $users['distance'] = $d;
            $users['category'] = $category;
            $engr_array[] = $users;
        }
    }
    return response()->json($engr_array);
    // if (session()->has('all_engrs')) {
    //     session()->forget('all_engrs');
    //     session()->push('all_engrs', $engr_array);
    // } else {
    //     session()->push('all_engrs', $engr_array);
    // }
});
Route::get('clienteng_register_page', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('registerpage.registerpageview');
    }
})->name('clienteng_register_page');

Route::get('complaintcell', function () {
    $data = appointmentInfo::where('clientid', Auth::user()->id)->distinct()->get(['engrid']);

    return view('client.complaintcell.complaintcell')->with(['data' => $data]);
})->name('complaintcell');
Route::post('getuserlanlog_cn', function (Request $res) {
    $new_longitude =  $res->lon;
    $new_latitude = $res->lat;
    $engr_array = [];
    $user = User::where('role', 'enge')->where('country', $res->country)->get()->toArray();

    foreach ($user as $users) {
        $category = engCategory::find($users['engrcategoryid']);
        $old_longitude = $users['longitude'];
        $old_latitude = $users['latitude'];
        $dLat = deg2rad($new_latitude - $old_latitude);
        $dLon = deg2rad($new_longitude - $old_longitude);
        $radius = 6371;
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($old_latitude)) * cos(deg2rad($new_latitude)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $radius * $c; // Distance in km
        if ($d <= 80) {

            // array_push($users, $d);
            // array_push($users,$categoryname->engrcategory);
            $users['distance'] = $d;
            $users['category'] = $category;
            $engr_array[] = $users;
        }
    }
    return response()->json($engr_array);
    // if (session()->has('all_engrs')) {
    //     session()->forget('all_engrs');
    //     session()->push('all_engrs', $engr_array);
    // } else {
    //     session()->push('all_engrs', $engr_array);
    // }
});

// ===================email ===========================
require __DIR__ . '/auth.php';
require __DIR__ . '/clienturl.php';
require __DIR__ . '/engineerurl.php';
require __DIR__ . '/adminurl.php';
