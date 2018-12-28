<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lobby extends Controller
{
    public function index()
    {
        $title_page = 'Lobby Heze Case';
        return view('Lobby.index', compact('title_page'));
    }
}
