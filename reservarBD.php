<?php 
include('./conexion.php');
$conexion = conectar();

try{

    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $celular_cliente = $_POST['celular_cliente'];
    
    
    $query = "INSERT INTO t_cliente (nombre_cliente, apellido_cliente, celular_cliente) VALUES ('$nombre_cliente', '$apellido_cliente', '$celular_cliente')";
    $resultado = mysqli_query($conexion, $query);
    $id_cliente = mysqli_insert_id($conexion);
    
    $fecha_reservacion = $_POST['fecha_reservacion'];
    $precio_reservacion = 20; //20 soles por defecto
    $estado_reservacion =2; //estado PENDIENTE por defecto
    $id_horario = $_POST['id_horario'];
    $id_cancha = $_POST['id_cancha'];
    
    $query = "INSERT INTO t_reservacion (fecha_reservacion, precio_reservacion, estado_reservacion, id_horario, id_cliente, id_cancha) VALUES ('$fecha_reservacion', '$precio_reservacion', '$estado_reservacion', '$id_horario', '$id_cliente', '$id_cancha')";
    $resultado = mysqli_query($conexion, $query);

    echo '<script>alert("Reservacion realizada con exito")</script>';
    header('location: tiket.php');
}catch(Exception $e){
    echo '<script>alert("Error al realizar la reservacion")</script>';
    echo $e->getMessage();
}
