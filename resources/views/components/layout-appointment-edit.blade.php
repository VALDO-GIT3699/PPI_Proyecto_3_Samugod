<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cita</title>
</head>
<body>
    <h1>Editar Cita</h1>

    <form action="{{ route('citas.update', $citas) }}" method="POST">

        @csrf
        @method('PATCH')

        <div class="row">
        <div class="col-md-4 form-group">
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" value= "{{ old('nombre') ?? $citas->nombre }}" required="">
        </div>
        <div class="col-md-4 form-group">
            <input type="text" name="apellidopa" class="form-control" id="apellidopa" placeholder="Apellido Paterno" value= "{{ old('apellidopa') ?? $citas->apellidopa }}" required="">
        </div>
        <div class="col-md-4 form-group">
            <input type="text" name="apellidoma" class="form-control" id="apellidoma" placeholder="Apellido Materno" value= "{{ old('apellidoma') ?? $citas->apellidoma }}" required="">
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" value= "{{ old('email') ?? $citas->email }}" required="">
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value= "{{ old('telefono') ?? $citas->telefono }}" required="">
        </div>
        <div class="col-md-4 form-group mt-3">
            <input type="time" name="hora" class="form-control" id="hora" value= "{{ old('hora') }} ?? $citas->hora" placeholder="Hora de reservación" required>
        </div>

        </div>
        <div class="row">
        <div class="col-md-4 form-group mt-3">
            <input type="datetime-local" name="fecha" class="form-control datepicker" id="fecha" value= "{{ old('fecha') }} ?? $citas->fecha" placeholder="Fecha de reservacion" required="">
        </div>
        <div class="col-md-4 form-group mt-3">
            <select name="consultorio" id="consultorio" class="form-select" value= "{{ old('consultorio') }} ?? $citas->consultorio" required="">
            <option value="">Seleciona el consultorio</option>
            <option value="gdl">GDL</option>
            <option value="atoto">Atoto</option>
            <option value="Arandas">Arandas</option>
            </select>
        </div>
        <div class="col-md-4 form-group mt-3">
            <select name="doctor" id="doctor" class="form-select" required="">
                <option value="Iroel Alain Solis Cardenas" selected>Iroel Alain Solis Cardenas</option>
            </select>
        </div>
        </div>

        <div class="form-group mt-3">
        <textarea class="form-control" name="descripcion" rows="5" placeholder="Describa un poco el motivo de la citas">{{ old('descripcion') ?? $citas->descripcion}}</textarea>
        </div>
        <div class="mt-3">
        </div>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>