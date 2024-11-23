<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda tu cita</title>
    <style>
        /* Estilos generales para la sección de citas */
        .appointment {
            padding: 60px 0;
            background-color: #f8f9fa; /* Fondo claro */
            display: flex; /* Usar flexbox para centrar */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }

        .section-title h2 {
            font-size: 2.5rem; /* Tamaño de la fuente del título */
            color: #343a40; /* Color oscuro para el título */
            text-align: center; /* Centrado del texto */
            margin-bottom: 15px; /* Espacio debajo del título */
        }

        .section-title p {
            font-size: 1.2rem; /* Tamaño de la fuente para el subtítulo */
            color: #6c757d; /* Color gris para el subtítulo */
            text-align: center; /* Centrado del subtítulo */
            margin-bottom: 40px; /* Espacio debajo del subtítulo */
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
        button {
            background-color: #007bff; /* Fondo azul para el botón */
            color: #ffffff; /* Color blanco para el texto */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 15px 30px; /* Espaciado interno */
            font-size: 1rem; /* Tamaño de la fuente */
            cursor: pointer; /* Cambia el cursor al pasar el mouse */
            transition: background-color 0.3s; /* Transición suave para el fondo */
        }

        /* Cambios al pasar el mouse sobre el botón */
        button:hover {
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

        /* Estilos para el contenedor de los botones */
        .text-center {
            margin-top: 20px; /* Espaciado superior */
            text-align: center; /* Centrar el contenido del botón */
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
    <section id="appointment" class="appointment section light-background">

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



        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Agenda tu cita!</h2>
            <p>Verifica la disponibilidad en la fecha y en el lugar deseado</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="{{ route('citas.store') }}" method="POST" class="php-email-form">
                @csrf

                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidopa" class="form-control" id="apellidopa" placeholder="Apellido Paterno" value="{{ old('apellidopa') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidoma" class="form-control" id="apellidoma" placeholder="Apellido Materno" value="{{ old('apellidoma') }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime-local" name="fecha" class="form-control datepicker" id="fecha" value="{{ old('fecha') }}" placeholder="Fecha de reservación" required>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                    <select name="consultorio[]" id="consultorio" class="form-select" required>
                        @forelse ($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">{{ $consultorio->tag }}</option>
                        @empty
                            <option>No hay consultorios disponibles</option>
                        @endforelse
                    </select>

                    </div>

                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select" required>
                            <option value="Iroel Alain Solis Cardenas">Iroel Alain Solis Cardenas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="descripcion" rows="5" placeholder="Describa un poco el motivo de la cita">{{ old('descripcion') }}</textarea>
                </div>
                <div class="mt-3">
                    <div class="text-center"><button type="submit">Consultar Disponibilidad</button></div>
                </div>
            </form>

        </div>

    </section><!-- /Appointment Section -->
</body>
</html>
