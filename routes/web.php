<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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
    // without login accessable page
    Route::get('/login', 'loginPageView')->name('login');
    Route::get('/register', 'registerPageView')->name('register');
    Route::get('/forget', 'forgetPageView')->name('forget');
    Route::post('/registration','adminRegistration')->name('registration');
    Route::post('/admin-login','login')->name('adminLogin');
    Route::get('verifyUser/{id}', 'verifyUser');
    // after session or login
    Route::middleware(['guardAdmin'])->group(function(){
        Route::view('/dashboard', 'admin/pages/dashboard')->name('dashboard');
        Route::get('sendMail','sendMail')->name('Mail-send');
        Route::view('/compose-mail','admin/pages/mail/create-mail')->name('compose-mail');

    });


});

Route::controller(CompanyController::class)->prefix('/admin')->group(function(){
    Route::middleware(['guardAdmin'])->group(function(){
        Route::post('insertCompanyData','CompanyRegistration')->name('CompanyRegistration');
        Route::post('insertReceiptData','CompanyReceipt')->name('CompanyReceipt');
        Route::post('insertFunderData','CompanyFunder')->name('CompanyFunder');
        Route::get('/create-company-profile', 'CompanyView')->name('create-company');
        Route::get('/create-receipt', 'ReceiptView')->name('create-receipt');
        Route::get('/create-funder', 'FunderView')->name('create-funder');
        Route::get('/create-funder-list', 'FunderListView')->name('funder-list');
        Route::get('/create-receipt-list', 'ReceiptListView')->name('receipt-list');
        Route::get('/create-receipt-setting', 'ReceiptSettingView')->name('receipt-setting');
        Route::post('/receipt-setting', 'ReceiptSettingForm')->name('receipt-setting-form');
        Route::get('PDF-preview/{format}','PDF_generator')->name('pdf-preview');
        Route::post('/get-funder','getFunder')->name('get-funder');
        Route::get('/mail-setting','MailPage')->name('mail-setting');
        Route::post('sendMail','sendMail')->name('Mail-send');
        Route::get('receipt-delete/{id}','deleteRow')->name('receipt-delete');

     });
});
Route::controller(UserController::class)->prefix('/admin')->group(function(){
    Route::middleware('guardAdmin')->group(function(){
        Route::get('create-user','userFormView')->name('create-user');
        Route::post('insertNewUser','createUser')->name('new-user');
    });

});

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

