<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => true
]);

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/calander', [App\Http\Controllers\CalenderItemsController::class, 'index'])->name('admin.calendaritems.index');
    Route::get('/admin/calander/delete/{calendaritem}', [App\Http\Controllers\CalenderItemsController::class, 'delete'])->name('admin.calendaritems.delete');
    Route::post('/admin/calander/store', [App\Http\Controllers\CalenderItemsController::class, 'store'])->name('admin.calendaritems.store');
    Route::post('/admin/calander/update/{calendaritem}', [App\Http\Controllers\CalenderItemsController::class, 'update'])->name('admin.calendaritems.update');

    Route::get('/admin/nieuwsartikelen', [App\Http\Controllers\NewsArticlesController::class, 'index'])->name('admin.newsarticles.index');
    Route::get('/admin/nieuwsartikelen/edit/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'edit'])->name('admin.newsarticles.edit');
    Route::get('/admin/nieuwsartikelen/delete/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'delete'])->name('admin.newsarticles.delete');
    Route::post('/admin/nieuwsartikelen/store', [App\Http\Controllers\NewsArticlesController::class, 'store'])->name('admin.newsarticles.store');
    Route::post('/admin/nieuwsartikelen/update/{newsarticles}', [App\Http\Controllers\NewsArticlesController::class, 'update'])->name('admin.newsarticles.update');
    
    Route::get('/admin/nieuwsbrieven', [App\Http\Controllers\NewslettersController::class, 'index'])->name('admin.newsletters.index');
    Route::get('/admin/nieuwsbrieven/edit/{newsarticles}', [App\Http\Controllers\NewslettersController::class, 'edit'])->name('admin.newsletters.edit');
    Route::get('/admin/nieuwsbrieven/delete/{newsarticles}', [App\Http\Controllers\NewslettersController::class, 'delete'])->name('admin.newsletters.delete');
    Route::post('/admin/nieuwsbrieven/store', [App\Http\Controllers\NewslettersController::class, 'store'])->name('admin.newsletters.store');
});