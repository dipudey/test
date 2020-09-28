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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Studetn Dashbaord Routes 
Route::group(['middleware' => ['auth','student']],function() {
    Route::get('/dashboard',"DashboardController@index")->name('dashboard');
    // Student MealController Routes
    Route::get('/meal',"Student\MealController@index")->name('student.meal');
    Route::post('/meal/store',"Student\MealController@mealStore")->name('student.meal.store');
});

// Admin Dashboard Routes 
Route::prefix('admin')->middleware(['auth','admin'])->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    // FoodController Routes 
    Route::get('/foo','Admin\FoodController@index')->name('food');
    Route::post('/foo/store','Admin\FoodController@store')->name('food.store');
    Route::get('/foo/{id}/destroy','Admin\FoodController@destroy')->name('food.destroy');
    Route::get('/meal','Admin\MealController@index')->name('meal');
    Route::post('/meal/date/store','Admin\MealController@dateStore')->name('meal.date.store');
    Route::post('/meal/store','Admin\MealController@mealStore')->name('meal.store');
    Route::get('/meal/search','Admin\MealController@mealSearchByDate')->name('meal.search');
    Route::get('/meal/search/by/date/','Admin\MealController@searching')->name('meal.searching');

    // ProductController Routes
    Route::get('/product','Admin\ProductController@index')->name('product');
    Route::post('/product/store','Admin\ProductController@store')->name('product.store');
    Route::get('/product/{id}/destroy','Admin\ProductController@destroy')->name('product.destroy');
    Route::get('/product/all/json','Admin\ProductController@productAllJson');
    Route::get('/product/price/{id}/json','Admin\ProductController@productPrice');

    // OrderController Routes
    Route::get('/order','Admin\OrderController@index')->name('order');
    Route::get('/new-order','Admin\OrderController@create')->name('order.create');
    Route::post('/order/store','Admin\OrderController@store')->name('order.store');
    Route::get('/order/item/list/{order_id}/json','Admin\OrderController@orderItemList');
});