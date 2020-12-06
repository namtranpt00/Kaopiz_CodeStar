<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
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
Route::get('home', function () {
    return "is admin";
})->middleware(['check_token']);
Route::get('login', function () {
    return "loginPage";
});
Route::get('task1', [HomeController::class, 'task1'])->name('homework.task1');
Route::get('task2', [HomeController::class, 'task2Form'])->name('homework.task2Form');
Route::get('task2/display', [HomeController::class, 'task2Display'])->name('homework.task2Display');
//Route::get('/welcome/', function () {
//    return view('posts.index', ['name' => 'nam']);
//});
//Route::get('/home/{name?}', [HomeController::class, 'index']);
//Route::get('/demo', [HomeController::class, 'demo']);
//Route::get('/anotherDemo', [HomeController::class, 'anotherDemo']);
//Route::get('/demo1', function (){
//    return response('hello world',200)->header('content-type', 'text/plain');
//}) ;
//Route::get('posts',[PostController::class, 'index'])->name('posts.index');
//Route::get('/task', [HomeController::class, 'task1']);




