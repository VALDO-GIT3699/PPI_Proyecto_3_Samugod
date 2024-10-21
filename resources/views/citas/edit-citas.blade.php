<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cita</title>
    <style>
        /* Estilos generales para la página */
        body {
            font-family: Arial, sans-serif; /* Fuente general */
            margin: 0; /* Sin margen */
            padding: 0; /* Sin padding */
            background-color: #f8f9fa; /* Fondo claro */
        }

        /* Estilos para la sección de editar cita */
        .edit-appointment {
            padding: 60px 0; /* Espaciado superior e inferior */
            display: flex; /* Usar flexbox para centrar */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }

        .form-title {
            text-align: center; /* Centrar el título */
            margin-bottom: 30px; /* Espacio debajo del título */
        }

        h1 {
            font-size: 2.5rem; /* Tamaño del título */
            color: #343a40; /* Color oscuro */
        }

        /* Estilos para el formulario */
        .php-email-form {
            max-width: 800px; /* Ancho máximo del formulario */
            width: 100%; /* Asegura que el formulario use el 100% del contenedor */
            background: #ffffff; /* Fondo blanco para el formulario */
            border-radius: 10px; /* Bordes redondeados */
            padding: 40px; /* Espaciado interno */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
        }

        /* Estilos de los campos de entrada */
        .form-control, .form-select {
            border: 1px solid #ced4da; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            padding: 15px; /* Espaciado interno */
            font-size: 1rem; /* Tamaño de la fuente */
            transition: border-color 0.3s; /* Transición suave para el borde */
            width: 100%; /* Asegura que los campos usen el 100% del contenedor */
            margin-bottom: 15px; /* Espacio debajo de cada campo */
        }

        /* Cambios al pasar el mouse sobre los campos */
        .form-control:focus, .form-select:focus {
            border-color: #007bff; /* Borde azul al enfocar */
            outline: none; /* Sin contorno */
        }

        /* Estilo para el botón de envío */
        input[type="submit"] {
            background-color: #007bff; /* Fondo azul para el botón */
            color: #ffffff; /* Color blanco para el texto */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 15px 30px; /* Espaciado interno */
            font-size: 1rem; /* Tamaño de la fuente */
            cursor: pointer; /* Cambia el cursor al pasar el mouse */
            transition: background-color 0.3s; /* Transición suave para el fondo */
            width: 100%; /* Botón ocupa todo el ancho */
        }

        /* Cambios al pasar el mouse sobre el botón */
        input[type="submit"]:hover {
            background-color: #0056b3; /* Fondo azul oscuro al pasar el mouse */
        }

        /* Estilos para el área de texto */
        textarea {
            border: 1px solid #ced4da; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            padding: 15px; /* Espaciado interno */
            font-size: 1rem; /* Tamaño de la fuente */
            transition: border-color 0.3s; /* Transición suave para el borde */
            width: 100%; /* Asegura que el área de texto use el 100% del contenedor */
        }

        /* Cambios al pasar el mouse sobre el área de texto */
        textarea:focus {
            border-color: #007bff; /* Borde azul al enfocar */
            outline: none; /* Sin contorno */
        }

        .alert {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050; /* Asegúrate de que esté por encima de otros elementos */
            width: 90%; /* Ajusta el ancho según necesites */
            border-radius: 8px; /* Esquinas redondeadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
            transition: all 0.3s ease; /* Transición suave */
        }

        .alert-danger {
                background-color: #f8d7da; /* Color de fondo */
                color: #721c24; /* Color de texto */
        }

    </style>
</head>
<body>
    <section class="edit-appointment">

        <div class="container">
            <div class="form-title">
                <h1>Editar Cita</h1>
            </div>

                        <!-- Mensajes de error -->
            @if($errors->any())
                <div class="alert alert-danger text-center" role="alert" style="margin: 10px auto; width: 80%; border-radius: 5px; font-size: 16px;">
                    <strong>¡Oops! Ha ocurrido un problema:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('citas.update', $citas) }}" method="POST" class="php-email-form">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" value="{{ old('nombre') ?? $citas->nombre }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidopa" class="form-control" id="apellidopa" placeholder="Apellido Paterno" value="{{ old('apellidopa') ?? $citas->apellidopa }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidoma" class="form-control" id="apellidoma" placeholder="Apellido Materno" value="{{ old('apellidoma') ?? $citas->apellidoma }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico" value="{{ old('email') ?? $citas->email }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono') ?? $citas->telefono }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime-local" name="fecha" class="form-control datepicker" id="fecha" value="{{ old('fecha') ?? $citas->fecha }}" placeholder="Fecha de reservación" required>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="consultorio" id="consultorio" class="form-select" required>
                            <option value="">Selecciona el consultorio</option>
                            <option value="guadalajara" {{ old('consultorio') == 'guadalajara' ? 'selected' : ($citas->consultorio == 'guadalajara' ? 'selected' : '') }}>Guada</option>
                            <option value="atotonilco" {{ old('consultorio') == 'atotonilco' ? 'selected' : ($citas->consultorio == 'atotonilco' ? 'selected' : '') }}>Atotonilco</option>
                            <option value="arandas" {{ old('consultorio') == 'arandas' ? 'selected' : ($citas->consultorio == 'arandas' ? 'selected' : '') }}>Arandas</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select" required>
                            <option value="Iroel Alain Solis Cardenas" selected>Iroel Alain Solis Cardenas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="descripcion" rows="5" placeholder="Describa un poco el motivo de la cita">{{ old('descripcion') ?? $citas->descripcion }}</textarea>
                </div>
                <div class="mt-3">
                    <input type="submit" value="Enviar">
                </div>
                <br>
                <br>
                
            </form>
            <div class="mt-3">
                <form action="{{ route('citas.destroy', $citas) }}" class="php-email-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>
            </div>
        </div>
    </section>
</body>
</html>
