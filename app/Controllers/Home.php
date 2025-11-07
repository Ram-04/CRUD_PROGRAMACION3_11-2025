<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //cargar la vista de bienvenida
        return view('productos/produclist');
    }
}
