<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto</title>
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
  <div class="heading" style="background:url(images/CANCHA_GRANDE.jpg) no-repeat">
    <h1>contactanos en cualquier momento</h1>
  </div>

  <!-- booking section starts  -->

  <section class="booking">

    <h1 class="heading-title">Nuestros datos </h1>

    <form method="post" class="book-form">

      <div class="flex">
        <div class="inputBox">
          <H1><span>nuestros nombres :</span></H1><br>
          <span>David Olivera / Jhoel Alan</span>

          <!-- <input type="text" placeholder="enter your name" name="name"> -->
        </div>
        <div class="inputBox">
          <h1> <span>Nuestro Correo Electronico:</span> </h1>
          <span>davidolivera450@gmail.com/jhoelalan450@gmail.com</span>

          <!-- <input type="email" placeholder="enter your email" name="email"> -->
        </div>
        <div class="inputBox">
         <h1> <span>Nuestro Numeros Telefonicos :</span></h1>
         <span>921288100 / 987654125</span>
          <!-- <input type="number" placeholder="enter your number" name="phone"> -->
        </div>
        <div class="inputBox ga">
          <label for="" class="residencia_cliente"> 
            <span class="obligatorio">*</span>
          </label>
          <br>
          <h3>Nuestros locales</h3>
          <select name="menu" class="menuPlase" name="address">
            <option value="0" name="address">.....</option>
            <option value="arequipa" name="address">Abancay</option>
            <option value="lima" name="address">Tamburco</option>
            <option value="Abancay" selected name="address">Comdebamba</option>
          </select>
        </div>
        <div class="inputBox">
          <h1><span>Nota: </span></h1>
          <span>solo estan disponibles para las ciudades que aparesen en el sistema</span>
         
         </div>
      </div>
      <!-- <input type="submit" value="submit" class="btn" name="send"> -->
    </form>
    <form action="">
      <!-- /*} else {
        echo "no se pudo conectar";
      }*/
      ?> -->

      <!-- <input type="submit" value="submit" class="btn" name="send" src="image.png"> -->
    </form><br>
    <h1><span>Gracias por elegirnos</span></h1>
    <!-- <a href="htmlPaiment1.html" class="btn">Gracias por elegirnos</a> -->

  </section>

  <!-- booking section ends -->


  <!-- footer section starts  -->

  <section class="footer">

    <div class="box-container">

      <!-- <div class="box">
        <h3>quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
        <-- <a href="about.php"> <i class="fas fa-angle-right"></i> about</a> -->
        <!-- <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
        <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

     --> 

    </div>

  </section>

  <!-- footer section ends -->


  <!-- swiper js link  -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="js/script.js"></script>

  <script src="js/scriptPreguntas.js"></script>

</body>

</html>