<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\engineerController;


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
// Route::view('engrdocs','conformdocs.conformdocs')->name('engrdocs');
Route::get('engrdocs',function(){
    if(Auth::check() && Auth::user()->role == 'enge'){
        if(Auth::user()->docsstatus ==  1){
            if (Auth::user()->status == 0) {
                return redirect(RouteServiceProvider::ADMINSTATUS);
            } else {
                return redirect(RouteServiceProvider::ENGE);
            }
        }else{
            return view('conformdocs.conformdocs');
        }
    }else{
        return redirect()->back();
    }
   
})->name('engrdocs');

Route::post('/engrfetchmessage',[engineerController::class,'engrfetchmessage'])->name('engrfetchmessage')->middleware('auth');
Route::post('/engrdocsmentation',[engineerController::class,'engrdocsmentation'])->name('engrdocsmentation')->middleware('auth');
Route::get('/engregister',[engineerController::class,'engregister'])->name('engregister')->middleware('Preventpage');
Route::get('/getallgroup',[engineerController::class,'getallgroup'])->name('getallgroup')->middleware('auth');
Route::get('/getallgroupengr',[engineerController::class,'getallgroupengr'])->name('getallgroupengr')->middleware('auth');

Route::get('/engrlogin',[engineerController::class,'engrlogin'])->name('engrlogin');
Route::post('/conformemailenge',[engineerController::class,'conformemailenge'])->name('conformemailenge');
Route::post('engrfetchmessagegroup',[engineerController::class,'engrfetchmessagegroup'])->name('engrfetchmessagegroup')->middleware('auth');
// ============Routes for all engineer panels=================