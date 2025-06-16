<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends BaseController
{
    public function index()
    {
        $module = 'Home';
        return view('landing.home', compact('module'));
    }
}
