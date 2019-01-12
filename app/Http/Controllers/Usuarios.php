<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usuarios extends Controller
{
    //region Index
    public function index()
    {
        $title_page = 'Datos del Usuario';
        return view('Usuarios.misdatos', compact('title_page'));
    }
    //endregion
}
