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
//Frontend
Route::get('/','HomeController@index');
//home page
Route::get('/trangchu','HomeController@index');
//
//
///
//Backend
//admin index
Route::get('/admin','AdminController@index');
//admin dashboard
Route::get('/dashboard','AdminController@show_dashboard');
//admin login
Route::post('/admin-dashboard','AdminController@dashboard');
//admin logout
Route::get('/logout','AdminController@logout');

//CategoryProduct
Route::get('/add-category-product','CategoryProduct@add_category_product');

Route::get('/all-category-product','CategoryProduct@all_category_product');

// ẩn và hiện danh mục sản phẩm
Route::get("unactive-category-product/{category_product_id}", "CategoryProduct@unactive_category_product");
Route::get("active-category-product/{category_product_id}", "CategoryProduct@active_category_product");


Route::post('/save-category-product','CategoryProduct@save_category_product');