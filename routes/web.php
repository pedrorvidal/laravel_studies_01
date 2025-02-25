<?php

use App\Http\Controllers\MainController;
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
