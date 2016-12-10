<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
    *
    */
    public function example3() {
        echo \App::environment();
        echo 'App debug:  '.config('app.debug');
    }
    /**
    *
    */
    public function example2() {
        $fruits = ['pineapple', 'orange', 'kiwi'];
        dd($fruits);
    }

    /**
    *
    */
    public function example1() {
        return 'This is the example 1';
    }

}
