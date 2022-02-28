<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => true
]);

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/nieuwsartikelen', [App\Http\Controllers\NewsArticlesController::class, 'index'])->name('admin.newsarticles.index');
    Route::get('/admin/nieuwsartikelen/edit/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'edit'])->name('admin.newsarticles.edit');
    Route::get('/admin/nieuwsartikelen/delete/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'delete'])->name('admin.newsarticles.delete');
    Route::post('/admin/nieuwsartikelen/store', [App\Http\Controllers\NewsArticlesController::class, 'store'])->name('admin.newsarticles.store');
    Route::post('/admin/nieuwsartikelen/update/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'update'])->name('admin.newsarticles.update');
});