<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plantilla/assets/images/icono.png') }}">
    <title>@yield('titulo')</title>
    <!-- Custom CSS -->
    <link href=" {{ asset('plantilla/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('plantilla/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/dist/css/programacionStyle.css') }}" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6" style="background-color: #ececf3;">
            <nav class="navbar top-navbar navbar-expand-md ">
                <div class="navbar-header" data-logobg="skin6" style="text-align: center;">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand" style="height: 41px;display: block;padding: 0;">
                        <!-- Logo icon -->
                        <a href="index.html">

                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <a href="">NADA AQUI, NADA ALLA</a>
                            </span>

                        </a>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('plantilla/assets/images/piscina.jpeg') }}" alt="homepage" class="dark-logo" />

                    </b>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse float-right" id="navbarSupportedContent">
                    <div class="col-10">

                    </div>
                    <div class="col-2">
                        <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown float-right">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                    <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span class="text-dark">{{ auth()->user()->name }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    <br>

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" href="javascript:void(0)" type="submit"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                            Cerrar sesión</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Inicio</span></a></li>
                        <li class="list-divider"></li>
                        @if(auth()->user()->name === 'admin')
                        <li class="nav-small-cap"><span class="hide-menu">Datos</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('alumno.index') }}" aria-expanded="false"><i class="far fa-user-circle"></i><span class="hide-menu">Alumnos
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('profesor.index') }}" aria-expanded="false"><i class="far fa-user"></i><span class="hide-menu">Docente
                                </span></a>
                        </li>

                        <li class="nav-small-cap"><span class="hide-menu">CURSOS / PERIODOS</span></li>

                        <!--  AREA PROGRAMACION -->
                        <li class="sidebar-item"> <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false"><i data-feather="calendar"></i><span class="hide-menu">
                                    Programacion Cursos
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('periodo.index') }}" class="sidebar-link"><span class="hide-menu"> Periodo </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('programa.index') }}" class="sidebar-link"><span class="hide-menu"> Programa </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('periodo_programa.index') }}" class="sidebar-link"><span class="hide-menu"> Periodo-Programas </span></a></li>

                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('horario.index') }}" aria-expanded="false"><i class="far fa-calendar-alt"></i><span class="hide-menu">Horario
                                </span></a>
                        </li>
                        @endif

                        <li class="nav-small-cap"><span class="hide-menu">MATRICULA Y PAGOS</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('Matricula.create') }}" aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Registrar
                                    Matricula</span></a></li>
                        @if(auth()->user()->name !== 'admin')
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('Matricula.index2') }}" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Consultar
                                    Matricula</span></a></li>
                        @endif
                        @if(auth()->user()->name === 'admin')
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('Matricula.index') }}" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Consultar
                                    Matricula</span></a></li>
                        

                        {{-- <li class="nav-small-cap"><span class="hide-menu">PAGO</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('pago.index') }}" aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Pago</span></a></li> --}}
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper" style="background-color: #ececf3;">

            <section>
                @yield('contenido')
            </section>

            <footer class="footer text-center text-muted">
                Academia de Natación "NADA AQUI, NADA ALLA"
            </footer>

        </div>



    </div>



    <script src="{{ asset('plantilla/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('plantilla/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('plantilla/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('plantilla/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <script src="{{ asset('plantilla/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>

    <section>
        @yield('script')
    </section>

    <script>
    </script>

</body>

</html>
