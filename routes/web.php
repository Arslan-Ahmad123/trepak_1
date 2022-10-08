<?php

use App\Http\Controllers\index;
use Illuminate\Support\Facades\Route;

Route::get('/', [index::class,'showindex'])->name('home');
Route::view('/indexpage', 'newpanel.newpanelview')->name('indexpage');
// ===================email ===========================
Route::get('/conformemail',function(){
    return view('conformemail.conformemail');
})->name('conformemail');
Route::post('/resendemail',function(){
    dd("Ok");
})->name('resendemail');


// ===================email ===========================
require __DIR__.'/auth.php';
require __DIR__.'/clienturl.php';
require __DIR__.'/engineerurl.php';
require __DIR__.'/adminurl.php';
