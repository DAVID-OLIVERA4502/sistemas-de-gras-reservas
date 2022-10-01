<?php
include('../../conexion.php');
session_start();

if(!isset($_SESSION['username_usuario'])){
    $consulta = "SELECT * FROM t_usuario";
    $conexion = conectar();
    $resultado = mysqli_query($conexion, $consulta);
    $listaUsuarios = $resultado->fetch_all(MYSQLI_ASSOC);
    
    //session_start();
    
    if ($_POST) {
      $mensaje = 'usuario o contraseña incorrectos';
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['password'];
      foreach ($listaUsuarios as $user) {
        if ($user['username_usuario'] == $usuario && $user['password_usuario'] == $contrasena) {
          $_SESSION['username_usuario'] = $usuario;
          $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
          header('location: ../dashboard.php');
        }
      }
    }
}
else{
  header('location: ../dashboard.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Focus Admin: Widget</title>

  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

  <!-- Styles -->
  <link href="../css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="../css/lib/themify-icons.css" rel="stylesheet">
  <link href="../css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../css/lib/helper.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

  <div class="unix-login">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="login-content">
            <div class="login-logo">
              <a href="index.html"><span>El Pelotero</span></a>
            </div>
            <div class="login-form">
              <h4>Administracion Login</h4>
              <form action="login.php" method="post">
                <?php if (isset($mensaje)) { ?>
                  <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje; ?></strong>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label>Nombre de Usuario</label>
                  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password..">
                </div>
                <div class="checkbox">

                  <label class="pull-right">
                    <a href="#">Olvide mi contraseña?</a>
                  </label>

                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Iniciar Session</button>
                <div class="register-link m-t-15 text-center">
                  <p>No tienes cuenta ? <a href="#"> Pide al admin que te las credenciales</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>