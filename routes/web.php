<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Auth::routes();
//admin routes
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('user', [HomeController::class, 'userIndex'])->name('user.index');
Route::get('user/create', [HomeController::class, 'userCreate'])->name('user.create');
Route::post('user/store', [HomeController::class, 'userStore'])->name('user.store');
Route::get('user/edit{id}', [HomeController::class, 'edit'])->name('user.edit');
Route::put('user/update{id}', [HomeController::class, 'update'])->name('user.update');
Route::get('user/delete{id}', [HomeController::class, 'delete'])->name('user.delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//category
Route::resource('category', CategoryController::class);
Route::get('category{id}', [CategoryController::class, 'destroy'])->name('category.delete');
//post
Route::resource('post', PostController::class);
Route::get('post{id}', [PostController::class, 'destroy'])->name('post.delete');
