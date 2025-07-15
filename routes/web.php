<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController as PublicPostController;

//publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita/{post:slug}', [PublicPostController::class, 'show'])->name('news.show');


//cms
Route::middleware(['auth', 'verified'])
     ->prefix('admin')
     ->name('admin.') 
     ->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('admin.posts.index');
    })->name('dashboard'); 

    Route::resource('posts', AdminPostController::class);
});

require __DIR__.'/auth.php';