<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Models\FaqCategory;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FaqSuggestionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\UserController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome‐pagina
Route::get('/', function () {
    return view('landing');
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
Route::middleware(['auth', 'can:admin'])->group(function () {
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
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
     Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
     Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
     Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
     Route::resource('specializations', \App\Http\Controllers\Admin\SpecializationController::class);
});

 Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
     Route::get('/faq-suggestions', [FaqSuggestionController::class, 'index'])->name('faq.suggestions.index');
     Route::post('/faq-suggestions/{id}/approve', [FaqSuggestionController::class, 'approve'])->name('faq.suggestions.approve');
     Route::delete('/faq-suggestions/{id}', [FaqSuggestionController::class, 'destroy'])->name('faq.suggestions.destroy');
 });

 Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
     Route::get('/users', [UserController::class, 'index'])->name('users.index');
     Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');
 });


 Route::middleware(['can:create,App\Models\News'])->group(function () {
     Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
     Route::post('/news', [NewsController::class, 'store'])->name('news.store');
 });



 // Contactpagina
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Servicepagina
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/bookings/create', [BookingController::class, 'create'])->middleware('auth');
Route::post('/bookings', [BookingController::class, 'store'])->middleware('auth');
Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->middleware('auth');
// Mijn boekingen voor gebruikers
Route::get('/my-bookings', [BookingController::class, 'myBookings'])
     ->middleware('auth')
     ->name('bookings.my');
     Route::delete('/my-bookings/{booking}', [BookingController::class, 'cancel'])
     ->middleware('auth')
     ->name('bookings.cancel');
 


// Reacties
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

// Admin‐only comment moderation
Route::middleware(['auth', 'can:moderate,App\Models\Comment'])->group(function () {
     Route::get('/admin/comments', [CommentController::class, 'index'])->name('comments.index');
     Route::patch('/admin/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
     Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
 });

// FaqSuggestion
Route::get('/faq/suggest', [FaqSuggestionController::class, 'create'])->name('faq.suggest');
Route::post('/faq/suggest', [FaqSuggestionController::class, 'store'])->name('faq.suggest.store');

// Admin‐only FAQ suggestion moderation
Route::middleware(['auth', 'can:admin'])->prefix('admin/faq-suggestions')->group(function () {
     Route::get('/', [FaqSuggestionController::class, 'index'])->name('faq.suggestions.index');
     Route::post('/{id}/approve', [FaqSuggestionController::class, 'approve'])->name('faq.suggestions.approve');
     Route::delete('/{id}', [FaqSuggestionController::class, 'destroy'])->name('faq.suggestions.destroy');
 });

 Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq.index');

require __DIR__.'/auth.php';
