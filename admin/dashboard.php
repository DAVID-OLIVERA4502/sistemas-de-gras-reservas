<?php
session_start();

if (!isset($_SESSION['username_usuario'])) {
    header('Location: ./login/login.php');
}
$nombre_usuario = $_SESSION['nombre_usuario'];
$username_usuario = $_SESSION['username_usuario'];

include('./dashboardBD.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrativo</title>
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
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Ingresos por alquileres</div>
                                        <div class="stat-digit"><?= $precio_reservas; ?> Soles</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Nuestros clientes</div>
                                        <div class="stat-digit"><?= $cantidad_clientes; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Nuestras Canchas</div>
                                        <div class="stat-digit"><?= $cantidad_canchas; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i aria-hidden="true" class="fa fa-location-arrow color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Precencia en ciudades</div>
                                        <div class="stat-digit"><?= $cantidad_ciudades; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Ganacias por los ultimos 4 dias</h4>

                                </div>
                                <div class="card-body">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">

                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-facebook">
                                        <i class="ti-facebook"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">1</div>
                                        <div class="stat-text">Likes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-youtube">
                                        <i class="ti-youtube"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">0</div>
                                        <div class="stat-text">Subscribes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-twitter">
                                        <i class="ti-twitter"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">0</div>
                                        <div class="stat-text">Tweets</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger">
                                        <i class="ti-linkedin"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">2</div>
                                        <div class="stat-text">Followers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




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



    <!--chartsjs-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--barra-->
    <script>
        var labels = [<?php foreach ($ciudad_x_reservacion as $item) {
                            echo "'" . $item['nombre_ciudad'] . "',";
                        } ?>];
        var data = [<?php foreach ($ciudad_x_reservacion as $item) {
                        echo $item['cantidad'] . ",";
                    } ?>];

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    backgroundColor: ColorRandonLength(),
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de Alquileres por Ciudad'
                    }
                }
            }
        });

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function ColorRandonLength() {
            var color = [];
            for (var i = 0; i < data.length; i++) {
                color.push(getRandomColor());
            }
            return color;
        }
    </script>
    <!--barra-->
    <script>
        //5 meses anteriores

        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#myChart2");
        // Las etiquetas son las que van en el eje X. 
        const etiquetas = [<?php foreach ($ingreso_fechas as $item) {
                                echo ",'" . $item['fecha_reservacion'] . "'";
                            } ?>]
        // Podemos tener varios conjuntos de datos
        const datosVentas2020 = {
            label: "Ventas por dia",
            data: [<?php foreach ($ingreso_fechas as $item) {
                        echo "," . $item['precio'] . "";
                    } ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
            backgroundColor: 'rgba(52, 57, 87, 1)', // Color de fondo
            
        };


        new Chart($grafica, {
            type: 'bar', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>
    <!--barra-->



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