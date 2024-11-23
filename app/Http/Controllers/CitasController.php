<?php

namespace App\Http\Controllers;

use App\Mail\CitaChanged;
use App\Mail\CitaConfirmed;
use App\Models\Citas;
use App\Models\User;
use App\Models\Consultorio;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Mail;

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

    public function indexadmin()
    {
        $citas = Citas::all();

        return view('citas.index-citas-admin', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $consultorios = Consultorio::all();
        // dd($consultorios);
        return view('citas.create-citas', ['consultorios' => $consultorios]);
    }
    

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
         // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre'      => 'required|string|max:100|min:2|regex:/^[\p{L}\s]+$/u',
            'apellidoma'  => 'required|string|max:60|min:2|regex:/^[\p{L}\s]+$/u',
            'apellidopa'  => 'required|string|max:60|min:2|regex:/^[\p{L}\s]+$/u',
            'telefono'    => 'required|string|max:15|min:10|regex:/^[0-9\s]+$/',
            'fecha'       => 'required|date|after_or_equal:today',
            'descripcion' => 'required|string|max:255|regex:/^[\p{L}\d\s.,!?;:()\'"-]+$/u',
            'consultorio' => 'required|array', // Validar que sea un array de consultorios
            'consultorio.*' => 'exists:consultorios,id', // Validar que cada valor sea un ID válido de consultorio
            'doctor'      => 'required|string|max:255',
        ]);
     
         // Sanitizar los datos para evitar XSS
        $validatedData['nombre'] = htmlspecialchars(strip_tags($validatedData['nombre']));
        $validatedData['apellidoma'] = htmlspecialchars(strip_tags($validatedData['apellidoma']));
        $validatedData['apellidopa'] = htmlspecialchars(strip_tags($validatedData['apellidopa']));
        $validatedData['telefono'] = htmlspecialchars(strip_tags($validatedData['telefono']));
        $validatedData['descripcion'] = htmlspecialchars(strip_tags($validatedData['descripcion']));
        $validatedData['doctor'] = htmlspecialchars(strip_tags($validatedData['doctor']));
     
         // Añadir el usuario_id al array de datos validados
        $validatedData['usuario_id'] = Auth::id();
        $validatedData['user_id'] = Auth::id(); // En lugar de 'usuario_id'

        $validatedData['email'] = Auth::user()->email;

     
         // Crear la cita con el auth
        $citas = Citas::create($validatedData);
     
         // Asociar los consultorios seleccionados con la cita
        $citas->consultorios()->attach($request->consultorio);

        Mail::to(Auth::user()->email)->
        send(new CitaConfirmed($citas));
     
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

    public function showadmin(Citas $citas)
    {   
        return view('citas.show-citas-admin', compact('citas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citas $citas)
    {
        /*dd($citas);*/ 
        if (Auth::user()->role == 'admin')
        {
            $consultorios = Consultorio::all();

            return view('citas.edit-citas', compact('citas', 'consultorios') );
        }

        FacadesGate::authorize('update', $citas);

        $consultorios = Consultorio::all();

        return view('citas.edit-citas', compact('citas', 'consultorios') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $citas)
    {
        
        if (Auth::user()->role == 'admin')
        {
            $citas->update(
                [
                    'estado' => $request->estado,
                ]
            );

            $citas->consultorios()->syncWithoutDetaching($request->consultorios);

            Mail::to($citas->email)
            ->send(new CitaChanged($citas));
    
            return redirect()->route('citas.show', $citas);
        }
       
        FacadesGate::authorize('update', $citas);
       
        $citas->update($request->all());

        $citas->consultorios()->sync($request->consultorios);

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
