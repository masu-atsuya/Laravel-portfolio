<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//最初
Route::get('/', [PostController::class, 'top'])->name('top');

//自分以外の全ての投稿一覧が見れるようにする
Route::get('/home', [PostController::class, 'home'])->name('home');

//投稿作成画面
Route::get('/create', [PostController::class, 'create'])->name('create');

//投稿画面の情報を渡す
Route::post('/store', [PostController::class, 'store'])->name('store');

//マッチング画面
Route::get('/matching', [PostController::class, 'matching'])->name('matching');

//マッチング画面
Route::get('/chat', [PostController::class, 'chat'])->name('chat');



//投稿の詳細画面
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');


//投稿への応募を情報を渡す
Route::post('/show-store', [PostController::class, 'show-store'])->name('show-store');



//応募完了画面
Route::post('/show-finish', [PostController::class, 'show-finish'])->name('show-finish');

//投稿の編集
Route::post('/update', [PostController::class, 'update'])->name('update');

//投稿の削除
Route::post('/destroy', [PostController::class, 'destroy'])->name('destroy');
