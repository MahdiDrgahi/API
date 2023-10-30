<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FactoreController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('logout' ,[UserController::class, 'logout'])->name('logout');
});
    Route::put('update/{id}',[UserController::class, 'update'])->name('update')->middleware('permission:edit-customer');
    Route::post('adduser',[UserController::class, 'adduser'])->name('adduser')->middleware('permission:create-customer');
    Route::get('alluser',[UserController::class, 'alluser'])->name('alluser');
    Route::delete('deleteuser/{id}',[UserController::class, 'deleteuser'])->name('deleteuser')->middleware('permission:delete-customer');


Route::post('order' ,[OrderController::class, 'order'])->name('order');
Route::put('update/{id}',[OrderController::class, 'update'])->name('update')->middleware('permission:edit-order');
Route::post('addorder',[OrderController::class, 'addorder'])->name('addorder')->middleware('permission:add-order');
Route::get('allorder',[OrderController::class, 'allorder'])->name('allorder');
Route::delete('deleteorder/{id}',[OrderController::class, 'deleteorder'])->name('deleteorder')->middleware('permission:delete-order');



Route::post('factore' ,[FactoreController::class, 'factore'])->name('factore');
Route::put('update/{id}',[FactoreController::class, 'update'])->name('update')->middleware('permission:edit-factor');
Route::post('addfactore',[FactoreController::class, 'addfactore'])->name('addfactore')->middleware('permission:add-factor');
Route::get('allfactore',[FactoreController::class, 'allfactore'])->name('allfactore');
Route::delete('deletefactore/{id}',[FactoreController::class, 'deletefactore'])->name('deletefactore')->middleware('permission:delete-factor');


Route::post('product' ,[ProductController::class, 'product'])->name('product');
Route::put('update/{id}',[ProductController::class, 'update'])->name('update')->middleware('permission:edit-product');
Route::post('addproduct',[ProductController::class, 'addproduct'])->name('addproduct')->middleware('permission:add-product');
Route::get('allproduct',[ProductController::class, 'allproduct'])->name('allproduct');
Route::delete('delete/{id}',[ProductController::class, 'delete'])->name('delete')->middleware('permission:delete-product');

//Relation user
Route::get('order_find/{id}',[UserController::class,'orderFind'])->name('orderFind');
Route::get('factore_find/{id}',[UserController::class,'FactoreFind'])->name('FactoreFind');


//Relation factor
Route::get('find_user/{id}',[FactoreController::class,'FindUser'])->name('FindUser');
Route::get('find_order/{id}',[FactoreController::class,'FindOrder'])->name('FindOrder');
Route::get('find_product/{id}',[FactoreController::class,'FindProduct'])->name('FindProduct');

//Relation product

Route::get('user_find/{id}',[ProductController::class,'UserFind'])->name('UserFind');
Route::get('factore_find/{id}',[ProductController::class,'FactoreFind'])->name('FactoreFind');
Route::get('find_order/{id}',[ProductController::class,'FindOrder'])->name('FindOrder');

//Relation order

Route::get('find_product/{id}',[OrderController::class,'FindProduct'])->name('FindProduct');
Route::get('find_user/{id}',[OrderController::class,'FindUser'])->name('FindUser');
Route::get('find_factore/{id}',[OrderController::class,'FindFactore'])->name('FindFactore');
