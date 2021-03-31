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

//Auth::routes(['register' => false]);


Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () { 
Route::resource('quotes','QuotesController');
Route::post('import-quotes','QuotesController@import')->name('quotes.import');
Route::post('/subcategories/get_subcategories_by_category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');
});