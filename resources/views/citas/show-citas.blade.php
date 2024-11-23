<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Cita</title>
    <style>
/* Estilos generales */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-image: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(0, 123, 255, 0.4)), 
                        url('https://dentalpyp.clinic/wp-content/uploads/2024/04/Los-Instrumentos-de-Dentista-Mas-Buscados.webp');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: #343a40;
}

.container {
    max-width: 700px;
    margin: 0 auto;
    padding: 40px 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center; /* Centra todo el contenido dentro del contenedor */
}

h1 {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 30px;
    font-weight: bold;
}

/* Estilo avanzado para la lista */
.details-list {
    list-style-type: none;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr; /* Para que cada item ocupe toda la columna */
    gap: 15px; /* Espacio entre los elementos */
}

.detail-item {
    background: rgba(255, 255, 255, 0.9);
    margin-bottom: 15px;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    text-align: center; /* Alineación de texto centrada */
    transition: all 0.3s ease;
}

.detail-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.detail-label {
    font-weight: bold;
    color: #007bff;
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.detail-item span {
    display: block; /* Asegura que cada valor esté en su propia línea */
    font-size: 1rem;
    color: #495057;
}

/* Alineación para el enlace (Volver) */
a {
    text-decoration: none;
    font-weight: 600;
    color: #007bff;
    transition: color 0.3s ease;
    display: inline-block; /* Hacemos que el enlace se comporte como un bloque */
    margin-top: 20px;
    text-align: center;
}

a:hover {
    color: #0056b3;
}

/* Botones */
.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-align: center;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Alertas */
.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Responsive */
@media (max-width: 768px) {
    body {
        font-size: 0.9rem;
    }

    h1 {
        font-size: 2rem;
    }

    .container {
        padding: 20px;
    }

    .detail-item {
        padding: 15px;
    }

    .btn {
        font-size: 0.9rem;
        padding: 8px 15px;
    }

    .detail-label {
        font-size: 1rem;
    }

    .detail-item span {
        width: auto;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 1.5rem;
    }

    .detail-item {
        padding: 10px;
    }

    .btn {
        font-size: 0.8rem;
        padding: 8px 10px;
    }

    .detail-label {
        font-size: 0.9rem;
    }
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

        <!-- Lista de detalles -->
        <ul class="details-list">
            <li class="detail-item">
                <span class="detail-label">Nombre:</span> {{ strtoupper ($citas->nombre) }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Apellido Paterno:</span> {{ strtoupper ($citas->apellidopa) }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Apellido Materno:</span> {{ strtoupper ($citas->apellidoma) }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Correo Electrónico:</span> {{ $citas->email }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Teléfono:</span> {{ $citas->telefono }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Fecha:</span> {{ $citas->fecha }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Consultorios:</span>
                @foreach ($citas->consultorios as $consultorio)
                    {{ strtoupper ($consultorio->tag) }}
                @endforeach
            </li>
            <li class="detail-item">
                <span class="detail-label">Doctor:</span> {{ strtoupper ($citas->doctor) }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Descripción:</span> {{ strtoupper ($citas->descripcion) }}
            </li>
            <li class="detail-item">
                <span class="detail-label">Estado:</span> {{ strtoupper ($citas->estado) }}
            </li>
        </ul>

        <hr>

        <a href="{{ route('citas.index', $citas) }}" class="btn btn-primary">Volver</a>
    </div>
</body>

</html>
