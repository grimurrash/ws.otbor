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

Route::get('/', 'IssueController@index')->name('index');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');


Route::middleware('auth')->group(function (){
    Route::name('issues.')->prefix('issues')->group(function (){
        Route::get('/new','IssueController@create')->name('new');
        Route::post('/new','IssueController@store')->name('store');
        Route::get('/{issue}','IssueController@show')->name('show');
    });
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function (){
        Route::get('/home','AdminController@index')->name('index');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});