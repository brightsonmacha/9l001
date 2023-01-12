<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FallbackController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/edit/{id}', [PostController::class, 'update']);
Route::post('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');

Route::get('/users', [UsersController::class, 'index']);

Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index');
});


Route::fallback(FallbackController::class);
