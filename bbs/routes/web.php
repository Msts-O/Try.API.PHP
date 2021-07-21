<?php

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

Route::resource('/articles', App\Http\Controllers\ArticleController::class);
//from v.8.0, second argument needs to pass the class file(app\http\controllers\〜controller)
Route::resource('/comment', App\Http\Controllers\CommentController::class,['only' => ['store','update','destroy']]);
Route::resource('/reply', App\Http\Controllers\ReplyController::class,['only' => ['store','update','destroy']]);


Auth::routes();

