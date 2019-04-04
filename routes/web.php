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
})->name('index');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (){
    Route::name('issues.')->prefix('issues')->group(function (){
        Route::get('/new','IssueController@create')->name('new');
        Route::post('/new','IssueController@store')->name('store');
        Route::get('/list','IssueController@create')->name('list');
    });
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function (){
        Route::get('/','AdminController@index')->name('index');
    });
});