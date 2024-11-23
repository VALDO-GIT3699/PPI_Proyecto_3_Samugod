<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware as midlle;
use Illuminate\Http\Request;

use App\Models\Citas;
use App\Models\Admin;
use App\Models\Consultorio;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class AdminController extends Controller implements HasMiddleware
{
    /**
     * Muestra el panel de administración.
     */

     public static function middleware(): array
     {
         return [
             // 'auth',
             new midlle('auth', except: ['index', 'show']),
             // new Middleware('subscribed', only: ['store']),
         ];
     }
     
    public function index()
    {
        return view('admin.dashboard'); // Aquí debes asegurarte de que existe la vista 'admin.dashboard'
    }

    public function show(Citas $admin)
    {   
        return view('admin.show-admin', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */

}
