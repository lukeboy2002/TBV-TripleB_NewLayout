<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationAcceptController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
route::get('/team', TeamController::class)->name('team');
Route::resource('/events', EventController::class)->only(['index', 'show']);
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{album:slug}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/accept-invitation/create', [InvitationAcceptController::class, 'create'])->name('accept-invitation.create')->middleware('has_invitation');
Route::post('/accept-invitation', [InvitationAcceptController::class, 'store'])->name('accept-invitation.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('filepondupload', [FilepondController::class, 'upload'])->name('filepond.upload');
    Route::delete('filepondrevert', [FilepondController::class, 'revert'])->name('filepond.revert');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin|member'])->group(function () {
    Route::resource('games', GameController::class)->except(['destroy']);

    Route::get('/invitation/create', [InvitationController::class, 'create'])->name('invitation.create');
    Route::post('/invitation', [InvitationController::class, 'store'])->name('invitation.store');
    Route::resource('/users', UserController::class);
});
