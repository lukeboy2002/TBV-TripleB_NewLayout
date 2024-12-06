<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
route::get('/team', TeamController::class)->name('team');
Route::resource('/events', EventController::class)->only(['index', 'show']);
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //    Route::get('/dashboard', function () {
    //        return view('dashboard');
    //    })->name('dashboard');
    Route::resource('games', GameController::class)->except(['destroy']);

    Route::post('filepondupload', [FilepondController::class, 'upload'])->name('filepond.upload');
    Route::delete('filepondrevert', [FilepondController::class, 'revert'])->name('filepond.revert');
});

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
