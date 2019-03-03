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

    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

    //Post categories
    Route::get('/post-categories/{id}/delete-file', 'PostCategoryController@deleteFile')->name('post-categories.delete-file');
    Route::get('/post-categories/{postCategory}/delete', 'PostCategoryController@destroy')->name('post-categories.delete');
    Route::post('/post-categories/delete', 'PostCategoryController@bulkDestroy')->name('post-categories.set-delete');
    Route::post('/post-categories/set-show', 'PostCategoryController@bulkShow')->name('post-categories.set-show');
    Route::post('/post-categories/set-hide', 'PostCategoryController@bulkHide')->name('post-categories.set-hide');
    Route::resource('/post-categories', 'PostCategoryController');

    //Posts
    Route::get('/posts/{id}/delete-file', 'PostController@deleteFile')->name('posts.delete-file');
    Route::get('/posts/{id}/delete', 'PostController@delete')->name('posts.delete');
    Route::post('/posts/delete', 'PostController@bulkDestroy')->name('posts.set-delete');
    Route::post('/posts/set-show', 'PostController@bulkShow')->name('posts.set-show');
    Route::post('/posts/set-hide', 'PostController@bulkHide')->name('posts.set-hide');
    Route::resource('/posts', 'PostController');

});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
