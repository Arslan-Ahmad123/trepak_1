<?php

use App\Http\Controllers\index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\engineerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ===============all route without any middleware============
// Route::get('test',function(){
// dd(  rand(111111,999999));
// });
Route::get('/', [index::class,'showindex'])->name('home');
// Route::view('/city','city');

Route::post('send_message',[index::class,'send_message'])->name('send_message');
Route::post('sessionsearchengineer',[index::class,'sessionsearchengineer'])->name('sessionsearchengineer');
Route::post('fetchrole',[index::class,'fetchrole'])->name('fetchrole');
Route::post('onegetchatmsg',[index::class,'onegetchatmsg'])->name('onegetchatmsg')->middleware('auth');
Route::post('engrfetchmessagegroup',[engineerController::class,'engrfetchmessagegroup'])->name('engrfetchmessagegroup')->middleware('auth');
// ===================email ===========================
Route::post('/conformemail',function(){
    return view('conformemail.conformemail');
})->name('conformemail');
Route::post('/resendemail',function(){
    dd("Ok");
})->name('resendemail');
// ===================email ===========================

// ===============all route without any middleware============

// ===========routes for all users route with middleware====================

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
    Route::any('/viewprofileeng',[index::class,'viewprofileeng'])->name('viewprofileeng');
    Route::post('/booking',[index::class,'booking'])->name('booking');
    Route::post('/proceed',[index::class,'proceed'])->name('proceed');
    Route::get('/proceed',[index::class,'loginproceed'])->name('proceeds');
});
// Route::post('/user_register',[index::class,'registerformshow'])->name('user_register');
Route::get('/user_regis',[index::class,'register_show'])->name('user_regis');
Route::get('/conformemailpage',[index::class,'conformemailpage'])->name('conformemailpage')->middleware('auth');


Route::post('/conformemailuser',[index::class,'conformemailcode'])->name('conformemailuser');
Route::post('/searchspecificcategory/{id}',[index::class,'searchspecificcategory'])->name('searchspecificcategory');
Route::post('/commentmessage',[index::class,'commentmessage'])->name('commentmessage');



// ===========routes for all users route with middleware====================


// ============Routes for all admin panels=================
Route::middleware(['isAdmin'])->prefix('admin')->group(function () {
    Route::get('/adminconformenge',[adminController::class,'adminconformenge'])->name('adminconformenge');
    Route::get('/adminportal',[adminController::class,'newadminportal'])->name('newadminportal');
    Route::get('/adminunregisenge',[adminController::class,'adminunregisenge'])->name('adminunregisenge');
    Route::post('/aproveenge/{id}',[adminController::class,'particularEngineer'])->name('aproveenge');
    Route::get('/clientpage',[adminController::class,'clientpage'])->name('clientpage');
    Route::get('/deletedata_category/{id}',[adminController::class,'deletedata_category'])->name('deletedata_category');
    Route::get('/fetch_categorydata/{id}',[adminController::class,'fetch_categorydata'])->name('fetch_categorydata');
    Route::get('/fetch_packagedata/{id}',[adminController::class,'fetch_packagedata'])->name('fetch_packagedata');
    // Route::get('/homepage',[adminController::class,'homepage'])->name('homepage');
    Route::post('/logout',[adminController::class,'destroy'])->name('adminlogout');
    // Route::get('/adminportal',[adminController::class,'showadminpanel'])->name('adminpanel');
    Route::get('/registerengineerview',[adminController::class,'registerengineer'])->name('registerengineerview');
    Route::get('/regisenge/{id}',[adminController::class,'regisenge'])->name('regisenge');
    Route::get('/registercategory',[adminController::class,'registercategory'])->name('registercategory');
    Route::post('/saveengineercategory',[adminController::class,'saveengineercategory'])->name('saveengineercategory');
    Route::post('/updatedata_category',[adminController::class,'updatedata_category'])->name('updatedata_category');
    Route::get('/viewcategory',[adminController::class,'viewcategory'])->name('viewcategory');
    Route::get('/createpackage',[adminController::class,'createpackage'])->name('createpackage');
    Route::get('/viewpackage',[adminController::class,'viewpackage'])->name('viewpackage');
    Route::post('/savepackage',[adminController::class,'savepackage'])->name('savepackage');
    Route::get('/viewsavepackage',[adminController::class,'viewsavepackage'])->name('viewsavepackage');
    Route::post('/updatedata_package',[adminController::class,'updatedata_package'])->name('updatedata_package');
    Route::delete('/deletedata_package/{id}',[adminController::class,'deletedata_package'])->name('deletedata_package');
    Route::view('/createengr','adminpages.createengineer.createengrview')->name('createengr');
    Route::view('/viewallengineer','adminpages.viewallengr.viewallengr')->name('viewallengineer');
    Route::post('/admincreateengr',[adminController::class,'admincreateengr'])->name('admincreateengr');
    Route::post('/editengrinfo/{id}',[adminController::class,'editengrinfo'])->name('editengrinfo');
    Route::post('/deleteengr/{id}',[adminController::class,'deleteengr'])->name('deleteengr');
    Route::post('/updateengrinfo',[adminController::class,'updateengrinfo'])->name('updateengrinfo');
    Route::get('/getchatuseradmin',[adminController::class,'getchatuseradmin'])->name('getchatuseradmin');
    Route::view('/adminchat','adminpages.adminchat.adminchatpage')->name('adminchat');
});
Route::get('/set_session_groupid',[adminController::class,'set_session_groupid'])->name('set_session_groupid')->middleware('auth');
Route::get('/del_session_groupid',[adminController::class,'del_session_groupid'])->name('del_session_groupid')->middleware('auth');
Route::get('/storemessage',[adminController::class,'storemessage'])->name('storemessage')->middleware('auth');
// ============Routes for all admin panels=================


