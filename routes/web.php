<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => true
]);

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'sendmail'])->name('contact.sendmail');

Route::get('/calender', [App\Http\Controllers\CalenderItemsController::class, 'index'])->name('calendaritems.index');
Route::get('/calender/{calendaritem}', [App\Http\Controllers\CalenderItemsController::class, 'show'])->name('calendaritems.show');

Route::get('/nieuws', [App\Http\Controllers\NewsArticlesController::class, 'index'])->name('newsarticles.index');
Route::get('/nieuws/{newsarticle}', [App\Http\Controllers\NewsArticlesController::class, 'show'])->name('newsarticles.show');

Route::get('/nieuwsbrieven', [App\Http\Controllers\NewsLettersController::class, 'index'])->name('newsletters.index');
Route::get('/nieuwsbrieven/download/{file}', [App\Http\Controllers\NewsLettersController::class, 'download'])->name('newsletter.download');

Route::get('/over-ons', [App\Http\Controllers\AboutusController::class, 'index'])->name('aboutus.index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/fotos', [App\Http\Controllers\Admin\PhotoGalleryItemsController::class, 'index'])->name('admin.photogallery.index');
    Route::get('/admin/fotos/create', [App\Http\Controllers\Admin\PhotoGalleryItemsController::class, 'create'])->name('admin.photogallery.create');
    Route::post('/admin/fotos/store', [App\Http\Controllers\Admin\PhotoGalleryItemsController::class, 'store'])->name('admin.photogallery.store');
    Route::get('/admin/fotos/delete/{item}', [App\Http\Controllers\Admin\PhotoGalleryItemsController::class, 'delete'])->name('admin.photogallery.delete');

    Route::get('/admin/categorie', [App\Http\Controllers\Admin\PhotoGalleryCategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categorie/delete/{category}', [App\Http\Controllers\Admin\PhotoGalleryCategoriesController::class, 'delete'])->name('admin.categories.delete');
    Route::post('/admin/categorie/store', [App\Http\Controllers\Admin\PhotoGalleryCategoriesController::class, 'store'])->name('admin.categories.store');
    Route::post('/admin/categorie/update/{category}', [App\Http\Controllers\Admin\PhotoGalleryCategoriesController::class, 'update'])->name('admin.categories.update');

    Route::get('/admin/calender', [App\Http\Controllers\Admin\CalenderItemsController::class, 'index'])->name('admin.calendaritems.index');
    Route::get('/admin/calender/delete/{calendaritem}', [App\Http\Controllers\Admin\CalenderItemsController::class, 'delete'])->name('admin.calendaritems.delete');
    Route::post('/admin/calender/store', [App\Http\Controllers\Admin\CalenderItemsController::class, 'store'])->name('admin.calendaritems.store');
    Route::post('/admin/calender/update/{calendaritem}', [App\Http\Controllers\Admin\CalenderItemsController::class, 'update'])->name('admin.calendaritems.update');

    Route::get('/admin/nieuwsartikelen', [App\Http\Controllers\Admin\NewsArticlesController::class, 'index'])->name('admin.newsarticles.index');
    Route::get('/admin/nieuwsartikelen/edit/{newsarticles}', [App\Http\Controllers\Admin\NewsArticlesController::class, 'edit'])->name('admin.newsarticles.edit');
    Route::get('/admin/nieuwsartikelen/delete/{newsarticles}', [App\Http\Controllers\Admin\NewsArticlesController::class, 'delete'])->name('admin.newsarticles.delete');
    Route::post('/admin/nieuwsartikelen/store', [App\Http\Controllers\Admin\NewsArticlesController::class, 'store'])->name('admin.newsarticles.store');
    Route::post('/admin/nieuwsartikelen/update/{newsarticles}', [App\Http\Controllers\Admin\NewsArticlesController::class, 'update'])->name('admin.newsarticles.update');
    
    Route::get('/admin/nieuwsbrieven', [App\Http\Controllers\Admin\NewslettersController::class, 'index'])->name('admin.newsletters.index');
    Route::get('/admin/nieuwsbrieven/delete/{newsletter}', [App\Http\Controllers\Admin\NewslettersController::class, 'delete'])->name('admin.newsletter.delete');
    Route::post('/admin/nieuwsbrieven/store', [App\Http\Controllers\Admin\NewslettersController::class, 'store'])->name('admin.newsletters.store');

    Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/delete/{user}', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('admin.users.delete');
    Route::post('/admin/users/update/{user}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.users.store');
});