<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Citas Profesionales</title>
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            font-weight: 600;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
        }

        td {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        tr:nth-child(even) td {
            background-color: #e9ecef;
        }

        tr:hover td {
            background-color: #d1ecf1;
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

            th, td {
                padding: 10px;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            .btn {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Auth::check() && Auth::user()->role === 'admin')
        <h1>Citas Administrativas</h1>
        <p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver</a>
        </p>
        @if($errors->any())
        <div class="alert alert-danger">
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
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}">{{ strtoupper($cita->nombre) }}</a>
                    </td>
                    <td>{{ strtoupper($cita->apellidoma) }}</td>
                    <td>{{ strtoupper($cita->apellidopa) }}</td>
                    <td>{{ $cita->telefono }}</td>
                    <td>{{ $cita->fecha->diffForHumans() }}</td>
                    <td>
                        @foreach ($cita->consultorios as $consultorio)
                        {{ strtoupper($consultorio->tag) }}
                        @endforeach
                    </td>
                    <td>{{ strtoupper($cita->descripcion) }}</td>
                    <td>{{ strtoupper($cita->doctor) }}</td>
                    <td>{{ strtoupper($cita->estado) }}</td>
                    <td>{{ strtoupper($cita->user->name) }}</td>
                    <td>
                        <a href="{{ route('citas.edit', $cita) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1>Citas</h1>
        <p>
            <a href="{{ route('citas.create') }}" class="btn btn-primary">Agregar Cita</a>
        </p>
        <p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver</a>
        </p>
        @if($errors->any())
        <div class="alert alert-danger">
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
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                @can('update', $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}">{{ strtoupper($cita->nombre) }}</a>
                    </td>
                    <td>{{ strtoupper($cita->apellidoma) }}</td>
                    <td>{{ strtoupper($cita->apellidopa) }}</td>
                    <td>{{ $cita->telefono }}</td>
                    <td>{{ $cita->fecha->diffForHumans() }}</td>
                    <td>
                        @foreach ($cita->consultorios as $consultorio)
                        {{ strtoupper($consultorio->tag) }}
                        @endforeach
                    </td>
                    <td>{{ strtoupper($cita->descripcion) }}</td>
                    <td>{{ strtoupper($cita->doctor) }}</td>
                    <td>{{ strtoupper($cita->estado) }}</td>
                    <td>{{ strtoupper($cita->user->name) }}</td>
                </tr>
                @endcan
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>
