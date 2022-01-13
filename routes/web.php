<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form;
//use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckoutController;
//use App\Http\Controllers\API\Usercontroller;
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
//use Illuminate\Http\Request;
//use App\Models\tbl_registration;
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

Route::get('/registation', [Form::class,'index']);
Route::post('/registation', [Form::class,'register'])->name('register');



//Route::group(['prefix'=>'user'],function(){

Route::get('/view', [Form::class,'view'])->name('view');
Route::get('/view/delete{id}', [Form::class,'delete'])->name('register.delete');
Route::get('/view/edit{id}', [Form::class,'edit'])->name('register.edit');
Route::post('/view/update', [Form::class,'update']);
Route::get('/login', [Form::class,'log']);
Route::post('/login', [Form::class,'login'])->name('login');
Route::get('/logout', [Form::class,'logout']);
//Route::get('/profile', [LoginController::class,'View']);
//Route::get('/login/google', [LoginController::class,'redirectToGoogle'])->name('login.google');
//Route::get('/login/google/callback', [LoginController::class,'handleGooglecallback'])->name('googlecallback');
//Route::prefix('google')->name('google.')->group( function(){
    Route::get('/login/google', [GoogleController::class, 'loginWithGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('googlecallback');
//});

Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/checkout',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');

//Route::get('/payment',[CheckoutController::class,'payment']);
//Route::post('/payment',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');

//Route::get('/login/facebook', [LoginController::class,'redirectToFacebook'])->name('login.facebook');
//Route::get('/login/facebook/callback', [LoginController::class,'handleFacebookcallback']);
//
//Route::get('/login/github', [LoginController::class,'redirectToGithub'])->name('login.github');
//Route::get('/login/github/callback', [LoginController::class,'handleGithubcallback']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//Route::get('/paypal',function(){
//    return view('myOrder');
//});
//
//// route for processing payment
//Route::post('/paypal', [PaymentController::class, 'payWithpaypal'])->name('paypal');
//
//// route for check status of the payment
//Route::get('/status', [PaymentController::class, 'getPaymentStatus'])->name('status');
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
//Route::post('/login',[API\Usercontroller::class,'login']);
//Route::post('/register',[API\Usercontroller::class,'register']);
//Route::group(['middleware' => 'auth:api'], function()
//{
//    Route::post('/details',[API\Usercontroller::class,'detail']);
//
//});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
//
//
//  
//Route::middleware(['auth','isadmin'])->group(function (){
//
//   Route::get('/dashboard', [Form::class,'view'])->name('view'); 
//   
//});