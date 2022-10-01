<?php 
include('./conexion.php');

if(isset($_GET['id_ciudad'])&&$_GET['id_ciudad']!='0'){
  $id_ciudad=$_GET['id_ciudad'];
  $consulta = "SELECT * FROM t_cancha inner join t_ciudad on t_cancha.id_ciudad=t_ciudad.id_ciudad WHERE t_cancha.id_ciudad = $id_ciudad";
}else{
  $consulta = "SELECT * FROM t_cancha";
}

$conexion = conectar();
$resultado = mysqli_query($conexion, $consulta);
$lista = $resultado->fetch_all(MYSQLI_ASSOC);

$resCiudad=mysqli_query($conexion,"SELECT * FROM t_ciudad");
$listaCiudad=$resCiudad->fetch_all(MYSQLI_ASSOC);

$resHorario=mysqli_query($conexion,"SELECT * FROM t_horario");
$listaHorario=$resHorario->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>package</title>
  <!-- swiper css link  -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- responsive css file link  -->
  <link rel="stylesheet" href="css/micss.css">

  

</head>
<body>
  <section class="header">
    <a href="home.php" class="logo"><img src="images/logoCancha.png" alt="" height="50px" width="50px">El PELOTERO</a>

    <nav class="navbar">
      <a href="home.php">Inicio</a>
      <a href="package.php">Canchas</a>
      <a href="book.php">Contacto</a>
      <a href="./admin/login/login.php">Login</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars">
    </div>
  </section>
  <div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
    <h1>Nuestras Canchas</h1>
  </div>
  <section class="packages abancay">

  <div class="filtro">
    <h2>Filtrar por:</h2>
    <form action="package.php" method="get">
      <select name="id_ciudad" id="id_ciudad" class="seleccion">
        <option value='0'>Todos</option>
        <?php foreach($listaCiudad as $ciudad){ ?>
        <option value="<?php echo $ciudad['id_ciudad'] ?>"><?php echo $ciudad['nombre_ciudad'] ?></option>
        <?php } ?>
      </select>
      <input type="submit" class="btn boton-reservar" value="Buscar" style="border: none;">
      <i class="fas fa-search"></i>
    </form>
  </div>
      
    <h1 class="heading-title">top <?php
    if(isset($_GET['id_ciudad'])&&$_GET['id_ciudad']!='0'){
      $id_ciudad=$_GET['id_ciudad'];
      $consulta = "SELECT * FROM t_cancha inner join t_ciudad on t_cancha.id_ciudad=t_ciudad.id_ciudad WHERE t_cancha.id_ciudad = $id_ciudad";
      $resCiudad=mysqli_query($conexion,"SELECT * FROM t_ciudad WHERE id_ciudad=$id_ciudad");
      $ciudad=$resCiudad->fetch_assoc();
      echo $ciudad['nombre_ciudad'];
    }else{
      echo "Todas las";
    }
    ?> CANCHAS</h1>

    <div class="box-container">
      <?php 
        foreach($lista as $cancha){
      ?>
      <div class="z">
        <div class="image imagen-card">
          <img src="<?php echo $cancha['imagen_cancha'] ?>" class="a" alt="<?php echo $cancha['nombre_cancha'] ?>.png">
        </div>
        <div class="content">
          <h3><?php echo $cancha['nombre_cancha'] ?></h3>
          <li>
              <span><?php echo $cancha['descripcion_cancha'] ?></span>
          </li>
          <div><br>
            <input type="hidden" id="id" name="id" value="<?php echo $isd=$cancha['id_cancha'] ?>">
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <span><?php echo $cancha['direccion_cancha'] ?></span>
            </li>
            <li>
              <i class="fas fa-phone"></i>
              <span><?php echo $cancha['telefono_cancha'] ?></span>
            </li>
            <li>
              <i class="fas fa-user"></i>
              <span><b>Admin:</b> <?php echo $cancha['encargado_cancha'] ?></span>
            </li>
            <li>
              <i class="fa fa-map-marker"></i>
              <span>
                <?php 
                  $id_ciudad=$cancha['id_ciudad'];
                  $resCiudad=mysqli_query($conexion,"SELECT * FROM t_ciudad WHERE id_ciudad=$id_ciudad");
                  $ciudad=$resCiudad->fetch_assoc();
                  echo $ciudad['nombre_ciudad'];
              ?></span>
            </li>
          </div>
          <div>
            <button class="btn boton-reservar" onclick="mostrarModal('<?php echo $cancha['nombre_cancha'] ?>',<?php echo $cancha['id_cancha'] ?>)"><i class="fas fa-shopping-cart"></i> Reservar</button>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    
    </div>

    <div class="load-more"><a href="home.php"><span class="btn boton-reservar">Volver</span></a></div>

  </section>
  <!-- Button trigger modal -->

  <!--Modal de la reservacion::BEGIN-->
  
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">

      <header class="w3-container w3-teal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="btn btn-primary w3-display-topright">&times;</span>
        <h2>Reservar Cancha</h2>
      </header>

      <div class="w3-container">
      <div class="miReservacion">
        <form action="./reservarBD.php" method="POST" class="formulariosModal" >
          <label for="nombre_cliente">Nombre</label>
          <input type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Tu nombre..." >

          <label for="apellido_cliente">Apellidos</label>
          <input type="text" id="apellido_cliente" name="apellido_cliente" placeholder="Tu apellido..." >
          
          <label for="celular_cliente">Celular</label>
          <input type="text" id="celular_cliente" name="celular_cliente" placeholder="Ingrese su numero de celular...">

          <label for="id_cancha">id</label>
          <input type="hidden" name="id_cancha" id="id_cancha">

          <label for="nombre_cancha">Cancha</label>
          <input type="text" disabled name="nombre_cancha" id="nombre_cancha">

          <label for="apellidos">Fecha</label>
          <input type="date" id="fecha_reservacion" name="fecha_reservacion" value="<?php echo date('Y-m-d')?>">

          <div class="contenedor-radioButon">
            <h2> 
              Hora
            </h2>
            <?php foreach($listaHorario as $horario): ?>
            <label class="contenedor-radio">
              <input type="radio" checked="checked" name="id_horario" id="id_horario" value="<?php echo $horario['id_horario']?>">
              <span class="checkmark-radio"></span><?php echo $horario['inicio_horario'].' - '.$horario['fin_horario'] ?>
            </label><br>
            <?php endforeach; ?>
          </div>
        
          <input type="submit" value="Reservar">
        </form>
      </div>
      </div>

    </div>
  </div>


  <section class="footer">

    <!-- <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
        <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
        <a href="package.php"> <i class="fas fa-angle-right"></i> package</a> -->
        <!-- <a href="book.php"> <i class="fas fa-angle-right"></i> book</a> -->
      <!-- </div> --> 

    <!-- </div> -->

    <div class="credit"> Autores: <span>David</span> | jhoel alan</div>

  </section>

  <script>
    function mostrarModal(nombre_cancha,id_cancha) {
      document.getElementById('id01').style.display = 'block';
      document.getElementById('nombre_cancha').value = nombre_cancha;
      document.getElementById('id_cancha').value = id_cancha;
    }
  </script>

  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>