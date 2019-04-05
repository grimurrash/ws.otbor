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
        Route::get('/{issue}/edit','IssueController@edit')->name('edit');
        Route::get('/{issue}/delete','IssueController@destroy')->name('delete');
    });
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function (){
        Route::get('/','AdminController@index')->name('index');

        Route::get('/{issue}/danger',function ($issue){
            return view('admin.issues.danger',compact('issue'));
        })->name('danger');
        Route::post('/{issue}/danger','IssueController@danger')->name('danger.update');
        Route::get('/{issue}/success',function ($issue){
            return view('admin.issues.success',compact('issue'));
        })->name('success');
        Route::post('/{issue}/success','IssueController@success')->name('success.update');


        Route::name('categories.')->prefix('categories')->group(function (){
            Route::get('/','CategoryController@index')->name('index');
            Route::get('/new','CategoryController@create')->name('create');
            Route::post('/new','CategoryController@store')->name('store');
            Route::get('/{category}/delete','CategoryController@destroy')->name('delete');
        });
    });
    Route::get('/home', 'HomeController@index')->name('home');
});