<?php


use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::post('admin/users/register', 'UserController@register')->name('admin.users.register');

// clients video url
Route::get('clientvideos/showvideo/{token}', 'ClientVideoController@showVideo')->name('clientvideos.showvideo');

// usuarios registrados
Route::group(['middleware' => 'auth'], function () {

    /**
     * metric
     */
    Route::get('admin/metrics', function () {
    return view('chart.index');
    })->name('admin.metrics');

  Route::get('admin/business/show/{business_id}', 'BusinessController@show')->name('admin.business.show');


  Route::get('business/alluser/{business_id}', 'BusinessController@allUserBusiness')->name('business.alluser');

  // url options
  Route::get('admin/options/{option_id}', 'OptionController@getOptionById')->name('admin.options');

  // url clients
  Route::resource('admin/clients', 'ClientController')->names([
    'index' => 'admin.clients.index',
    'show' => 'admin.clients.show',
    'create' => 'admin.clients.create',
    'store' => 'admin.clients.store',
    'edit' => 'admin.clients.edit',
    'update' => 'admin.clients.update',
    'destroy' => 'admin.clients.destroy'
  ]);

  // url features
  Route::resource('admin/features', 'UserController')->names([
    'index' => 'admin.features.index',
    'show' => 'admin.features.show',
    'create' => 'admin.features.create',
    'store' => 'admin.features.store',
    'edit' => 'admin.features.edit',
    'update' => 'admin.features.update',
    'destroy' => 'admin.features.destroy'
  ]);

  // url products
  Route::resource('admin/products', 'UserController')->names([
    'index' => 'admin.products.index',
    'show' => 'admin.products.show',
    'create' => 'admin.products.create',
    'store' => 'admin.products.store',
    'edit' => 'admin.products.edit',
    'update' => 'admin.products.update',
    'destroy' => 'admin.products.destroy'
  ]);

  // url videos
  Route::resource('admin/videos', 'VideoController')->names([
    'index' => 'admin.videos.index',
    'show' => 'admin.videos.show',
    'create' => 'admin.videos.create',
    'store' => 'admin.videos.store',
    'edit' => 'admin.videos.edit',
    'update' => 'admin.videos.update',
    'destroy' => 'admin.videos.destroy'
  ]);

  // user url
  Route::get('admin/users/gallery', 'UserController@gallery')->name('admin.users.gallery');

  // urls sessions
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

/**
 * info clinets
 */
Route::get('privacidad', function () {
  return view('privacidad');
})->name('privacidad');

/**
 * privacity
 */
Route::get('', function () {
  return Redirect::to('admin');
})->name('/');


/**
 * err
 */
Route::get('home', function () {  return Redirect::to('404'); })->name('home');
Route::get('404', function () {   return view('404'); })->name('404');
Route::get('403', function () {   return view('403'); })->name('403');

// usuarios super admin & admin
Route::group(['middleware' => 'admin'], function () {

  // urls links bases
  Route::get('admin/home', 'HomeController@index')->name('admin.home');
  Route::get('admin', function () {
      return view('main');
  })->name('admin');

  // urls users
  Route::get('admin/users/change', 'UserController@changePassword')->name('admin.users.change');
  Route::post('admin/users/store-password', 'UserController@storePassword')->name('admin.users.store-password');
  Route::get('admin/users/status/{user_id}', 'UserController@changeStatus')->name('admin.users.status');
  Route::resource('admin/users', 'UserController')->names([
      'index' => 'admin.users.index',
      'show' => 'admin.users.show',
      'create' => 'admin.users.create',
      'store' => 'admin.users.store',
      'edit' => 'admin.users.edit',
      'update' => 'admin.users.update',
      'destroy' => 'admin.users.destroy'
  ]);

  // urls business
  Route::get('admin/business/mybusiness', 'BusinessController@myBusiness')->name('admin.business.mybusiness');

  // clients video link url
  Route::get('admin/clientvideos/linkvideo/{video_id}', 'ClientVideoController@indexLink')->name('admin.clientvideos.linkvideo');

});

// usuarios super admin
Route::group(['middleware' => 'suso'], function () {

  // urls business
  Route::get('admin/business/status/{business_id}', 'BusinessController@changeStatus')->name('admin.business.status');
  Route::resource('admin/business', 'BusinessController')->names([
      'index' => 'admin.business.index',
      'create' => 'admin.business.create',
      'store' => 'admin.business.store',
      'edit' => 'admin.business.edit',
      'update' => 'admin.business.update',
      'destroy' => 'admin.business.destroy'
  ]);

  // urls settings

});
