<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
//use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\CEOController;
//use App\Http\Controllers\API\DeleteController;
use App\Http\Controllers\API\FileController;
 use App\Http\Controllers\API\CountryStateCityController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::post('login', 'API\Usercontroller@login');
//Route::post('register', 'API\Usercontroller@register');
//Route::group(['middleware' => 'auth:api'], function(){
//Route::post('details', 'API\Usercontroller@details');
//});

Route::post('login',[LoginController::class,'login']);
Route::post('register',[RegisterController::class,'register']);
Route::post('upload-file', [FileController::class, 'upload']);
Route::get('view-photo', [FileController::class, 'view'])->name('view');

Route::middleware('auth:api')->group(function () {
    Route::get('user-list', [UserController::class,'Userlist']);
    Route::post('logouts', [LoginController::class,'logouts']);
    Route::apiresource('ceo', CEOController::class);
    });

      
//Route::get('country', [CountryStateCityController::class, 'index']);
//Route::post('state', [CountryStateCityController::class, 'getState']);
//Route::post('city', [CountryStateCityController::class, 'getCity']);

//Route::apiResource('/ceo', 'CEOController')->middleware('auth:api');
//       Route::resource('posts', PostController::class);
//       Route::resource('posts', PostController::class);
//    Route::get('posts', [PostController::class,'update']);
//    Route::delete('delete{id}', [DeleteController::class,'delete']);


