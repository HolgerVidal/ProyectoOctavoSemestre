
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <title>ESPAM MFL - Metodologia Eder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="{{ asset('eder/images/favicon.png') }}" type="image/x-icon">    
   
    <!-- LOAD CSS FILES -->    
    <link href="{{ asset('eder/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/miEstilos.css') }}" rel="stylesheet" type="text/css">  

    <!-- color scheme -->
    <link href="{{ asset('eder/switcher/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('eder/switcher/colors/blue.css') }}" type="text/css" id="colors">

    <!-- importacion de estilos para el editor de texto -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="editor/css/editor.css">
    <link rel="stylesheet" type="text/css" href="editor/css/misEstilos.css">

    <!-- final de importacion de estilos para el editor de texto -->

</head>
<body >
    <div id="app">
        
        <header class="site-header-1 site-header">
            <!-- Main bar start -->
            <div id="sticked-menu" class="main-bar">
                <div class="container">                
                    <div class="row">                    
                        <div class="col-md-12">

                            <!-- logo begin -->
                            <div style="width: 260px" id="logo" class="pull-left">
                                <a href="#">
                                    <img style="width: 100%" src="eder/images/logoespam.png" alt="" class="logo">
                                </a>
                            </div>
                            <!-- logo close -->
                            
                            <!-- btn-mobile menu begin -->
                            <a id="show-mobile-menu" class="btn-mobile-menu hidden-lg hidden-md"><i class="fa fa-bars"></i></a>
                            <!-- btn-mobile menu close -->  

                            <!-- mobile menu begin -->
                            <nav id="mobile-menu" class="site-mobile-menu hidden-lg hidden-md">
                                <ul></ul>
                            </nav>  
                            <!-- mobile menu close -->                        

                            <!-- desktop menu begin -->
                            <nav id="desktop-menu" class="site-desktop-menu hidden-xs hidden-sm">
                                <ul class="clearfix">
                                        <li class="active"><a href="{{route('inicio')}}">Inicio</a>
                                        </li>
                                        <li class=" hidden-lg"><a href="#">Cuenta</a>
                                            @guest
                                                <ul class="clearfix">
                                                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                                                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                                                </ul>
                                            @else
                                                <ul class="clearfix">
                                                    <li><a href="#">Mi Perfil</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                    </form>
                                                </ul>
                                             @endguest
                                        </li>
                                        <li><a href="#">Foro</a>
                                            <ul>
                                                @guest
                                                @else
                                                <li><a href="#">Nuevo Foro</a></li>
                                                <li><a href="#">Mis Foros</a></li>
                                                @endguest
                                                <li><a href="#">Lista de Foros</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Documentación</a></li>
                                        <li><a href="#">Contactos</a></li>
                                        @guest
                                        @else
                                            @if( Auth::user()->idtipo_usuario =='1')
                                                <li><a href="#">Administrador</a>
                                                    <ul>
                                                        <li><a href="{{route('administrar_info_eder')}}">Informacion Eder</a></li>
                                                        <li><a href="#">Reportes</a></li>
                                                    </ul>
                                                </li>
                                            @endif                
                                        @endguest
                                    </ul>
                            </nav>
                            <!-- desktop menu close -->                            
                            <!-- <div class="header-buttons pull-right hidden-xs hidden-sm"> -->
                            <!-- <div id="btn-offcanvas-menu" class="header-buttons pull-right hidden-xs hidden-sm botonLogin">
                                @guest
                                    <a href="#"><i style="color: #ffff" class="fa fa-bars"></i></a>
                                @else
                                    {{ Auth::user()->name }}    <a href="#"><i class="fa fa-bars"></i></a>                                    
                                @endguest
                            </div> -->

                            <div id="btn-offcanvas-menu" class="header-buttons pull-right hidden-xs hidden-sm botonLogin">
                                @guest
                                    <img class="imgPerfil" src="eder/images/avatar/avatarblanco.jpg" alt="">
                                    <p>Login</p>
                                    <a href="#"><i class="fa fa-bars"></i></a>
                                @else
                                    <img class="imgPerfil" src="eder/images/avatar/avatarblanco.jpg" alt="">
                                    <p>{{ Auth::user()->name }}</p>
                                    <a href="#"><i class="fa fa-bars"></i></a>
                                @endguest 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

                <!-- header close -->
        <div class="gray-line-2"></div>

        <!-- Menu OffCanvas right begin -->
        <div class="navright-button hidden-sm">
            <div class="compact-menu-canvas" id="offcanvas-menu">
                <h3>MENU</h3><a id="btn-close-canvasmenu"><i class="fa fa-close"></i></a>
                <nav>
                @guest
                    <ul class="clearfix">
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    </ul>
                @else
                    <ul class="clearfix">
                        <li><a href="#">Mi Perfil</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </ul>
                 @endguest
                                  
                </nav>
            </div>
        </div> 
        <!-- Menu OffCanvas right close -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <a id="to-the-top" ><i class="fa fa-angle-up"></i></a>

    <!-- LOAD JS FILES -->
    <script type="text/javascript" src="eder/js/jquery.min.js"></script>
    <script type="text/javascript" src="eder/js/bootstrap.min.js"></script>
    <script src="eder/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="eder/js/easing.js"></script>
    <script type="text/javascript" src="eder/js/owl.carousel.js"></script>
    <script type="text/javascript" src="eder/js/jquery.fitvids.js"></script>    
    <script type="text/javascript" src="eder/js/wow.min.js"></script>
    <script type="text/javascript" src="eder/js/jquery.magnific-popup.min.js"></script>

    <!-- Waypoints-->
    <script type="text/javascript" src="eder/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="eder/js/sticky.min.js"></script>

    <script src="eder/js/compact.js"></script> 

    <script src="eder/switcher/demo.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/paginaPrincipal.js') }}"></script>
    <script src="{{ asset('js/IR_pagina.js') }}"></script>
    <script src="{{ asset('js/administradorContenido.js') }}"></script>

    <!-- IMPORTACIONES DE EDITOR DE TEXTO -->
    <script type="text/javascript" src="editor/js/jquery-1.12.0.js"></script>
    <script type="text/javascript" src="editor/js/editor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#txt-content').Editor();
            // $('#txt-content').Editor('setText', ['<p style="color:Black;">Ingrese un nuevo contenido...</p>']);
            $('#btn-enviar').click(function(e){
                e.preventDefault();
            // $('#txt-content').text($('#txt-content').Editor('getText'));
               alert($('#txt-content').Editor('getText'));            
            });
        }); 
    </script>
</body>
</html>


     
