<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('test', function () {
	return response([1,2,3], 200);
});

Route::post('forgot-password', 'UserController@forgotPassword');
Route::post('reset-password', 'UserController@resetPassword');
Route::post('user-register', 'UserController@registerPassword');
Route::post('user-register-social', 'UserController@registerSocial');
Route::post('user-active', 'UserController@activeUser');

Route::get('allow-access/{secretUpdate}', 'UserController@allowAccess');

Route::middleware('auth:api')->get('/user', function (Request $request) {
		if ($request->user()->status == 1) {
			return $request->user();
		}

		return response(['data' => 'User is not activated :('], 404);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
		Route::post('change-password', 'UserController@changePasswordApi');

		/*allow access */
		Route::post('business/allow-access', 'BusinessController@allowAccess');

		/*business url*/
    Route::get('business-list', 'BusinessController@getBusinessList');
		Route::post('business-get', 'BusinessController@getBusinessById');
		
});


