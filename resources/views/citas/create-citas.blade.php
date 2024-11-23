<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda tu cita</title>
    <style>
        /* Estilos generales para la sección de citas */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            color: #333;
        }

        .appointment {
            position: relative;
            padding: 100px 0;
            background: url('https://www.clinicatorresvigo.com/wp-content/uploads/2023/12/herramientas_dentista-scaled.jpg') no-repeat center center fixed; /* Cambiar por tu imagen */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .appointment::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Fondo opaco */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 1;
            width: 90%;
            max-width: 1200px;
            display: flex;
            justify-content: flex-end; /* Mueve los elementos al lado derecho */
            align-items: center; /* Alinea los elementos verticalmente */
            height: 100%;
        }

        .section-title h2 {
            font-size: 3rem;
            color: #fff;
            text-align: center;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6); /* Sombra sutil */
        }

        .section-title p {
            font-size: 1.2rem;
            text-align: center;
            color: #ccc;
            line-height: 1.8;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 400;
            margin-bottom: 50px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3); /* Sombra sutil */
        }

        /* Estilos para el formulario */
        .php-email-form {
            position: relative;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 800px;
            width: 100%;
            z-index: 2;
            opacity: 0.9; /* Ligera transparencia */
            margin-left: auto; /* Empuja el formulario hacia la derecha */
            margin-right: 0; /* Asegura que no tenga margen a la derecha */
            display: block; /* Asegura que se aplique correctamente el margen */
        }

        .form-control, .form-select, textarea {
            border: none;
            border-radius: 8px;
            padding: 18px;
            font-size: 1rem;
            margin-bottom: 20px;
            width: 100%;
            background: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            background: #e9ecef;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        textarea {
            border: 2px solid #ced4da;
            border-radius: 10px;
            padding: 18px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            background-color: #f7f7f7;
            margin-bottom: 20px;
        }

        textarea:focus {
            border-color: #0062cc;
            box-shadow: 0 0 10px rgba(0, 98, 204, 0.5);
            outline: none;
        }

        button {
            background-color: #0062cc;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 18px 36px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #004bb5;
            transform: translateY(-3px);
        }

        .alert {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 80%;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            font-size: 1rem;
        }

        .alert ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .alert ul li {
            margin-bottom: 10px;
        }

        .text-center-t {
            text-align: center;
            margin-bottom: 30px;
        }

        .text-center {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        /* Enlaces */
        a {
            color: #0062cc;
            text-decoration: none;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        a:hover {
            color: #004bb5;
            text-decoration: underline;
        }

        .btn-navigation {
            display: inline-block;
            background-color: #000; /* Color negro */
            color: #fff;
            text-transform: uppercase;
            text-decoration: none;
            padding: 15px 25px;
            font-size: 1rem;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold;
        }

        .btn-navigation:hover {
            background-color: #333; /* Negro más claro al pasar el mouse */
            transform: translateY(-2px);
        }   

    </style>
</head>
<body>
                <div class="text-center-t" style="margin-bottom: 20px;">
                    <a href="{{ route('dashboard') }}" class="btn-navigation">Ir al Dashboard</a>
                    <a href="{{ route('citas.index') }}" class="btn-navigation">Ver Citas</a>
                </div>
    <section id="appointment" class="appointment">
        
    
        <div class="container">
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

            <div class="section-title" data-aos="fade-up">
                <h2>Agenda tu cita!</h2>
                <p>Verifica la disponibilidad en la fecha y en el lugar deseado</p>
            </div>



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
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime-local" name="fecha" class="form-control" id="fecha"
                            value="{{ now()->addDay()->setHour(9)->setMinute(0)->format('Y-m-d\TH:i') }}"  
                            min="{{ now()->addDay()->setHour(9)->setMinute(0)->format('Y-m-d\TH:i') }}" 
                            max="{{ now()->addMonths(6)->setHour(20)->setMinute(0)->format('Y-m-d\TH:i') }}"  
                            step="3600">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="consultorio[]" id="consultorio" class="form-select" required multiple>
                            @forelse ($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ strtoupper ($consultorio->tag) }}</option>
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
                    <div class="text-center"><button type="submit">Solicitar cita</button></div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
