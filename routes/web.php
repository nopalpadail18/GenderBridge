<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\DisscusionController;
use App\Http\Controllers\Project\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pelaporan Routes
Route::get('/form-lapor', [ReportController::class, 'create'])->name('report.create');
Route::post('/form-lapor', [ReportController::class, 'store'])->name('report.store');


// Ruang Diskusi Routes
Route::get('/ruang-diskusi', [App\Http\Controllers\Project\DisscusionController::class, 'index'])->name('discussion.index');
Route::get('/ruang-diskusi/{slug}', [App\Http\Controllers\Project\DisscusionController::class, 'showCategory'])->name('discussion.category');
Route::get('/ruang-diskusi/{categorySlug}/{postSlug}', [App\Http\Controllers\Project\DisscusionController::class, 'showPost'])->name('discussion.post');

// Artikel Routes
Route::get('/artikel', [App\Http\Controllers\Project\ArticleController::class, 'index'])->name('article.index');

require __DIR__ . '/auth.php';
