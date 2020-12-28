<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;
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
    Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/user/profile/show', [UserProfileController::class, 'show'])->name('user.profile.show');
    Route::get('/user/profile/digest/subscribe', [UserProfileController::class, 'subscribeForDigest'])
        ->name('user.profile.digest.subscribe');
    Route::get('/user/profile/digest/unsubscribe', [UserProfileController::class, 'unsubscribeForDigest'])
        ->name('user.profile.digest.unsubscribe');
    Route::get('/user/profile/premium/subscribe', [UserProfileController::class, 'createPremiumSubscription'])
        ->name('user.profile.premium.create');
    Route::post('/user/profile/premium/subscribe', [UserProfileController::class, 'storePremiumSubscription'])
        ->name('user.profile.premium.store');

    Route::get('/admin', [PostController::class, 'adminIndex'])->name('admin.post.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/posts/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/posts/{post}', [PostController::class, 'adminShow'])->name('admin.post.show');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('/admin/posts/{post}/update', [PostController::class, 'update'])->name('admin.post.update');
    Route::delete('/admin/posts/{post}/delete', [PostController::class, 'delete'])->name('admin.post.delete');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update'])
        ->name('admin.category.update');
    Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'delete'])
        ->name('admin.category.delete');
});
