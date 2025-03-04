<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    /**
     * __invoke - one single method controller
     *
     * @param $request Request type
     *
     * Controllers using flag --invokable should
     * have only 1 public method, but
     * they can have private methods
     * The public method must be called __invoke
     *
     * @return string
     */
    public function __invoke(Request $request): void
    {
        echo "Single Action Controller";
        echo "<br>";
        echo $this->_privateMethod();
    }


    /**
     * Private Method
     *
     * @return string
     */
    private function _privateMethod(): string
    {
        return "Private Method";
    }
}
