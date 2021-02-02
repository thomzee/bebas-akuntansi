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

use \Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', ['as' => 'welcome', function () {
    if (Auth::guest()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('admin::dashboard.index');
    }

}]);

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin::', 'middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        Route::get('/index', ['as' => 'index', 'uses' => 'DashboardController@index']);
        Route::get('/datatables', ['as' => 'datatables', 'uses' => 'DashboardController@datatables']);
    });
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
