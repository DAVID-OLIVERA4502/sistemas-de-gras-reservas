<?php
session_start();

if (!isset($_SESSION['username_usuario'])) {
    header('Location: ./login/login.php');
}
$nombre_usuario = $_SESSION['nombre_usuario'];
$username_usuario = $_SESSION['username_usuario'];

include('./ciudadesBD.php');

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
                    <li><a href="clientes.php"><i class="ti-layout-list-thumb"></i> Clientes</a></li>

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
                                <h1>Hola, <span>Bienvenido al panel Administrativo</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Ciudades</li>
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
                                    <h4>Administrativo de las ciudades </h4><br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i> Agregar una Ciudad</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th>Imagen</th>
                                                    <th>Descripcion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaCiudades as $key => $ciudad) : ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $key + 1 ?></th>
                                                        <td><?php echo $ciudad['nombre_ciudad'] ?></td>
                                                        <td><span class="badge badge-success">Habilitado</span></td>
                                                        <td>
                                                            <img src="<?php echo $ciudad['imagen_ciudad'] ?>" alt="<?php echo $ciudad['nombre_ciudad'] ?>.png" width="100px">
                                                        </td>
                                                        <td><?php echo $ciudad['descripcion_ciudad'] ?></td>
                                                        <td>
                                                            <form action="editarCiudad.php" method="POST">
                                                                <input type="hidden" name="id_ciudad" value="<?php echo $ciudad['id_ciudad'] ?>">
                                                                <button type="submit" name="accion" value="seleccionar" class="btn btn-success">
                                                                    <li class="ti-marker-alt"> </li>
                                                                </button>
                                                            </form>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_ciudad" value="<?php echo $ciudad['id_ciudad'] ?>">
                                                                <button type="submit" name="accion" value="borrar" class="btn btn-danger">
                                                                    <li class="ti-trash"> </li>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
                                <p>© Todo los Derechos Reservado - 2022
                                    <!--<a href="#">example.com</a>-->
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal Agregar-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar una Nueva Ciudad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="card-body">
                            <div class="basic-form">

                                <div class="form-group">
                                    <label>Nombre de la ciudad</label>
                                    <input required type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre_ciudad" id="nombre_ciudad">
                                </div>
                                <div class="form-group">
                                    <label>Imagen(URL)</label>
                                    <input required type="text" class="form-control" placeholder="Ingrese la url de su imagen" name="imagen_ciudad" id="imagen_ciudad">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_ciudad">Ingrese una pequeña descripcion</label>
                                    <textarea required class="form-control" id="descripcion_ciudad" name="descripcion_ciudad" rows="3" style="height: 90px;" placeholder="ingrese la descripcion"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="accion" value="agregar" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
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