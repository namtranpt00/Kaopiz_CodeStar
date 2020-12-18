<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Models\Post;
use \App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Auth\LoginController;

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
    return redirect()->route('home');

})->middleware('auth');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('task1', [HomeController::class, 'task1'])->name('homework.task1');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('post', [PostController::class, 'post_create'])->name('post_create');
//    ->middleware('login','check_role');
Route::post('post', [PostController::class, 'post_save'])->name('post_save');
Route::get('post/list', [PostController::class, 'post_list'])->name('post_list');
Route::get('post/delete/{post}', [PostController::class, 'post_delete'])->name('post_delete');
Route::get('post/edit/{post}', [PostController::class, 'post_edit'])->name('post_edit');
Route::post('post/update/{post}', [PostController::class, 'post_update'])->name('post_update');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
