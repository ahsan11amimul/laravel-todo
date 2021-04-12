<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TodoController;


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
//Auth routes
Route::match(['get', 'post'],'/register',[AuthController::class,'register'])->name('register');
Route::match(['get', 'post'],'/login',[AuthController::class,'login'])->name('login');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
// Todos routes
// Route::get('/todos',[TodoController::class,'index'])->middleware('auth');
// Route::get('/todos/create',[TodoController::class,'create'])->middleware('auth');
// Route::post('/todos',[TodoController::class,'store'])->name('todos')->middleware('auth');
// Route::get('/todos/{todo}/edit',[TodoController::class,'edit'])->middleware('auth');
// Route::PUT('/todos/{todo}',[TodoController::class,'update'])->name('todos.update')->middleware('auth');
// Route::PUT('/todos/{todo}',[TodoController::class,'destroy'])->name('todos.destroy')->middleware('auth');

Route::resource('todos', TodoController::class)->middleware('auth');