<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
    <title>
       Encuestadores
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dynatable.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dpe.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">

    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <!-- iframe removal -->
</head>

<body class="">
    <div class="wrapper">
        @if (Auth::check())
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="images/sidebar-bg.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    <img src="\images/logo-bap.jpg" class="img-fluid logo-prov" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                  <li class="nav-item {{ Request::is('encuestadores*')  ? 'active' : '' }} ">
                        <a class="nav-link" href="/encuestadores">
                            <i class="material-icons">location_ons</i>
                            <p>Adm. Encuestadores</p>
                        </a>
                    </li>

                    @if ( Auth::user()->role->nombre == 'superadmin' )
                    <li class="nav-item {{ Request::is('usuarios*')  ? 'active' : '' }}" >
                        <a class="nav-link" href="/usuarios">
                            <i class="material-icons">person</i>
                            <p>Adm. Usuarios</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        @endif
        <div class="main-panel" style="width:  {{ !Auth::check() ? '100% !important' : '' }}">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        @if (Auth::check())
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                    <a class="nav-link"  href="{{ route('logout') }}">

                                        <i class="material-icons">exit_to_app</i>
                                        Salir
                                        <p>
                                            <span class="d-lg-none d-md-block">Stats</span>
                                        </p>
                                    </a>
                                </li>

                        </ul>
                        @endif
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer ">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Dirección Provincial de Estadística
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-material-design.js') }}"></script>
<script src="{{ asset('js/perfect-scroll-bar.min.js')}}"></script>

<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/arrive.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{ asset('js/material-dashboard.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.21.1/dist/sweetalert2.all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script  src="{{ asset('js/jquery.dynatable.js') }}"></script>




<script src="{{ asset('js/ajax-calls.js') }}"></script>
<!-- demo init -->
<script>
        $('div.alert').not('.alert-danger').delay(3000).fadeOut(350);
</script>

<script>

        var loadFile = function(event) {


          var defaultProfile = document.getElementById('defaultImg');
          var output = document.getElementById('output');
          defaultProfile.style.display = 'none';
          output.classList.remove('fadeIn');

            try {
                output.src = URL.createObjectURL(event.target.files[0]);
                 output.classList.add('fadeIn');
                }
                catch(err) {
                    defaultProfile.style.display = 'inline';
                    output.src ='';
                return;
                }

        };


        var loadFileEdit = function(event) {

                var defaultProfile = document.getElementById('defaultImgEdit');
                var output = document.getElementById('output');
                defaultProfile.style.display = 'none';
                output.classList.remove('fadeIn');

         try {
          output.src = URL.createObjectURL(event.target.files[0]);
          output.classList.add('fadeIn');
      }
      catch(err) {

          defaultProfile.style.display = 'inline';
          output.src ='';
      return;
      }

};



</script>


</html>
