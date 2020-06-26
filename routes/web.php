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

// giao diện chính
Route::get('/website/seafood', 'SeafoodController@index')->name('index');

// giao diện admin.
Route::get('/admin/', 'Admin\AdminController@index')->name('admin.index');

//giỏ hàng
Route::get('/website/cart', 'Custumer\CartController@indexCart')->name('custumer.cart');
Route::get('/cart/{id}/increase', 'Custumer\CartController@updateIncreaseQuantity');
Route::get('/cart/{id}/reduction', 'Custumer\CartController@updateReductionQuantity');
Route::delete('/cart/delete/{id}', 'Custumer\CartController@delete');
Route::post('/website/cart/add/{id}', 'Custumer\CartController@addCart');
Route::get('/website/cart/deleteAll', 'Custumer\CartController@deleteAll');

//san pham
// giao diện quản lý sản phẩm
Route::get('/admin/seafood', 'Admin\AdminSeafoodController@index')->name('admin.seafood.index')->middleware('admin');

//thêm sản phẩm
Route::get('/admin/seafood/add', 'Admin\AdminSeafoodController@formAdd')->name('admin.seafood.add');
Route::post('/admin/seafood/add', 'Admin\AdminSeafoodController@add_seafood');

//Sửa sản phẩm
Route::get('admin/seafood/edit/{id}', 'Admin\AdminSeafoodController@formEdit')->name('admin.seafood.edit');
Route::post('admin/seafood/update', 'Admin\AdminSeafoodController@update');
Route::delete('/admin/seafood/delete/{id}', 'Admin\AdminSeafoodController@delete');

//Đăng nhập đăng xuất
Route::get('/website/login', 'User\LoginController@index')->name('user.index');
Route::get('/website/register', 'User\LoginController@register')->name('user.register');
Route::post('/website/login', 'User\LoginController@login');
Route::get('/website/logout', 'User\LoginController@logout');
Route::post('/website/register', 'User\LoginController@create');

//Quan lý tài khoảng
Route::get('/admin/account', 'Admin\AdminAccountController@index')->name('admin.user.index');
Route::delete('/admin/account/delete/{id}', 'Admin\AdminAccountController@delete');
Route::get('/admin/account/edit/route/{id}', 'Admin\AdminAccountController@formEditRoute')->name('admin.user.editRoute');
Route::post('/admin/account/edit/route/{id}', 'Admin\AdminAccountController@updateRoute');

// người dùng

Route::get('/website/user', 'Custumer\CustumerController@index')->name('custumer.information');
