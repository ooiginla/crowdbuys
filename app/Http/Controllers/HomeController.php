<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(Request $request)
    {
        return view('homepage',['pagetitle' => 'Homepage', 'slot'=>'']);
    }
}
