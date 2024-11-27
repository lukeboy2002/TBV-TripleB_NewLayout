<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
route::get('/team', TeamController::class)->name('team');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //    Route::get('/dashboard', function () {
    //        return view('dashboard');
    //    })->name('dashboard');

});

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
Route::get('/specials', function () {
    return view('specials');
})->name('specials');

Route::get('/book', function () {
    return view('book');
})->name('book');
Route::get('/events', function () {
    return view('events');
})->name('events');
Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
