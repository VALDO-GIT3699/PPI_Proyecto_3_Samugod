<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario ($tipo_persona = null) {
        
        return view('formulario-contacto', compact('tipo_persona'));

        // return view('formulario-contacto', ['tipo_persona' => $tipo_persona]);
    }

    public function newContact(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|min:3|max:255|regex:/^[\p{L}\s]+$/u', // Solo letras y espacios
            'correo' => 'required|email|unique:contactos,correo|not_in:temporal.com,desechable.com', // Lista negra de dominios (ejemplo)
            'mensaje' => 'required|min:10|max:1000|regex:/^[\p{L}\d\s.,!?;:()\'"-]+$/u', // Solo texto permitido
        ]);

        // Sanitizar el mensaje para evitar XSS
        $mensaje = htmlspecialchars(strip_tags($request->mensaje));

        // Crear nuevo contacto
        $contacto = new Contacto();
        $contacto->nombre = $request->nombre;
        $contacto->correo = $request->correo;
        $contacto->mensaje = $mensaje; // Usar el mensaje sanitizado
        $contacto->estatus = 'Nuevo'; // Asignar estatus predeterminado
        $contacto->save();

        return redirect('/lista')->with('success', 'Contacto creado exitosamente.');
    }


    public function lista ()
    {
        $mensajes = Contacto::all();
        // dd($mensajes);
        return view('lista', compact('mensajes'));
        // return view('lista', ['mensajes' => $mensajes]);
        // return view('lista', ['mensajes' => Contacto::all()]);
    }
}
