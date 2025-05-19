<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Models\FaqCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome‐pagina
Route::get('/', function () {
    return view('welcome');
});

// Public profielpagina
Route::get('/profiles/{user}', [ProfileController::class, 'show'])
     ->name('profiles.show');

// Dashboard (auth + verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
  ->name('dashboard');

/*
|--------------------------------------------------------------------------
| News‐routes
|--------------------------------------------------------------------------
*/

// 1) Public index
Route::get('/news', [NewsController::class, 'index'])
     ->name('news.index');

// 2) Admin‐only CRUD (create, store, edit, update, destroy)
Route::middleware('auth')->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])
         ->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])
         ->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
         ->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])
         ->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])
         ->name('news.destroy');
});

// 3) Public detail‐pagina (moet na alle CRUD‐routes)
Route::get('/news/{news}', [NewsController::class, 'show'])
     ->name('news.show');

/*
|--------------------------------------------------------------------------
| Profile edit/delete (Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile',   [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
         ->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])
         ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
     Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
     Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
 });

 // Publieke FAQ-pagina
Route::get('/faq', function () {
     $categories = FaqCategory::with('faqs')->get();
     return view('faq.index', compact('categories'));
 })->name('faq.index');
 

require __DIR__.'/auth.php';
