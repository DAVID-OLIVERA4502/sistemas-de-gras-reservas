<?php 
include('./conexion.php');
$consulta = "SELECT * FROM t_ciudad";
$conexion = conectar();
$resultado = mysqli_query($conexion, $consulta);
$listaCiudades = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="eS">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>casa</title>
  <!-- swiper css link  -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/stylePregunta.css">
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
  <section class="home">

    <div class="swiper home-slider">

      <div class="swiper-wrapper">

        <div class="swiper-slide slide" style="background: url(images/cancahEstadio.jpg) no-repeat">
          <div class="content">
            <span>hola mundo</span>
            <h3>canchas luminosas y grandes</h3>
            <a href="book.php" class="btn">comezar ahora</a>
          </div>
        </div>

        <div class="swiper-slide slide" style="background:url(images/canchaGras.jpg) no-repeat">
          <div class="content">
            <span>Experiencia placentera </span>
            <h3>Disfruta del mejor ambiente en nuestros locales</h3>
            <a href="book.php" class="btn">comezar ahora</a>
          </div>
        </div>

        <div class="swiper-slide slide" style="background:url(images/canchasCrud.jpg) no-repeat">
          <div class="content">
            <span>Experiencia placentera junto a tu equipo</span>
            <h3>modernos y anplios cervicios</h3>
            <a href="book.php" class="btn">comezar ahora</a>
          </div>
        </div>

      </div>


      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
  <section class="services">
    <h1 class="heading-title"> Nuestros Servicios </h1>
    <div class="box-container">
      <div class="box">
        <img src="images/futbolIcono.png" alt="">
        <h3>cancha</h3>
        <h3>futbool</h3>
      </div>

  </section>
  <section class="home-packages">
    <h1 class="heading-title"> locales
    </h1>
    <div class="box-container">

      <?php foreach($listaCiudades as $ciudad){ ?>
      
      <div class="box">
        <div class="image">
          <img src="<?php echo $ciudad['imagen_ciudad'] ?>" alt="<?php echo $ciudad['nombre_ciudad'] ?>.png">
        </div>
        <div class="content">
          <h3><?php echo $ciudad['nombre_ciudad'] ?></h3>
          <p><?php echo $ciudad['descripcion_ciudad'] ?></p>
          <a href="package.php?id_ciudad=<?php echo $ciudad['id_ciudad'] ?>" class="btn">recervar</a>
        </div>
      </div>
      <?php } ?>


    </div>

  </section>
  <div class="wrapper box-container">
    <div class="dropdown">
      <input type="checkbox" id="question-1">
      <label for="question-1">¿Qué datos necesito para registrarme?</label>
      <div class="text">
        <p>Para registrarte en AlquiláTuCancha, deberás iniciar sesión con una red social (Facebook o Google) o podrás
          ingresar con
          tu número de teléfono. Esto nos servirá para poder dejar los datos de la reserva al club.</p>
      </div>
    </div>
    <div class="dropdown">
      <input type="checkbox" id="question-2">
      <label for="question-2">¿Cómo reservar un turno para jugar?</label>
      <div class="text">
        <p>Para reservar una cancha, es tan sencillo como ingresar zona, deporte y fecha y así podrás ver la
          disponibilidad. Luego,
          dependiendo del club, deberás o no dejar una tarjeta como un deposito de seguridad. No se te cobrará nada a
          menos que no
          cumplas con las polticas de cancelación. Podrás encontrar canchas de fútbol, padel, tenis y todos los deportes
          que estén
          disponibles en la plataforma.</p>
      </div>
    </div>
    <div class="dropdown">
      <input type="checkbox" id="question-3">
      <label for="question-3">¿La reserva es instantánea o necesito una confirmación del club?</label>
      <div class="text">
        <p>Ni bien ingreses tu tarjeta como deposito en garantía, la reserva está confirmada. Los clubes utilizan
          nuestro software
          de gestión profesional para clubes en donde vuelcan su disponibilidad en tiempo real. De esta manera le
          garantizamos al
          usuario el 100% de efectividad en las reservas.</p>
      </div>
    </div>
    <div class="dropdown">
      <input type="checkbox" id="question-4">
      <label for="question-4">¿Cuánto tiempo tengo para cancelar una reserva ya confirmada?</label>
      <div class="text">
        <p>La cancelación siempre dependerá de las políticas del club. De todas maneras siempre las sabrás antes de
          reservar, ya
          que nosotros te las informaremos antes de procesar el pago. En caso de lluvia, podrás contactarte directamente
          con el
          club y así el mismo club gestionará la devolución de la seña en caso de que corresponda.</p>
      </div>
    </div>

    <div class="dropdown">
      <input type="checkbox" id="question-4">
      <label for="question-4">¿Qué pasa si no voy a jugar?</label>
      <div class="text">
        <p>En caso de que no te presentes, se debitará el monto de la seña de tu tarjeta ingresada. Es importante que
          canceles lo
          antes posible para poder permitirle a otros usuarios que practiquen deporte. </p>
      </div>
    </div>

    <div class="dropdown">
      <input type="checkbox" id="question-4">
      <label for="question-4">Quiero cancelar una reserva.</label>
      <div class="text">
        <p>A continuación te compartimos un vídeo instructivo de como cancelar una reserva:
          Cancelación de reservas - AlquiláTuCancha</p>
      </div>
    </div>

  </div>
  <section class="footer">

    

    <div class="credit">Autores: <span>David Olivera</span> | Jhoel Alan </div>

  </section>
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/scriptPreguntas.js"></script>
</body>

</html>