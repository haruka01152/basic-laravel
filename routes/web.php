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

// ログイン前
Route::get('/', function(){
    return view('auth.login');
});

// ログイン後
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/', 'Controller@home')->name('home');

    Route::prefix('index')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('find/{find}', 'IndexController@find')->name('index.find');

        Route::get('add', 'IndexController@add')->name('index.add');
        Route::post('add', 'IndexController@create');

        Route::get('edit', 'IndexController@edit')->name('index.edit');
        Route::post('edit', 'IndexController@update');
    });

    Route::get('log', 'IndexController@log')->name('log');

    Route::get('csv', 'IndexController@csv')->name('csv');

    Route::get('settings', 'IndexController@settings')->name('settings');
});

