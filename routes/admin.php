<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admin' , 'as' => 'admin.'] , function(){
    Route::get('/login' , [LoginController::class,'showLoginForm'])->name('show_login_form');
    Route::post('login' , [LoginController::class,'login'])->name('login');
    Route::post('logout' , [LoginController::class,'logout'])->name('logout');

    Route::get('/password/reset' ,[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email' ,[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}' ,[ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('/password/reset' ,[ResetPasswordController::class,'reset'])->name('password.update');

    Route::get('email/verify' ,[VerificationController::class,'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}' ,[VerificationController::class,'verify'])->name('verification.verify');
    Route::post('email/resend' ,[VerificationController::class,'resend'])->name('verification.resend');
});
