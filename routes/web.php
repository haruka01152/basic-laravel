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
// 使用しないルート
Route::any('email/verification-notification', function(){
    abort(404);
});
Route::any('email/verify', function(){
    abort(404);
});
Route::any('email/verify/{id}/{hash}', function(){
    abort(404);
});
Route::any('forgot-password', function(){
    abort(404);
});
Route::any('reset-password', function(){
    abort(404);
});
Route::any('reset-password/{token}', function(){
    abort(404);
});
Route::any('two-factor-challenge', function(){
    abort(404);
});
Route::any('user/confirm-password', function(){
    abort(404);
});
Route::any('user/confirmed-password-status', function(){
    abort(404);
});
Route::any('user/password', function(){
    abort(404);
});
Route::any('user/profile-information', function(){
    abort(404);
});
Route::any('user/two-factor-authentication', function(){
    abort(404);
});
Route::any('user/two-factor-qr-code', function(){
    abort(404);
});
Route::any('user/two-factor-recovery-codes', function(){
    abort(404);
});


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

            Route::middleware('admin-edit')->group(function(){
                Route::get('add', 'IndexController@add')->name('index.add');
                Route::post('add', 'IndexController@create');
                Route::post('edit/{id}', 'IndexController@update');
                Route::get('delete/{id}', 'IndexController@delete')->name('index.delete');
                Route::post('delete/{id}', 'IndexController@destroy');    
            });

            Route::get('edit/{id}', 'IndexController@edit')->name('index.edit');

            // 仕入先編集処理
            Route::group(['prefix' => 'supplier', 'middleware' => 'admin-edit'], function(){
                Route::get('/', 'SupplierController@index')->name('supplier.index');
                
                Route::get('add', 'SupplierController@add')->name('supplier.add');
                Route::post('add', 'SupplierController@create');

                Route::get('edit/{id}', 'SupplierController@edit')->name('supplier.edit');
                Route::post('edit/{id}', 'SupplierController@update');

                Route::get('delete/{id}', 'SupplierController@delete')->name('supplier.delete');
                Route::post('delete/{id}', 'SupplierController@destroy');

                Route::post('display/{id}', 'SupplierController@display')->name('supplier.display');
            });
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
