<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function initMethod(): string
    {
        // para um ECHO como retorno, deve ser tipo void (vazio)
        // echo "Hello world!";
        return "Hello world!";
    }
    public function viewPage(): View
    {
        return view('home');
    }
}
