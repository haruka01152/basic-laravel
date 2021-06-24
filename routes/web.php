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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // 初回ログイン時パスワード変更を要求する
    Route::get('/password-change', 'Controller@passchange')->name('passchange');
    Route::post('password-change', 'Controller@passchange_done')->name('passchange_done');

    // 最初のパスワード変更後アクセス可能
    Route::middleware(['passchange'])->group(function () {
        Route::get('/', 'Controller@home')->name('home');

        // Index下の処理
        Route::prefix('index')->group(function () {
            Route::get('/', 'IndexController@index')->name('index');

            Route::get('add', 'IndexController@add')->name('index.add');
            Route::post('add', 'IndexController@create');

            Route::get('edit/{id}', 'IndexController@edit')->name('index.edit');
            Route::post('edit/{id}', 'IndexController@update');

            Route::get('delete/{id}', 'IndexController@delete')->name('index.delete');
            Route::post('delete/{id}', 'IndexController@destroy');
        });

        Route::get('log', 'HomeController@log')->name('log');

        Route::get('csv', 'HomeController@csv')->name('csv');
        Route::get('download', 'HomeController@download')->name('download');

        Route::get('mypage', 'HomeController@mypage')->name('mypage');

        // 管理画面へのアクセス
        Route::group(['middleware' => 'administrator', 'prefix' => 'admin'], function () {
            Route::get('/', 'AdminController@index')->name('admin');

            Route::get('add', 'AdminController@add')->name('admin.add');
            Route::post('add', 'AdminController@create');

            Route::get('edit/{id}', 'AdminController@edit')->name('admin.edit');
            Route::post('edit/{id}', 'AdminController@update');

            Route::get('delete/{id}', 'AdminController@delete')->name('admin.delete');
            Route::post('delete/{id}', 'AdminController@destroy');
        });
    });
});
