<?php

use App\Http\Controllers as Controller;
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
    return view('welcome');
});

Route::post('/login', [Controller\UserController::class, 'login']);
Route::resource('/user', Controller\UserController::class);
Route::resource('/produk', Controller\ProdukController::class);
