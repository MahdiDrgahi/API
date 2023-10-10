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
    Route::post('logout' ,[UserController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
    Route::put('update/{id}',[UserController::class, 'update'])->name('update');
    Route::post('adduser',[UserController::class, 'adduser'])->name('adduser');
    Route::get('alluser',[UserController::class, 'alluser'])->name('alluser');
    Route::delete('deleteuser/{id}',[UserController::class, 'deleteuser'])->name('deleteuser');

});
Route::post('order' ,[OrderController::class, 'order'])->name('order');
Route::put('update/{id}',[OrderController::class, 'update'])->name('update');
Route::post('addorder',[OrderController::class, 'addorder'])->name('addorder');
Route::get('allorder',[OrderController::class, 'allorder'])->name('allorder');
Route::delete('deleteorder/{id}',[OrderController::class, 'deleteorder'])->name('deleteorder');



Route::post('factore' ,[FactoreController::class, 'factore'])->name('factore');
Route::put('update/{id}',[FactoreController::class, 'update'])->name('update');
Route::post('addfactore',[FactoreController::class, 'addfactore'])->name('addfactore');
Route::get('allfactore',[FactoreController::class, 'allfactore'])->name('allfactore');
Route::delete('deletefactore/{id}',[FactoreController::class, 'deletefactore'])->name('deletefactore');


Route::post('product' ,[ProductController::class, 'product'])->name('product');
Route::put('update/{id}',[ProductController::class, 'update'])->name('update');
Route::post('addproduct',[ProductController::class, 'addproduct'])->name('addproduct');
Route::get('allproduct',[ProductController::class, 'allproduct'])->name('allproduct');
Route::delete('delete/{id}',[ProductController::class, 'delete'])->name('delete');

