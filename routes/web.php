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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('master/buyer', 'Master\BuyerController'); 

Route::get('buyer/datatable', 'Master\BuyerController@getTableData')->name('buyer/datatable'); 

Route::delete('/buyer/{id}', 'Master\BuyerController@destroy');

Route::resource('master/product', 'Master\ProductController'); 

Route::get('product/datatable', 'Master\ProductController@getTableData')->name('product/datatable'); 

Route::delete('/product/{id}', 'Master\ProductController@destroy');

Route::get('product/index', 'productController@index')->name('product/index');

Route::get('master/buyer/{id}/view', 'Master\BuyerController@view')->name('master/buyer/{id}/view');






