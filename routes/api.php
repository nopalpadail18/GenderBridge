<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [App\Http\Controllers\Project\ArticleController::class, 'getArticle'])->name('api.articles.get');
