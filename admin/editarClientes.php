<?php
session_start();

if (!isset($_SESSION['username_usuario'])) {
    header('Location: ./login/login.php');
}
$nombre_usuario = $_SESSION['nombre_usuario'];
$username_usuario = $_SESSION['username_usuario'];

include('./clientesBD.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrativo | ciudades</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>El Pelotero</span>
                        </a></div>
                    <li class="label">Main</li>
                    <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard </a></li>

                    <li class="label">Mis tablas</li>
                    <li><a href="ciudades.php"><i class="ti-pin2"></i> Ciudades</a></li>
                    <li><a href="canchas.php"><i class="ti-widgetized"></i> Canchas</a></li>
                    <li><a href="usuarios.php"><i class="ti-user"></i> Usuarios de Sistema</a></li>
                    <li class="active"><a href="clientes.php"><i class="ti-layout-list-thumb"></i> Clientes</a></li>

                    <li class="label">Apps</li>
                    <li><a href="horario.php"><i class="ti-calendar"></i> Horarios</a></li>
                    <li><a href="reservaciones.php"><i class="ti-list"></i> Reservaciones</a></li>

                    <li class="label">Extra</li>

                    <li><a href="documentacion.php"><i class="ti-file"></i> Documentacion</a></li>
                    <li><a href="cerrar.php"><i class="ti-close"></i> Cerrar Session</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">

                        <div class="dropdown dib">


                            <div class="header-icon">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo $nombre_usuario ?>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left"><?php echo $username_usuario ?></span>
                                            <p class="trial-day"><?php echo $nombre_usuario ?></p>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"> <i class="ti-user"></i> Configuraciones</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Documentacion</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cerrar.php"><i class="ti-power-off"></i> Cerrar Session</a>
                                    </div>
                                </li>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hola, <span>Bienvenido al Panel Administrativo</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Clientes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Editar un cliente </h4><br>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="">
                                        <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id ?>">

                                        <div class="form-group">
                                            <label>Nombre del cliente</label>
                                            <input required type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre_cliente" id="nombre_cliente" value="<?php echo $nombre_cliente ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido del cliente</label>
                                            <input required type="text" class="form-control" placeholder="Ingrese el Apellido" name="apellido_cliente" id="apellido_cliente" value="<?php echo $apellido_cliente ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Celular del cliente</label>
                                            <input required type="text" class="form-control" placeholder="Ingrese numero de cel.." name="celular_cliente" id="celular_cliente" value="<?php echo $celular_cliente ?>">
                                        </div>

                                        <button type="submit" name="accion" value="editar" class="btn btn-primary">Actualizar</button>
                                        <!--Boton Concelar-->
                                        <a href="clientes.php" class="btn btn-danger">Cancelar</a>

                                    </form>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>© Todo los Derechos Reservado - 2022<!--<a href="#">example.com</a>--></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>


    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>
</body>

</html>