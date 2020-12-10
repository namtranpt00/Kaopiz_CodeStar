<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Models\Post;

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

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('task1', [HomeController::class, 'task1'])->name('homework.task1');
Route::get('home',[HomeController::class, 'index'])->name('home');
Route::get('post',[HomeController::class, 'post_create'])->name('post_create');
//    ->middleware('login','check_role');
Route::post('post',[HomeController::class, 'post_save'])->name('post_save');
Route::get('post_list',[HomeController::class, 'post_list'])->name('post_list');
Route::get('post/delete/{post}',[HomeController::class, 'post_delete'])->name('post_delete');
Route::get('post/edit/{post}',[HomeController::class, 'post_edit'])->name('post_edit');
Route::post('post/update/{post}',[HomeController::class, 'post_update'])->name('post_update');





