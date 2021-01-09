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

Route::group(['middleware'=>'web'], function(){

    
    // Route::get('panel', 'Desktop\AdministratorController@panel');
    // Route::get('access','Desktop\AdministratorController@access');
    // Route::get('report','Desktop\AdministratorController@report');

/*  ----------     */

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function(){
        return view('welcome');
    });
    Route::get('dashboard','Desktop\DashboardController@index');
    Route::resource('products','product\ProductController');
    Route::resource('mark','mark\MarkController');
    Route::get('listAll/{page?}','product\ProductController@listAll');
    Route::get('modelweb','Desktop\DashboardController@modelWeb');
    
Auth::routes();

//  entendiendo middlewares
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::get('mensaje','Desktop\DashboardController@mensaje');
});

});
