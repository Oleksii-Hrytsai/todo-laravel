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

Route::get('/', function () {
    return view('index');
});
Route::get('/plans', function () {
    return view('layouts.pages.plans');
});
Route::get('/projects', function () {
    return view('layouts.pages.projects');
});
Route::get('/chat', function () {
    return view('layouts.pages.chat');
});
Route::get('/profile', function () {
    return view('layouts.pages.profile');
});
Route::get('/authorization', function () {
    return view('layouts.pages.authorization');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
