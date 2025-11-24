<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UserController::class, 'showRegister'])->name('view.register');
Route::get('/login', [UserController::class, 'showLogin'])->name('view.login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login/store', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/create/order', [OrderController::class, 'showOrders'])->name('view.orders');

Route::get('/form/order', [OrderController::class, 'showCreateOrder'])->name('view.order.form');
Route::post('/store/order', [OrderController::class, 'createOrder'])->name('create.order');


Route::get('/admin', [OrderController::class, 'showAdmin'])->name('view.admin');

Route::post('/admin/update/{id}', [OrderController::class, 'updateStatus'])->name('update.status');
