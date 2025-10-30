<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\DisscusionController;
use App\Http\Controllers\Project\ReportController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('projects.user.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('projects.admin.dashboard');
    })->name('dashboard');

    Route::controller(ReportController::class)->prefix('reports')->name('reports.')->group(function () {

        // Sekarang Anda bisa menggunakan sintaks string yang singkat dan bersih

        // URL: /admin/reports | Nama: admin.reports.index
        Route::get('/report', 'index')->name('index');

        // URL: /admin/reports/{report} | Nama: admin.reports.show
        // (Ini rute show yang sebelumnya error, sekarang sudah benar)
        Route::get('/{report}', 'show')->name('show');

        // URL: /admin/reports/{report}/update-status | Nama: admin.reports.updateStatus
        Route::post('/{report}/update-status', 'updateStatus')->name('updateStatus');

        // URL: /admin/reports/{report}/notes | Nama: admin.reports.addNote
        Route::post('/{report}/notes', 'addNote')->name('addNote');
    });
});

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

// Tracking Routes
Route::get('/lacak-laporan', [TrackingController::class, 'index'])->name('report.track.form');
Route::post('/lacak-laporan', [TrackingController::class, 'show'])->name('report.track.show');


require __DIR__ . '/auth.php';
