<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

    Route::get('/',function(){
        return view('home');
    })->name('home');
});
