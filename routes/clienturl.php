<?php
use App\Http\Controllers\index;
use Illuminate\Support\Facades\Route;


Route::middleware(['isUser'])->prefix('user')->group(function () {
    Route::get('/userfrontview',[index::class,'showuserpanel'])->name('userfrontpageview');
    // Route::get('/userfrontview',[index::class,'showuserpanel'])->name('userfrontpageview');
    Route::post('/logout',[index::class,'destroy'])->name('userlogout');
    Route::get('/clientprofile',[index::class,'clientprofile'])->name('clientprofile');
    Route::get('/clientchangepassword',[index::class,'clientchangepassword'])->name('clientchangepassword');
    Route::get('/clientprofilesetting',[index::class,'clientprofilesetting'])->name('clientprofilesetting');
    Route::get('/engineerprofile',[index::class,'engineerprofile'])->name('engineerprofile');
    Route::get('/clientsearchengr',[index::class,'clientsearchengr'])->name('clientsearchengr');
    Route::post('/conformorder',[index::class,'conformorder'])->name('conformorder');
    Route::get('/conformorderpage',[index::class,'conformorderpage'])->name('conformorderpage');
    Route::get('/fetchorderinfo/{id}',[index::class,'fetchorderinfo'])->name('fetchorderinfo');
    Route::view('clientchat','client.clientchat.clientchatpage')->name('clientchat');
    Route::get('/searchengineer/{id}', [index::class,'engineersearch'])->name('searchengineer');
    Route::get('/search_engr_card', [index::class,'search_engr_card'])->name('search_engr_card');
    Route::post('/searchbarengineer', [index::class,'searchbarengineer'])->name('searchbarengineer');
    Route::get('/search_engr', [index::class,'search_engr'])->name('search_engr');
    Route::any('/viewprofileeng',[index::class,'viewprofileeng'])->name('viewprofileeng');
    Route::any('/view_profileeng',[index::class,'viewp_rofileeng'])->name('view_profileeng');
    Route::post('/booking',[index::class,'booking'])->name('booking');
    Route::get('/book_ing',[index::class,'book_ing'])->name('book_ing');
    Route::post('/proceed',[index::class,'proceed'])->name('proceed');
    Route::get('/proceed',[index::class,'loginproceed'])->name('proceeds');
});
// Route::post('/user_register',[index::class,'registerformshow'])->name('user_register');
Route::get('/user_regis',[index::class,'register_show'])->name('user_regis');
Route::get('/conformemailpage',[index::class,'conformemailpage'])->name('conformemailpage')->middleware('auth');


Route::post('/conformemailuser',[index::class,'conformemailcode'])->name('conformemailuser');
Route::post('/searchspecificcategory/{id}',[index::class,'searchspecificcategory'])->name('searchspecificcategory');
Route::post('/commentmessage',[index::class,'commentmessage'])->name('commentmessage');

Route::post('send_message',[index::class,'send_message'])->name('send_message');
Route::post('sessionsearchengineer',[index::class,'sessionsearchengineer'])->name('sessionsearchengineer');
Route::post('fetchrole',[index::class,'fetchrole'])->name('fetchrole');
Route::post('onegetchatmsg',[index::class,'onegetchatmsg'])->name('onegetchatmsg')->middleware('auth');

// ===========routes for all users route with middleware====================