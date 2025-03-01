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
