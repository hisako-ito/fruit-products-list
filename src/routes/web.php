<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/register', [ProductController::class, 'add']);
Route::post('/products/register', [ProductController::class, 'create']);
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/{product}', [ProductController::class, 'edit']);
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy']);
Route::patch('/products/{product}/update', [ProductController::class, 'update']);
