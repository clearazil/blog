<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts/{post}/comments/store', [CommentController::class, 'store'])->name('comment.store');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/admin', [PostController::class, 'adminIndex'])->name('admin.post.index');
    Route::get('/admin/posts/{post}', [PostController::class, 'adminShow'])->name('admin.post.show');
});
