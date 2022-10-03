<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

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