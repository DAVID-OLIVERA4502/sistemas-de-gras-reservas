<?php
function conectar()
{
  try {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "alquilercanchas";
    $con = mysqli_connect($host, $user, $pass) or die("error de conexion");
    mysqli_select_db($con, $db);
    return $con;
  } catch (Exception $e) {
    echo "<h1>Error: " . $e->getMessage().' </h1>';
  }
}
