<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Citas</title>
    <style>
        /* Estilos generales para la página */
        body {
            font-family: Arial, sans-serif; /* Fuente general */
            margin: 0; /* Sin margen */
            padding: 0; /* Sin padding */
            background-color: #f8f9fa; /* Fondo claro */
        }

        /* Estilos para centrar el contenido */
        .container {
            padding: 60px 20px; /* Espaciado superior e inferior */
            display: flex; /* Usar flexbox para centrar */
            flex-direction: column; /* Colocar elementos en columna */
            align-items: center; /* Centrar horizontalmente */
        }

        /* Estilo para el título */
        h1 {
            font-size: 2.5rem; /* Tamaño del título */
            color: #343a40; /* Color oscuro */
            margin-bottom: 30px; /* Espacio debajo del título */
        }

        /* Estilos para el enlace */
        a {
            text-decoration: none; /* Sin subrayado */
            color: #007bff; /* Color azul */
            font-size: 1.2rem; /* Tamaño de fuente del enlace */
            margin-bottom: 20px; /* Espacio debajo del enlace */
        }

        a:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }

        /* Estilos para la tabla */
        table {
            width: 100%; /* Ancho completo */
            border-collapse: collapse; /* Sin espacios entre celdas */
            max-width: 1000px; /* Ancho máximo de la tabla */
            margin-bottom: 20px; /* Espacio debajo de la tabla */
        }

        th, td {
            border: 1px solid #dee2e6; /* Borde gris claro */
            padding: 12px; /* Espaciado interno */
            text-align: left; /* Alinear texto a la izquierda */
        }

        th {
            background-color: #007bff; /* Fondo azul para encabezados */
            color: white; /* Color blanco para texto en encabezados */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Fondo gris claro para filas pares */
        }

        tr:hover {
            background-color: #e9ecef; /* Fondo gris oscuro al pasar el mouse */
        }

        /* Estilo para el botón de editar */
        .edit-button {
            color: #007bff; /* Color azul */
            text-decoration: none; /* Sin subrayado */
        }

        .edit-button:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
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
    <div class="container">
        <h1>Citas</h1>

        <p>
            <a href="{{ route('citas.create') }}">Agregar Cita</a>
        </p>

        <p>
            <a href="{{ route('dashboard') }}">Volver</a>
        </p>
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

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Materno</th>
                    <th>Apellido Paterno</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Consultorio</th>
                    <th>Descripción</th>
                    <th>Doctor</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                @can('update', $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}">
                            {{ $cita->nombre }}
                        </a>
                    </td>
                    <td>{{ $cita->apellidoma }}</td>
                    <td>{{ $cita->apellidopa }}</td>
                    <td>{{ $cita->telefono }}</td>
                    <td>{{ $cita->fecha->diffForHumans() }}</td>
                    <td>
                        @foreach ($cita->consultorios as $consultorio)
                            {{ $consultorio->tag }},
                        @endforeach
                    </td>
                    <td>{{ $cita->descripcion }}</td>
                    <td>{{ $cita->doctor }}</td>
                    <td>{{ $cita->estado }}</td>
                    

                    <td>
                        {{ $cita->user->name }}
                    </td>
                    <td>
                        @can('update', $cita)

                            <a href="{{ route('citas.edit', $cita) }}" class="edit-button">Editar</a>
                        @endcan
                    </td>
                </tr>
                @endcan
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
