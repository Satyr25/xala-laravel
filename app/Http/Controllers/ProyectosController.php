<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function index(){
        return view('proyectos.index');
    }

    public function comunidad(){
        return view('proyectos.comunidad');
    }

    public function ambiente(){
        return view('proyectos.ambiente');
    }

}
