<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * MainControlle class
 *
 * @category Controller
 *
 * @package App\Http\Controllers
 *
 * @author Pedro Vidal <pedrorvidal@gmail.com>
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 * @link https://laravel.com/docs/8.x/controllers
 */
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index";
    }


    /**
     * About function
     *
     * @return void
     */
    public function about()
    {
        echo "about";
    }


    /**
     * Teste function
     */
    public function teste()
    {
        echo "Teste";
    }
}
