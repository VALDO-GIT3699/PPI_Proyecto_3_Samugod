<div class="container position-relative d-flex align-items-center justify-content-end">
    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#about">¿Quiénes Somos?</a></li>
            <li><a href="#services">Servicios</a></li>
            <li><a href="#contact">Ubicaciones</a></li>
            <li><a href="#doctors">Doctor</a></li>
            <li>
            <form method="POST" action="{{ route('logout') }}"">
                @csrf
                <button class="cta-btn" type="submit">
                    Salir
                </button>
            </form>
            </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
</div>