<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Support\Facades\Route;

//middleware por rota
// Route::get('/', [MainController::class, 'index'])->name('index')->middleware([StartMiddleware::class]);
// Route::get('/about', [MainController::class, 'about'])->name('about')->middleware([EndMiddleware::class]);
// Route::get('/contact', [MainController::class, 'contact'])->name('contact')->middleware([StartMiddleware::class, EndMiddleware::class]);

//middleware por grupo
// Route::middleware([StartMiddleware::class, EndMiddleware::class])->group(function () {
//     Route::get('/', [MainController::class, 'index'])->name('index');
//     // usa os middlewares existentes no array, com uma exceção
//     Route::get('/about', [MainController::class, 'about'])->name('about')->withoutMiddleware([EndMiddleware::class]);
//     Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// });

Route::middleware('correr_depois')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
});
