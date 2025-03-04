<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/init', [MainController::class, 'initMethod'])->name('init');
Route::get('/view', [MainController::class, 'viewPage'])->name('view');

// route for single action controller
Route::get('/single', SingleActionController::class)->name('single');

// resource controller -> possui vários métodos, criados automaticamente
// geralmente estão relacionados a crud (create, read, update, delete)
// Route::resource('users', UserController::class);

Route::resources([
    'clients' => ClientsController::class,
    'products' => ProductsController::class,
    'users' => UserController::class,
]);
