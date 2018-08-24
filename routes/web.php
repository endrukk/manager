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
})->name('home');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')
    ->name('admin')
    ->middleware('role:user');


/*orders*/
Route::get('/orders', function () {
    return view('orders.default');
})->name('orders');

/*manage users*/
Route::get('/admin/users/{i}', function () {
    return view('users.manage');
})->name('admin.users');
