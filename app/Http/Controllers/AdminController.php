<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra el panel de administración.
     */
    public function index()
    {
        return view('admin.dashboard'); // Aquí debes asegurarte de que existe la vista 'admin.dashboard'
    }
}
