<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

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
//チャットページでマッチングしたユーザー一覧表示
Route::get('/message', [MessageController::class, 'index'])->name('message-index');
//投稿の詳細画面
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');

//投稿の編集
Route::post('/update', [PostController::class, 'update'])->name('update');

//投稿の削除
Route::post('/destroy', [PostController::class, 'destroy'])->name('destroy');

//////////////////////

//マッチング画面
Route::get('/match', [MatchController::class, 'index'])->name('match-index');
//承認待ちの画面
Route::get('/match/post-show/{id}', [MatchController::class, 'post_show'])->name('match_post_show');
//承認待ちの画面
Route::post('/match/profile-show', [MatchController::class, 'profile_show'])->name('match_profile_show');
//承認待ちの画面
Route::post('/match/approval', [MatchController::class, 'approval'])->name('approval');

//ajaxでユーザー一覧取得
Route::get('/message/api/{id}', [MessageController::class, 'json_data'])->name('json_data');
//ajax確認
Route::post('/message/create/api', [MessageController::class, 'json_create'])->name('json_create');

//チャットページでマッチングしたユーザー一覧表示
Route::get('/message/show/{room_id}/{user_id}', [MessageController::class, 'show'])->name('message-show');
//投稿への応募を情報を渡す
Route::post('/entry', [MatchController::class, 'store'])->name('entry');


//プロフィール画面
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//プロフィール作成画面
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile-create');
//プロフィール編集画面
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile-edit');
//プロフィール編集情報をデータベースへ
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile-update');
//プロフィール編集を渡す
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile-store');
//自分の投稿一覧
Route::get('/profile/post', [ProfileController::class, 'post'])->name('profile-post');
