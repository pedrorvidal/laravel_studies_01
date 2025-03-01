<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get(
    '/injection',
    function (Request $request) {
        echo "<pre>";
        var_dump($request);
        echo "</pre>";
    }
);

Route::match(
    ['get', 'post'],
    '/match',
    function () {
        return "<h1>Aceita GET e POST</h1>";
    }
);

Route::any(
    '/any',
    function () {
        return "<h1>Aceita qualquer método</h1>";
    }
);

Route::get('/index', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

Route::redirect('/saltar', '/index');

Route::permanentRedirect('/saltar2', '/index');

Route::view('/view', 'home');

Route::view('/view2', 'home', ['myName' => 'Pedro Vidal']);

Route::get(
    '/exp1/{value}',
    function ($value) {
        echo "$value";
    }
)->where('value', '[0-9]+');

Route::get(
    '/exp2/{value}',
    function ($value) {
        echo "$value";
    }
)->where('value', '[A-Za-z0-9]+');

Route::get(
    '/exp3/{value1}/{value2}',
    function ($value) {
        echo "$value";
    }
)->where(
    [
        'value1' => '[0-9]+',
        'value2' => '[A-Za-z0-9]+',
    ]
);

//--------------------------
// ROUTE NAMES
//--------------------------
Route::get('/rota_abc', function () {
    echo "Rota nomeada";
})->name('rota_nomeada');

Route::get('/rota_referenciada', function () {
    return redirect()->route('rota_nomeada');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', [MainController::class, 'index']);
    Route::get('/about', [MainController::class, 'about']);
    Route::get('/management', [MainController::class, 'mostrarValor']);
});

// Rota com middleware
Route::get('/admin/only', function () {
    echo "Apenas administradores";
})->middleware([OnlyAdmin::class]);

// Middleware aplicado para um grupo de rotas
Route::middleware([OnlyAdmin::class])->group(function () {
    Route::get('/admin/only2', function () {
        echo "Apenas administradores 2";
    });
    Route::get('/admin/only3', function () {
        echo "Apenas administradores 3";
    });
});

//Método de escrever rotas para funções de controllers:
Route::get('/new', [UserController::class, 'new']);
Route::get('/edit', [UserController::class, 'edit']);
Route::get('/delete', [UserController::class, 'delete']);

//Método para escrever rotas para um controller, e chamar dentro dela as functions:
Route::controller(UserController::class)->group(function () {
    Route::get('/user/new', 'new');
    Route::get('/user/edit', 'edit');
    Route::get('/user/delete', 'delete');
});

Route::fallback(function () {
    echo "Página não encontrada";
});
