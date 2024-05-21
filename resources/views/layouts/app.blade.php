<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Agregar la favicon -->
    <link rel="icon" type="image/png" href="ruta/a/tu/favicon.png">

</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Prestamos</span>
                    <span class="profession">Manuel y Steven</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/">
                            <i class="fa-solid fa-house icon"></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('escuelas.index')}}">
                            <i class="fa-solid fa-school icon"></i>
                            <span class="text nav-text">Escuela</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('carreras.index')}}">
                            <i class="fa-solid fa-graduation-cap icon"></i>
                            <span class="text nav-text">Carrera</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('alumnos.index')}}">
                            <i class="fa-regular fa-id-card icon"></i>
                            <span class="text nav-text">Alumnos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('libros.index')}}">
                            <i class="fa-solid fa-book icon"></i>
                            <span class="text nav-text">Libros</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('prestamo.index')}}">
                            <i class="fa-solid fa-list-ol icon"></i>
                            <span class="text nav-text">Prestamos</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="mode">
                    <div class="sun-moon">
                        <i class="fa-regular fa-moon icon"></i>
                        <i class='bx bx-sun icon sun icon'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        @yield('content')
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Mover jQuery antes de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    @stack('scripts')
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
