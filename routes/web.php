<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(AuthController::class)->prefix('/admin')->group(function(){

    Route::get('/login', 'loginPageView')->name('login');
    Route::get('/register', 'registerPageView')->name('register');
    Route::get('/forget', 'forgetPageView')->name('forget');
    Route::post('/registration','adminRegistration')->name('registration');
    Route::post('/admin-login','login')->name('adminLogin');

    Route::middleware(['guardAdmin'])->group(function(){
        Route::view('/dashboard', 'admin/pages/dashboard')->name('dashboard');
        Route::view('/create-company-profile', 'admin/pages/create-company')->name('create-company');
        Route::view('/create-receipt', 'admin/pages/create-receipt')->name('create-receipt');
        Route::get('sendMail','sendMail');
        Route::view('/compose-mail','admin/pages/mail/create-mail')->name('compose-mail');
        Route::view('/mail-setting','admin/pages/mail/mail-setting')->name('mail-setting');



    });
    Route::get('verifyUser/{id}', 'verifyUser');

});

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

