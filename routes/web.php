<?php

use App\Http\Controllers\Enduser\Auth\ForgotPasswordController;
use App\Http\Controllers\Enduser\Auth\LoginController;
use App\Http\Controllers\Enduser\Auth\RegisterController;
use App\Http\Controllers\Enduser\Auth\ResetPasswordController;
use App\Http\Controllers\Enduser\Auth\VerificationController;
use App\Http\Controllers\Enduser\IndexController;
use App\Http\Controllers\Enduser\UsersController;
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




Route::group(['prefix' => 'enduser' , 'as' => 'enduser.'] , function(){
    Route::get('/login' , [LoginController::class,'showLoginForm'])->name('show_login_form');
    Route::post('login' , [LoginController::class,'login'])->name('login');
    Route::post('logout' , [LoginController::class,'logout'])->name('logout');

    Route::get('/register' , [RegisterController::class,'showRegistrationForm'])->name('show_register_form');
    Route::post('/register' , [RegisterController::class,'register'])->name('register');

    Route::get('email/verify' ,[VerificationController::class,'show'])->name('verification.notice');
    Route::post('email/resend' ,[VerificationController::class,'resend'])->name('verification.resend');

});
Route::get('/password/reset/{token}' ,[ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::get('/password/reset' ,[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email' ,[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::post('/password/reset' ,[ResetPasswordController::class,'reset'])->name('password.update');
Route::get('email/verify/{id}/{hash}' ,[VerificationController::class,'verify'])->name('verification.verify');

Route::group(['middleware' => 'verified'],function(){
   Route::get('/dashboard',[UsersController::class,'index'])->name('enduser.dashboard');
   Route::get('/create-post',[UsersController::class,'createPost'])->name('enduser.users.post.create');
   Route::post('/create-post',[UsersController::class,'storePost'])->name('enduser.users.post.store');
});

Route::get('/contact',[IndexController::class,'contact'])->name('contact');
Route::post('/contact',[IndexController::class,'send_message'])->name('contact.send');
Route::get('/',[IndexController::class,'index'])->name('index');

Route::get('/category/{slug}',[IndexController::class,'category'])->name('index.category.posts');
Route::get('/archive/{date}',[IndexController::class,'archive'])->name('index.archive.posts');
Route::get('/author/{username}',[IndexController::class,'author'])->name('index.author.posts');
Route::get('/search',[IndexController::class,'search'])->name('index.search');
Route::get('/{slug}',[IndexController::class,'show'])->name('post.show');
Route::post('/{slug}',[IndexController::class,'commentStore'])->name('comment.store');


