<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pmlite extends Controller
{
    public function index()
    {
        $title_page = 'Project Manager Lite';
        return view('PMlite.index', compact('title_page'));
    }
}
