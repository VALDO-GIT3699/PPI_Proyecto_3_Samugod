<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dr Iroel Solis - Ortodoncia Especializada</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="d-none d-md-flex align-items-center">
          <i class="bi bi-clock me-1"></i> Disponibilidad en distintas regiones!
        </div>
        <div class="d-flex align-items-center">
          <i class="bi bi-phone me-1"></i> Agenda tu cita
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-end">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">    
            <!-- Uncomment the line below if you also wish to use a text logo -->
            <!-- <h1 class="sitename">Medicio</h1>  -->
            </a>

            @auth
                <x-aauth>

                </x-aauth>
            @endauth

            <!-- Contenido visible solo para usuarios no autenticados -->
            @guest
                <x-nauth>

                </x-nauth>
            @endguest

	          @if (Auth::check() && Auth::user()->role === 'admin')
                <li><a href="{{ route('citas.index') }}">Admin Dashboard</a></li>
            @endif
      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
          <div class="container">
            <h2>Ortodoncia Especializada<br>Dr. Iroel Solis</h2>
            <!-- <a href="#about" class="btn-get-started">Read More</a> -->
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
          <div class="container">
            <h2>La salud bucal es más importante de lo que crees... </h2>
            Numerosos estudios han demostrado que existe una relación directa entre la salud bucal y enfermedades como la diabetes, 
            las enfermedades cardíacas
            y las infecciones respiratorias pueden verse afectadas por la salud de nuestra boca.
            </p>
            <!-- <a href="#about" class="btn-get-started">Read More</a> -->
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
          <div class="container">
            <h2>Una de cada 4 personas...</h2>
            Una de cada cuatro personas en el mundo sufre de mal aliento crónico (halitosis), 
            lo que muchas veces es causado por una mala higiene bucal o problemas de salud más 
            graves como infecciones o enfermedades de las encías.
            </p>
            <!-- <a href="#about" class="btn-get-started">Read More</a> -->
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-heartbeat icon"></i></div>
              <h4><a class="stretched-link">Chequeos de Rutina</a></h4>
              Ofrecemos atención especializada en diagnósticos de rutina, 
              asegurando un análisis exhaustivo para garantizar la salud bucal de nuestros pacientes.
              </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-pills icon"></i></div>
              <h4><a href="" class="stretched-link">Medicamento</a></h4>
              Ofrecemos atención especializada en diagnósticos de rutina, asegurando un análisis exhaustivo para garantizar la salud bucal de nuestros pacientes.
              </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-thermometer icon"></i></div>
              <h4><a href="" class="stretched-link">Indoloro</a></h4>
                 garantizando una experiencia prácticamente indolora gracias a técnicas avanzadas.
              </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-dna icon"></i></div>
              <h4><a href="" class="stretched-link">Análisis radiográficos</a></h4>
                 A través de ellos evaluaremos la estructura dental y ósea,
                 para identificar problemas de alineación y monitorear el crecimiento dental, 
                 lo que nos permite planificar y ajustar el tratamiento de manera efectiva.
              </p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section accent-background">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>¿Necesitas atención inmediata?</h3>
              Verifica la disponibilidad de nuestros servicios y aparta tu lugar hoy mismo. 
              Nuestro equipo de profesionales está preparado para brindarte la atención que mereces, 
              asegurando que tu salud bucal esté en óptimas condiciones. No esperes más, ¡tu bienestar es nuestra prioridad!
              </p>
              <a class="cta-btn" href="{{ route('citas.create') }}">Aparta tu lugar!</a>
              
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>¿Quiénes somos?<br></h2>
        <p>Conoce al doctor ortodoncista especializado con un alto grado de estudios.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="Doctor Ortodoncista">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Nuesto enfoque es la Ortodoncia Especializada.</h3>
            <p class="fst-italic">
              El Dr. Iroel Solis es un ortodoncista especializado con una trayectoria académica destacada.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Graduado de la Universidad de Guadalajara (UDG).</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Formación en el Centro Universitario de Ciencias Sociales y Humanidades (CUCSH).</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Reconocido por su enfoque en la investigación y atención de la salud bucal.</span></li>
            </ul>
            <p>
              La UDG se distingue por su sólida formación académica y su compromiso con el desarrollo de programas innovadores en odontología. Además, la Universidad Nacional Autónoma de México (UNAM) es reconocida en el ámbito odontológico, ofreciendo programas de grado y posgrado de alta calidad.
            </p>
            <p>
              Con un enfoque integral, el Dr. Iroel Solis busca brindar un servicio excepcional, utilizando técnicas avanzadas y personalizadas para cada paciente, asegurando resultados óptimos en tratamientos ortodónticos.
            </p>
          </div>
        </div>

      </div>

      </section><!-- /About Section -->



    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-user-md flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="far fa-hospital flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-award flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <section id="features" class="features section">

      <div class="container">

        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/features.jpg" alt="Ortodontistas en Acción">
          </div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>Atención Especializada en Ortodoncia</h3>
            <p>En nuestra clínica, brindamos atención especializada en ortodoncia, enfocándonos en ofrecer tratamientos personalizados que garantizan resultados óptimos. Nuestros ortodoncistas están capacitados para tratar una amplia gama de casos, desde correcciones estéticas hasta problemas funcionales.</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="fa-solid fa-hand-holding-medical flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Evaluación Inicial</a></h4>
                <p>Realizamos una evaluación exhaustiva para determinar el tratamiento adecuado, considerando las necesidades individuales de cada paciente.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="fa-solid fa-suitcase-medical flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Tratamientos Avanzados</a></h4>
                <p>Ofrecemos tratamientos de ortodoncia modernos, incluyendo brackets tradicionales, alineadores transparentes y más, para corregir la alineación dental.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
              <i class="fa-solid fa-staff-snake flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Seguimiento Continuo</a></h4>
                <p>Nuestros ortodoncistas realizan un seguimiento regular para asegurar que cada tratamiento progrese según lo planeado, ajustando según sea necesario.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="fa-solid fa-lungs flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Atención Personalizada</a></h4>
                <p>Nos enorgullecemos de ofrecer un enfoque personalizado, donde cada paciente recibe la atención y el cuidado que merece, adaptando los tratamientos a sus necesidades específicas.</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

      </section><!-- /Features Section -->


          <!-- Services Section -->
      <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
        <p>Brindamos atención especializada para garantizar la salud bucal de nuestros pacientes.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-stethoscope"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Diagnóstico</h3>
              </a>
              <p>Ofrecemos atención especializada en diagnósticos de rutina, asegurando un análisis exhaustivo para garantizar la salud bucal de nuestros pacientes.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Chequeos de Rutina</h3>
              </a>
              <p>Realizamos chequeos de rutina para monitorear la salud dental y prevenir futuros problemas.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-pills"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Medicamento</h3>
              </a>
              <p>Ofrecemos atención especializada en diagnósticos de rutina, asegurando un análisis exhaustivo para garantizar la salud bucal de nuestros pacientes.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Indoloro</h3>
              </a>
              <p>Garantizamos una experiencia prácticamente indolora gracias a técnicas avanzadas y un enfoque cuidadoso en cada tratamiento.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-x-ray"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Análisis Radiográficos</h3>
              </a>
              <p>A través de ellos evaluaremos la estructura dental y ósea, para identificar problemas de alineación y monitorear el crecimiento dental.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Ubicaciones Disponibles</h3>
              </a>
              <p>Contamos con distintas ubicaciones disponibles en Jalisco para brindarte la atención que mereces en el lugar más conveniente.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

      </section><!-- /Services Section -->



    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
      <h2>Áreas de atención</h2>
        Te podemos apoyar en distintos aspectos de la salud bucal, 
         Nuestro enfoque incluye atención especializada en maloclusiones, 
         análisis radiográficos para evaluar la estructura dental y monitoreo del crecimiento en niños y adolescentes. 
         Nos comprometemos a brindarte un servicio integral que garantice tu bienestar y una sonrisa saludable.
      </p>

      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tabs-tab-1">Ortodoncia Preventiva</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-2">Ortodoncia Interceptica.</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-3">Ortodoncia Correctiva.</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-4">Ortodoncia Dentofacial.</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-5">Retención Ortodóntica. </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tabs-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ortodoncia Preventiva.</h3>
                    La ortodoncia preventiva es una rama de la ortodoncia que se centra en la identificación y tratamiento temprano 
                    de problemas dentales y de desarrollo en niños. Su objetivo principal es prevenir que las irregularidades dentales,
                    como maloclusiones o dientes apiñados, se agraven con el tiempo.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ortodoncia Interceptica.</h3>
                    </p>
                    La ortodoncia interceptiva es una modalidad de tratamiento ortodóntico que se realiza durante la infancia para corregir problemas
                     de alineación dental y de desarrollo antes de que se agraven. Su objetivo es intervenir en las etapas iniciales
                      del crecimiento dental para evitar complicaciones mayores en el futuro.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ortodoncia Correctiva.</h3>
                      La ortodoncia correctiva es una rama de la ortodoncia que se enfoca en corregir problemas de alineación dental y
                       maloclusiones en pacientes de todas las edades. Este tipo de tratamiento se realiza una vez que los dientes 
                      permanentes han erupcionado y se han completado el crecimiento de los maxilares, lo que generalmente ocurre en la adolescencia o en la edad adulta.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ortodoncia Dentofacial.</h3>
                      La ortopedia dentofacial es una especialidad dentro de la odontología que se centra en el diagnóstico, prevención y tratamiento
                       de las irregularidades en la posición de los huesos maxilares y la relación entre la mandíbula y el maxilar superior. 
                       Su objetivo principal es corregir problemas estructurales en la cara 
                      y la boca que pueden afectar tanto la función como la estética.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Retención Ortodóntica.</h3>
                      La retención ortodóntica es la fase final del tratamiento ortodóntico que se lleva a cabo 
                      después de que los dientes han sido movidos a su posición correcta. Su objetivo principal es 
                      mantener los dientes en su nueva ubicación y prevenir su regreso a su posición original (recaída). 
                      Esta etapa es crucial para asegurar que los resultados del tratamiento sean duraderos a lo largo del tiempo.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Tabs Section -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Doctor</h2>
        El Doctor es un ortodoncista especializado con un sólido grado académico y una amplia experiencia en el campo de la ortodoncia. 
        Su enfoque personalizado y su 
        compromiso con la excelencia garantizan un tratamiento de calidad, adaptado a las necesidades de cada paciente.
        </p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Iroel Solis</h4>
                <span>Ortodoncista Especializado</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Doctors Section -->

    
