<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            // 'auth',
            new Middleware('auth', except: ['index', 'show']),
            // new Middleware('subscribed', only: ['store']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Citas::all();
        return view('citas.index-citas', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.create-citas');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'email'       => 'required|email|max:255|unique:citas,email', // Asegurar que el correo sea único si es relevante
            'nombre'      => 'required|string|max:100|min:2|regex:/^[\p{L}\s]+$/u', // Solo letras y espacios
            'apellidoma'  => 'required|string|max:60|min:2|regex:/^[\p{L}\s]+$/u',
            'apellidopa'  => 'required|string|max:60|min:2|regex:/^[\p{L}\s]+$/u',
            'telefono'    => 'required|string|max:15|min:10|regex:/^[0-9\s]+$/', // Solo números y espacios
            'fecha'       => 'required|date|after_or_equal:today', // Validar que la fecha no sea pasada
            'descripcion' => 'required|string|max:255|regex:/^[\p{L}\d\s.,!?;:()\'"-]+$/u', // Solo texto permitido
            'consultorio' => 'required|string|max:255',
            'doctor'      => 'required|string|max:255',
        ]);
    
        // Sanitizar los datos para evitar XSS
        $validatedData['nombre'] = htmlspecialchars(strip_tags($validatedData['nombre']));
        $validatedData['apellidoma'] = htmlspecialchars(strip_tags($validatedData['apellidoma']));
        $validatedData['apellidopa'] = htmlspecialchars(strip_tags($validatedData['apellidopa']));
        $validatedData['telefono'] = htmlspecialchars(strip_tags($validatedData['telefono']));
        $validatedData['descripcion'] = htmlspecialchars(strip_tags($validatedData['descripcion']));
        $validatedData['consultorio'] = htmlspecialchars(strip_tags($validatedData['consultorio']));
        $validatedData['doctor'] = htmlspecialchars(strip_tags($validatedData['doctor']));
    
        // Añadir el usuario_id al array de datos validados
        $validatedData['usuario_id'] = Auth::id();
    
        // Crear la cita
        Citas::create($validatedData);
    
        // Redirigir a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita creada con éxito.');
    }
     


    /**
     * Display the specified resource.
     */
    public function show(Citas $citas)
    {   
        return view('citas.show-citas', compact('citas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citas $citas)
    {
        /*dd($citas);*/ 
        return view('citas.edit-citas', compact('citas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $citas)
    {
        $citas->update($request->all());

        return redirect()->route('citas.show', $citas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citas $citas)
    {
        $citas->delete();

        return redirect()->route('citas.index');
    }
}
