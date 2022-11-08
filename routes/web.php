<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
Route::get('/', [App\Http\Controllers\ProductController::class,'productTop']);
Route::get('access', [App\Http\Controllers\ProductController::class,'access'])->name('access');

// 問い合わせ（入力）フォーム
Route::get('/contact', [App\Http\Controllers\ContactsController::class,'index'])->name('contact.index');
// 確認フォーム
Route::post('/contact/confirm', [App\Http\Controllers\ContactsController::class,'confirm'])->name('contact.confirm');
// 完了フォーム
Route::post('/contact/thanks', [App\Http\Controllers\ContactsController::class,'send'])->name('contact.send');