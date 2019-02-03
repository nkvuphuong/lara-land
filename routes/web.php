<?php

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

/**
 * ADMIN CONTROL PANEL
 */
Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admincp', 'middleware' => ['guest']], function() {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@loginDo');
});

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admincp', 'middleware' => ['auth:admin']], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
