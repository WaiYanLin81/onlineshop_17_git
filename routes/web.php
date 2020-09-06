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
// frontend
Route::get('/','PageController@mainfun')->name('mainpage');
Route::get('brand','PageController@brandfun')->name('brandpage');
Route::get('itemdetail','PageController@detailfun')->name('itemdetailpage');
Route::get('loginpage','PageController@loginfun')->name('loginpage');

Route::get('registerpage','PageController@registerfun')->name('registerpage');

Route::get('promotions','PageController@promotionfun')->name('promotionpage');

Route::get('itemsbybrand/{id}','PageController@itemsbybrand')->name('itemsbybrandpage');

Route::get('itemsbycategory/{id}','PageController@itemsbycategory')->name('itemsbycategorypage');

Route::get('fliteritems/{id}','PageController@fliteritems')->name('fliteritemspage');



Route::get('shoppingcart','PageController@shoppingcartfun')->name('shoppingcartpage');

Route::get('subcategory','PageController@subcategoryfun')->name('subcategorypage');

Route::get('detail/{id}','PageController@detailfun')->name('itemdetailpage');

Route::resource('orders','OrderController');
Route::get('order_history','OrderController@order_history')->name('order_history');



// backkend
Route::middleware('role:Admin')->group(function(){
Route::get('dashboard','BackendController@dashboardfun')->name('dashboardpage');


Route::resource('items','ItemController');
Route::resource('brands','BrandController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
});

Auth::routes();

Route::get('/home' , 'HomeController@index')->name('home');


Route::resource('ok','GoController');


