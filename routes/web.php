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

Route::get('/admin/dashboard', 'Admin\AdminHomeController@init')
    ->name('admin')
    ->middleware();

/* MENU */
Route::get('/admin/menus/list', 'Admin\AdminMenuController@getList')
    ->name('admin.menu.list')
    ->middleware();
Route::get('/admin/menus/edit/{id}', 'Admin\AdminMenuController@edit')
    ->name('admin.menu.edit')
    ->middleware();
Route::post('/admin/menus/process', 'Admin\AdminMenuController@process')
    ->name('admin.menu.process')
    ->middleware();
Route::get('/admin/menus/delete/{id}', 'Admin\AdminMenuController@delete')
    ->name('admin.menu.delete')
    ->middleware();
Route::get('/admin/menus/activation/{id}', 'Admin\AdminMenuController@activation')
    ->name('admin.menu.activation')
    ->middleware();

/* MENU ITEM */
Route::post('/admin/menu-items/process/', 'Admin\AdminMenuItemController@process')
    ->name('admin.menu_item.process')
    ->middleware();


/*orders*/
Route::get('/orders', function () {
    return view('orders.default');
})->name('orders');

/*manage users*/
Route::get('/admin/users/{i}', function () {
    return view('users.manage');
})->name('admin.users');
