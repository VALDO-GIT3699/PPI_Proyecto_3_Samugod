<x-mail::message>
# Nueva Cita Prevista
 
## {{ $cita->fecha }}
 
{{ $cita->descripcion }}
<x-mail::button :url="route('citas.show', $cita)">
Ver Cita
</x-mail::button>
 
Gracias por su preferencia, espere el correo de confirmación por parte del Dr. Iroel Solis.<br>
{{ config('app.name') }}
</x-mail::message>