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

    //Product categories
    Route::get('/product-categories/{id}/delete-file', 'ProductCategoryController@deleteFile')->name('product-categories.delete-file');
    Route::get('/product-categories/{productCategory}/delete', 'ProductCategoryController@destroy')->name('product-categories.delete');
    Route::post('/product-categories/delete', 'ProductCategoryController@bulkDestroy')->name('product-categories.set-delete');
    Route::post('/product-categories/set-show', 'ProductCategoryController@bulkShow')->name('product-categories.set-show');
    Route::post('/product-categories/set-hide', 'ProductCategoryController@bulkHide')->name('product-categories.set-hide');
    Route::resource('/product-categories', 'ProductCategoryController');

    //Product
    Route::get('/products/{id}/delete-file', 'ProductController@deleteFile')->name('products.delete-file');
    Route::get('/products/{id}/delete', 'ProductController@delete')->name('products.delete');
    Route::post('/products/delete', 'ProductController@bulkDestroy')->name('products.set-delete');
    Route::post('/products/set-show', 'ProductController@bulkShow')->name('products.set-show');
    Route::post('/products/set-hide', 'ProductController@bulkHide')->name('products.set-hide');
    Route::resource('/products', 'ProductController');

    //Orders
    Route::get('/orders/{order}/delete', 'OrderController@destroy')->name('orders.delete');
    Route::post('/orders/delete', 'OrderController@bulkDestroy')->name('orders.set-delete');
    Route::resource('/orders', 'OrderController');

    //Slider
    Route::get('/sliders/{slider}/delete', 'SliderController@destroy')->name('sliders.delete');
    Route::post('/sliders/delete', 'SliderController@bulkDestroy')->name('sliders.set-delete');
    Route::resource('/sliders', 'SliderController');

    //Users
    Route::resource('/users', 'UserController');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
