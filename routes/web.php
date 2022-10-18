<?php

use App\Models\User;
use App\Models\engCategory;
use App\Http\Controllers\index;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [index::class,'showindex'])->name('home');
Route::get('/indexpage', [index::class,'showindex_page'])->name('indexpage');
// Route::view('/indexpage', [index::class,'showindex_page'])->name('indexpage');
// ===================email ===========================
Route::get('/conformemail',function(){
    return view('conformemail.conformemail');
})->name('conformemail');
Route::post('/resendemail',function(){
   return redirect()->back();
})->name('resendemail');
Route::get('/fetchallrangeengr',function(){
    $getuser = User::with('category')->where('role','enge')
->get()->toArray();
return response()->json($getuser);
});
Route::get('/logingoogle', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/fetchcategorynamemap/{id?}',function(engCategory $id){
    return $id->engrcategory;
})->name('fetchcategorynamemap');
 
Route::get('/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
 
    // $user->token
});
Route::get('/loginfacebook', function () {
    // dd('loginfacebook');
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/facebook/callback', function () {
   
    $user = Socialite::driver('facebook')->user();
    dd($user);
    // $user->token
});

// ===================email ===========================
require __DIR__.'/auth.php';
require __DIR__.'/clienturl.php';
require __DIR__.'/engineerurl.php';
require __DIR__.'/adminurl.php';
