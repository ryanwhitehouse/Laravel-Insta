<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/search', [App\Http\Controllers\SearchController::class, 'show'])->name('search.show');
Route::post('/search/results', [App\Http\Controllers\SearchController::class, 'results'])->name('search.results');

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::patch('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post');