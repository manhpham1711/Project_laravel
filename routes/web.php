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
Route::post('/website/seafood/search', 'SeafoodController@searchByPriceOrName');
Route::post('/website/seafood/up', 'SeafoodController@ascProductOrPrice');
Route::post('/website/seafood/down', 'SeafoodController@descProductOrPrice');

//giỏ hàng
Route::get('/website/cart', 'Custumer\CartController@indexCart')->name('custumer.cart');
Route::get('/cart/{id}/increase', 'Custumer\CartController@updateIncreaseQuantity');
Route::get('/cart/{id}/reduction', 'Custumer\CartController@updateReductionQuantity');
Route::delete('/cart/delete/{id}', 'Custumer\CartController@delete');
Route::post('/website/cart/add/{id}', 'Custumer\CartController@addCart');
Route::get('/website/cart/deleteAll', 'Custumer\CartController@deleteAll');

// Thanh toán
Route::post('/website/pay/{id}', 'Custumer\PayController@buy');
Route::post('/website/sale', 'Custumer\PayController@sale');
///////////----------------------

//Đăng nhập đăng xuất
Route::get('/website/login', 'User\LoginController@index')->name('user.index');
Route::get('/website/register', 'User\LoginController@register')->name('user.register');
Route::post('/website/login', 'User\LoginController@login');
Route::get('/website/logout', 'User\LoginController@logout');
Route::post('/website/register', 'User\LoginController@create');

// người dùng
Route::get('/website/user', 'Custumer\CustumerController@index')->name('custumer.information');

Route::group(['middleware' => 'App\Http\Middleware\CheckAccess'], function () {

// giao diện admin.
	Route::get('/admin/', 'Admin\AdminController@index')->name('admin.index');
// giao diện quản lý sản phẩm
	Route::get('/admin/seafood', 'Admin\AdminSeafoodController@index')->name('admin.seafood.index');

//thêm sản phẩm
	Route::get('/admin/seafood/add', 'Admin\AdminSeafoodController@formAdd')->name('admin.seafood.add');
	Route::post('/admin/seafood/add', 'Admin\AdminSeafoodController@add_seafood');

//Sửa sản phẩm
	Route::get('admin/seafood/edit/{id}', 'Admin\AdminSeafoodController@formEdit')->name('admin.seafood.edit');
	Route::post('admin/seafood/update', 'Admin\AdminSeafoodController@update');
	Route::delete('/admin/seafood/delete/{id}', 'Admin\AdminSeafoodController@delete');

//Quan lý tài khoảng
	Route::get('/admin/account', 'Admin\AdminAccountController@index')->name('admin.user.index');
	Route::delete('/admin/account/delete/{id}', 'Admin\AdminAccountController@delete');
	Route::get('/admin/account/edit/route/{id}', 'Admin\AdminAccountController@formEditRoute')->name('admin.user.editRoute');
	Route::post('/admin/account/edit/route/{id}', 'Admin\AdminAccountController@updateRoute');

//Quảng lý thanh toán.

});

Route::get('/admin/seafood/order', 'Admin\AdminPayController@index');
Route::get('/admin/seafood/money', 'Admin\AdminMoneyController@index')->name('admin.money');
Route::get('/admin/seafood/money/confirm/{id}', 'Admin\AdminMoneyController@confirm');
Route::delete('/admin/seafood/money/delete/{id}', 'Admin\AdminMoneyController@delete');

Route::post('/website/payment/{id}', 'Custumer\PaymentController@filed');