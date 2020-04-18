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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('profile/history', 'ProfileController@history')->name('profile.history');
    Route::put('profile', 'ProfileController@update')->name('profile.update');

    Route::get('password', 'PasswordController@edit')->name('password.edit');
    Route::put('password', 'PasswordController@update')->name('password.update');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.'], function(){

    require(__DIR__. '/backend/master.php');
    require(__DIR__. '/backend/intern.php');
    require(__DIR__. '/backend/curriculum.php');

});

Route::group(['middleware' => 'auth', 'namespace' => 'Frontend', 'as' => 'frontend.'], function (){

    require (__DIR__. '/frontend/intern.php');

});
