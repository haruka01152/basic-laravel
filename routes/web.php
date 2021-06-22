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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/', 'Controller@home')->name('home');

    Route::prefix('index')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');

        Route::get('add', 'IndexController@add')->name('index.add');
        Route::post('add', 'IndexController@create');

        Route::get('edit', 'IndexController@edit')->name('index.edit');
        Route::post('edit', 'IndexController@update');
    });

    Route::get('log', 'HomeController@log')->name('log');

    Route::get('csv', 'HomeController@csv')->name('csv');
    Route::get('download', 'HomeController@download')->name('download');

    Route::get('mypage', 'HomeController@mypage')->name('mypage');
});

