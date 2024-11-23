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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente moderna */
            margin: 0;
            padding: 0;
            background-color: #f4f5f7; /* Fondo sutil */
            color: #333; /* Color del texto */
            line-height: 1.6;
        }

        /* Fondo con imagen opaca */
        .edit-appointment {
            padding: 60px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: url('https://www.centauro.com.mx/wp-content/uploads/5-principales-tipos-de-instrumentos-dentales.jpg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.8; /* Opacidad de la imagen */
        }

        /* Desenfoque y opacidad de fondo */
        .edit-appointment:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4); /* Fondo oscuro con opacidad */
            z-index: -1; /* Poner debajo del contenido */
        }

        /* Estilos para la sección de formulario */
        .container {
            background: #ffffff; /* Fondo blanco */
            border-radius: 20px; /* Bordes redondeados */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); /* Sombra sutil */
            padding: 40px;
            max-width: 900px; /* Ancho máximo */
            width: 100%; /* Asegura que el formulario se adapte al contenedor */
        }

        /* Título de la página */
        .form-title h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        /* Estilos para el formulario */
        .php-email-form {
            display: grid;
            gap: 20px;
        }

        /* Estilo de los campos de entrada */
        .form-control, .form-select, textarea {
            padding: 18px;
            font-size: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }

        /* Hover y focus en los campos */
        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: #6200ea; /* Borde morado en foco */
            outline: none;
            box-shadow: 0 0 10px rgba(98, 0, 234, 0.3); /* Sombra sutil */
        }

        /* Estilo del botón de submit */
        input[type="submit"] {
            background-color: #6200ea;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            letter-spacing: 1px;
        }

        /* Hover en el botón */
        input[type="submit"]:hover {
            background-color: #3700b3;
            transform: translateY(-3px); /* Efecto de elevación */
        }

        /* Estilo de la alerta de error */
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .alert ul {
            list-style: none;
            padding-left: 0;
        }

        .alert ul li {
            margin-bottom: 10px;
        }

        /* Estilos de enlaces */
        a {
            color: #6200ea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #3700b3;
        }

        /* Adaptación responsiva */
        @media (max-width: 768px) {
            .form-title h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="edit-appointment">
        @if (Auth::check() && Auth::user()->role === 'admin')
        <div class="container">
            <div class="form-title">
                <h1>Editar Cita</h1>
            </div>

            <div class="mt-3">
                <a href="{{ route('citas.index') }}"> Volver </a>
            </div>
            <br>
            <!-- Mensajes de error -->
            @if($errors->any())
                <div class="alert alert-danger text-center" role="alert">
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
                    <div class="col-md-4 form-group mt-3">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            @foreach (['pendiente', 'confirmada', 'cancelada'] as $estado)
                                <option value="{{ $estado }}" 
                                    @if (old('estado', $citas->estado) === $estado) selected @endif>
                                    {{ ucfirst($estado) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <input type="submit" value="Enviar">
                </div>
                <br><br>
            </form>

            <div class="mt-3">
                <form action="{{ route('citas.destroy', $citas) }}" method="POST" class="php-email-form">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>
            </div>
        </div>
        @else
        <div class="container">
            <div class="form-title">
                <h1>Editar Cita</h1>
            </div>

            <div class="mt-3">
                <a href="{{ route('dashboard') }}"> Volver </a>
            </div>

            <!-- Mensajes de error -->
            @if($errors->any())
                <div class="alert alert-danger text-center" role="alert">
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

                <!-- Validación y entrada de datos -->
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" value="{{ old('nombre', $citas->nombre) }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidopa" class="form-control" id="apellidopa" placeholder="Apellido Paterno" value="{{ old('apellidopa', $citas->apellidopa) }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="apellidoma" class="form-control" id="apellidoma" placeholder="Apellido Materno" value="{{ old('apellidoma', $citas->apellidoma) }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Correo Electrónico" value="{{ old('email', $citas->email) }}" required>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfono" value="{{ old('telefono', $citas->telefono) }}" required>
                    </div>
                </div>

                <div class="mt-3">
                    <input type="submit" value="Actualizar Cita">
                </div>
            </form>
        </div>
        @endif
    </section>
</body>
</html>
