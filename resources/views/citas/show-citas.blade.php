<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Cita</title>
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

        /* Estilo para la lista */
        ul {
            list-style-type: none; /* Sin viñetas */
            padding: 0; /* Sin padding */
            margin: 0; /* Sin margen */
            font-size: 1.2rem; /* Tamaño de fuente */
            color: #495057; /* Color del texto */
        }

        /* Estilo para los elementos de la lista */
        li {
            margin-bottom: 10px; /* Espacio entre elementos */
            padding: 10px; /* Espaciado interno */
            background-color: #ffffff; /* Fondo blanco */
            border: 1px solid #dee2e6; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            width: 100%; /* Ancho completo */
            max-width: 600px; /* Ancho máximo de la lista */
        }

        /* Estilo para el enlace */
        a {
            text-decoration: none; /* Sin subrayado */
            color: #007bff; /* Color azul */
            font-size: 1.2rem; /* Tamaño de fuente del enlace */
            margin: 20px 0; /* Espacio arriba y abajo */
        }

        a:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }

        /* Estilo para el formulario de eliminación */
        form {
            margin: 20px 0; /* Espacio arriba y abajo del formulario */
        }

        input[type="submit"] {
            background-color: #dc3545; /* Color rojo para botón de eliminar */
            color: white; /* Texto blanco */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px 20px; /* Espaciado interno */
            font-size: 1rem; /* Tamaño de fuente */
            cursor: pointer; /* Cursor de mano */
        }

        input[type="submit"]:hover {
            background-color: #c82333; /* Color rojo oscuro al pasar el mouse */
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
        <h1>Detalle de la Cita</h1>
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

        <ul>
            <li>Nombre: {{ $citas->nombre }}</li>
            <li>Apellido Paterno: {{ $citas->apellidopa }}</li>
            <li>Apellido Materno: {{ $citas->apellidoma }}</li>
            <li>Correo Electrónico: {{ $citas->email }}</li>
            <li>Teléfono: {{ $citas->telefono }}</li>
            <li>Fecha: {{ $citas->fecha }}</li>
            <li>Consultorio: {{ $citas->consultorio }}</li>
            <li>Doctor: {{ $citas->doctor }}</li>
            <li>Descripción: {{ $citas->descripcion }}</li>
            <li>Estado: {{ $citas->estado }}</li>
        </ul>

        <hr>

        <a href="{{ route('citas.edit', $citas) }}">Editar</a>
        <a href="{{ route('citas.index', $citas) }}">Volver</a>
        
        <form action="{{ route('citas.destroy', $citas) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>
