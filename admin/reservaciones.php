<?php
session_start();

if (!isset($_SESSION['username_usuario'])) {
    header('Location: ./login/login.php');
}
$nombre_usuario = $_SESSION['nombre_usuario'];
$username_usuario = $_SESSION['username_usuario'];

include('./reservacionesBD.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrativo | Reservaciones</title>
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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Reservaciones</li>
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
                                    <h4>Administrativo de las reservaciones</h4><br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="select_anidado()"><i class="ti-plus"></i> Agregar una nueva reservacion</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fecha de reservacion</th>
                                                    <th>Cancha</th>
                                                    <th>Horario</th>
                                                    <th>Cliente</th>
                                                    <th>Celular Cliente</th>
                                                    <th>Ciudad</th>
                                                    <th>Precio</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaReservaciones as $key => $reservacion) : ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $key + 1 ?></th>
                                                        <td><?php echo $reservacion['fecha_reservacion'] ?></td>
                                                        <td><?php
                                                            foreach ($listaCanchas as $cancha) {
                                                                if ($cancha['id_cancha'] == $reservacion['id_cancha']) {
                                                                    echo $cancha['nombre_cancha'];
                                                                    $IDciudad = $cancha['id_ciudad'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            foreach ($listaHorarios as $horario) {
                                                                if ($horario['id_horario'] == $reservacion['id_horario']) {
                                                                    echo $horario['inicio_horario'] . ' - ' . $horario['fin_horario'];
                                                                }
                                                            }
                                                            ?></td>
                                                        <?php
                                                        foreach ($listaClientes as $cliente) {
                                                            if ($cliente['id_cliente'] == $reservacion['id_cliente']) {
                                                                echo '<td>';
                                                                echo $cliente['nombre_cliente'];
                                                                echo '</td>';
                                                                echo '<td>';
                                                                echo $cliente['celular_cliente'];
                                                                echo '</td>';
                                                            }
                                                        }
                                                        ?>
                                                        <td><?php
                                                            foreach ($listaCiudades as $ciudad) {
                                                                if ($ciudad['id_ciudad'] == $IDciudad) {
                                                                    echo $ciudad['nombre_ciudad'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $reservacion['precio_reservacion'] ?> con 00/ soles</td>
                                                        <td>
                                                            <?php
                                                            if ($reservacion['estado_reservacion'] == 0) {
                                                                echo '<span class="badge badge-warning">Cancelado</span>';
                                                            } else if ($reservacion['estado_reservacion'] == 1) {
                                                                echo '<span class="badge badge-success">Confirmado</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger">Pendiente</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <form action="editarReservaciones.php" method="POST">
                                                                <input type="hidden" name="id_reservacion" value="<?php echo $reservacion['id_reservacion'] ?>">
                                                                <button type="submit" name="accion" value="seleccionar" class="btn btn-outline btn-success">
                                                                    <li class="ti-marker-alt"> Editar</li>
                                                                </button>
                                                            </form>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_reservacion" value="<?php echo $reservacion['id_reservacion'] ?>">
                                                                <button type="submit" name="accion" value="borrar" class="btn btn-outline btn-danger">
                                                                    <li class="ti-trash"> Elimnar</li>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <!--<tr>
                                                    <th scope="row">1</th>
                                                    <td>12-12-2022</td>
                                                    <td>jhon</td>
                                                    <td>987654321</td>
                                                    <td>El pepe</td>
                                                    <td>El pepe</td>
                                                    <td>Abancay</td>
                                                    <td>
                                                        <button type="submit" name="accion" value="Ver" class="btn btn-outline btn-info">
                                                            <li class="ti-eye"> Ver</li>
                                                        </button><br>
                                                        <button type="submit" name="accion" value="Cancelar" class="btn btn-outline btn-warning">
                                                            <li class="ti-close"> Cancelar</li>
                                                        </button><br>
                                                        <button type="submit" name="accion" value="eliminar" class="btn btn-outline btn-danger">
                                                            <li class="ti-trash"> Eliminar</li>
                                                        </button>

                                                    </td>
                                                </tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <p>Manejo de estados: </p>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span class="badge badge-danger">Pendiente</span> | Quiere decir solo ha reservado pero no a pagado</li>
                                        <li class="list-group-item"><span class="badge badge-success">Confirmado</span> | Quiere decir que ha reservado y pagado con aticipacion</li>
                                        <li class="list-group-item"><span class="badge badge-warning">Cancelado</span> | Quiere decir que ha reservado o ha pagado, pero por cuestiones ha cancelado la reserva(devolver dinero)</li>
                                    </ul>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva reservacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="card-body">
                            <div class="basic-form">

                                <div class="form-group">
                                    <label>Fecha de la reserva</label>
                                    <input required type="date" class="form-control" name="fecha_reservacion" id="fecha_reservacion" value="<?php date_default_timezone_set('America/Lima');
                                                                                                                                            echo date('Y-m-d'); ?>">
                                </div>
                                <!--div select-->
                                <div class="form-group">
                                    <label>Seleccione la ciudad</label>
                                    <select class="form-control" name="id_ciudad" id="id_ciudad" required onchange="select_anidado()">
                                        <?php foreach ($listaCiudades as $ciudad) : ?>
                                            <option value="<?php echo $ciudad['id_ciudad'] ?>"><?php echo $ciudad['nombre_ciudad'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--div select-->
                                <div class="form-group">
                                    <label>Seleccione la cancha</label>
                                    <select class="form-control" name="id_cancha" id="id_cancha" required>
                                        <?php foreach ($listaCanchas as $cancha) : ?>
                                            <option value="<?php echo $cancha['id_cancha'] ?>"><?php echo $cancha['nombre_cancha'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--div select-->
                                <div class="form-group">
                                    <label>Seleccione un horario</label>
                                    <select class="form-control" name="id_horario" id="id_horario" required>
                                        <?php foreach ($listaHorarios as $horario) : ?>
                                            <option value="<?php echo $horario['id_horario'] ?>"><?php echo $horario['inicio_horario'] . ' - ' . $horario['fin_horario']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--div select-->
                                <div class="form-group">
                                    <label>Seleccione el cliente</label>
                                    <select class="form-control" name="id_cliente" id="id_cliente" required>
                                        <?php foreach ($listaClientes as $cliente) : ?>
                                            <option value="<?php echo $cliente['id_cliente'] ?>"><?php echo $cliente['nombre_cliente']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el precio</label>
                                    <input required type="number" class="form-control" name="precio_reservacion" id="precio_reservacion" placeholder="Ingrese el precio">
                                </div>
                                <!--div select-->
                                <div class="form-group">
                                    <label>Seleccione estado del pago</label>
                                    <select class="form-control" name="estado_reservacion" id="estado_reservacion" required>
                                        <option value="0">Cancelado</option>
                                        <option value="1">Confirmado</option>
                                        <option value="2" selected>Pendiente</option>
                                    </select>
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

        <script>
            function select_anidado() {
                var id_ciudad = document.getElementById('id_ciudad').value;
                var canchas = <?php echo json_encode($listaCanchas); ?>;
                var canchas_filtradas = canchas.filter(function(cancha) {
                    return cancha.id_ciudad == id_ciudad;
                });
                var select = document.getElementById('id_cancha');
                select.innerHTML = '';
                for (var i = 0; i < canchas_filtradas.length; i++) {
                    var option = document.createElement('option');
                    option.value = canchas_filtradas[i].id_cancha;
                    option.innerHTML = canchas_filtradas[i].nombre_cancha;
                    select.appendChild(option);
                }
            }
        </script>



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