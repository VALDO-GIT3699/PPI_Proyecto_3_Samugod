<x-mail::message>
# Actualización de Cita
 
## {{ $cita->fecha }}
 
{{ $cita->descripcion }}
<x-mail::button :url="route('citas.show', $cita)">
Ver Cita
</x-mail::button>
 
Gracias por su preferencia, su cita ha sido actualizada a {{ $cita->estado}} por parte del Dr. Iroel Solis.<br>
{{ config('app.name') }}
</x-mail::message>