<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(Request $request)
    {
        if($request->user()) {
            return redirect('/twines');
        }
        return view('page.welcome');
    }

    public function twineology()
    {
        return view('page.twineology');;//
    }

    public function about()
    {
        return view('page.about');//
    }

}