<!-- Contact Section -->
      <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contacto</h2>
          <p>
            Contamos con diversas sucursales en todo Jalisco para ofrecerte atención personalizada y accesible en tu localidad.
          </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">
            <div class="col-lg-6 ">
              <div class="row gy-4">

                <div class="col-lg-12">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Consultorios</h3>
                    <select name="categoria" id="categoria">
                      <option value="guadalajara" data-map-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.883973732907!2d-103.39933858422635!3d20.674994786206646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1c36c01cb29%3A0x47056bb03d20e6c9!2sGUADALAJARA!5e0!3m2!1ses!2smx!4v1691271555007!5m2!1ses!2smx">GUADALAJARA</option>
                      <option value="atotonilco" data-map-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.7374946228574!2d-103.17418548422647!3d20.6000847879725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84296b9c036f9d91%3A0x583a94b658a6a3f3!2sATOTONILCO!5e0!3m2!1ses!2smx!4v1691271778887!5m2!1ses!2smx">ATOTONILCO</option>
                      <option value="zapopan" data-map-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.6396573485155!2d-103.36722148422645!3d20.72512488616184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b248731d8b71%3A0x96f9794fbc0c3f43!2sZAPOPAN!5e0!3m2!1ses!2smx!4v1691271666678!5m2!1ses!2smx">ZAPOPAN</option>
                    </select>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-lg-12">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-envelope"></i>
                    <h3>Escríbenos!</h3>
                  </div>
                </div><!-- End Info Item -->

                <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                  <iframe id="map" style="border:0; width: 100%; height: 370px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.883973732907!2d-103.39933858422635!3d20.674994786206646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1c36c01cb29%3A0x47056bb03d20e6c9!2sGUADALAJARA!5e0!3m2!1ses!2smx!4v1691271555007!5m2!1ses!2smx" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

              </div>
            </div>

    </div>

    </section><!-- /Contact Section -->

    <script>
      document.getElementById('categoria').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const mapUrl = selectedOption.getAttribute('data-map-url');
        document.getElementById('map').src = mapUrl;
      });
    </script>

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Dr. Iroel Solis</span>
          </a>
          <div class="footer-contact pt-3">
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/license/">OPS</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>