// ============Routes for all engineer panels=================
Route::middleware(['isEngineer'])->prefix('engineer')->group(function () {
    // Route::get('/engineerportal',[engineerController::class,'showengineerpanel'])->name('engineerpanel');
    Route::post('/logout',[engineerController::class,'destroy'])->name('engineerlogout');
    Route::get('/newengineerpanel',[engineerController::class,'newengineerpanel'])->name('newengineerpanel');
    Route::get('/engappointment',[engineerController::class,'engappointment'])->name('engappointment');
    Route::get('/engschedule',[engineerController::class,'engschedule'])->name('engschedule');
    Route::get('/engclient',[engineerController::class,'engclient'])->name('engclient');
    Route::get('/engclientprofile',[engineerController::class,'engclientprofile'])->name('engclientprofile');
    Route::get('/enginvoice',[engineerController::class,'enginvoice'])->name('enginvoice');
    Route::get('/engprofilesetting',[engineerController::class,'engprofilesetting'])->name('engprofilesetting');
    Route::get('/engreviews',[engineerController::class,'engreviews'])->name('engreviews');
    Route::get('replyengrcmt',[engineerController::class,'replyengrcmt'])->name('replyengrcmt');
    // Route::get('/engehomepage',[engineerController::class,'engehomepage'])->name('engehomepage');
    Route::get('/engeconformemailpage',[engineerController::class,'engeconformemailpage'])->name('engeconformemailpage');
    Route::get('/engerequest',[engineerController::class,'engerequest'])->name('engerequest');
    Route::get('/getcomments',[engineerController::class,'getcomments'])->name('getcomments');
    Route::get('/getchatuser',[engineerController::class,'getchatuser'])->name('getchatuser');
    Route::view('engr_changepassword','engr_password.engrpasswordpage')->name('engr_changepassword');
    Route::view('engr_profilesetting','engr_password.engrpasswordpage')->name('engr_profilesetting');
    Route::view('engrchat','engineerpage.engrchat.engrchatpage')->name('engrchat');
});

Route::post('/engrfetchmessage',[engineerController::class,'engrfetchmessage'])->name('engrfetchmessage')->middleware('auth');
Route::get('/engregister',[engineerController::class,'engregister'])->name('engregister');
Route::get('/getallgroup',[engineerController::class,'getallgroup'])->name('getallgroup')->middleware('auth');
Route::get('/getallgroupengr',[engineerController::class,'getallgroupengr'])->name('getallgroupengr')->middleware('auth');

    Route::get('/engrlogin',[engineerController::class,'engrlogin'])->name('engrlogin');
    Route::post('/conformemailenge',[engineerController::class,'conformemailenge'])->name('conformemailenge');
// ============Routes for all engineer panels=================

require __DIR__.'/auth.php';
