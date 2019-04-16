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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{slug}','ProductController@show');

Route::get('/category/{slug}','CategoryController@show');

Route::post('/cart/add','CartController@add');

Route::post('/cart/remove','CartController@remove');

Route::get('/cart','CartController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/_admin/login',function() {
       return view('admin.auth.index');
})->name('admin.login');

Route::group(['prefix'=>'_admin','middleware' => ['auth'],'namespace' => 'Admin'],function() {

    Route::get('/home', 'DashboardController@index');
    //Users
    Route::get('/users', 'UserController@index');
    Route::get('/users/create', 'UserController@create')->name('admin.users.create');;
    Route::post('/users/store','UserController@store')->name('admin.users.store');
    Route::get('/users/{id}', 'UserController@show')->name('admin.users');
    Route::any('/users/destroy/{id}','UserController@destroy')->name('admin.users.destroy');

    //Categories
    Route::get('/category','CategoryController@index')->name('admin.category');
    Route::get('/category/create','CategoryController@create')->name('admin.category.create');
    Route::post('/category/store','CategoryController@store')->name('admin.category.store');
    Route::get('/category/{id}','CategoryController@show')->name('admin.category.show');

    //Товары
    Route::get('/products','ProductController@index')->name('admin.products.index');
    Route::get('/products/{id}','ProductController@show')->name('admin.products.show');
   
});


