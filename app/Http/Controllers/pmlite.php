<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pmlite extends Controller
{
    //region Vistas
    public function index()
    {
        $title_page = 'Project Manager Lite';
        return view('PMlite.index', compact('title_page'));
    }
    public function proyectoVer()
    {
        $title_page = 'PML proyectos ver todo';
        return view('PMlite.Proyectos.verTodo', compact('title_page'));
    }
    public function proyectoCrear()
    {
        $title_page = 'PML proyectos crear';
        return view('PMlite.Proyectos.crear', compact('title_page'));
    }
    public function tareaVer()
    {
        $title_page = 'PML tareas ver todas';
        return view('PMlite.Tareas.verTodo', compact('title_page'));
    }
    public function tareaCrear()
    {
        $title_page = 'PML tareas crear';
        return view('PMlite.Tareas.crear', compact('title_page'));
    }
    //endregion
}
