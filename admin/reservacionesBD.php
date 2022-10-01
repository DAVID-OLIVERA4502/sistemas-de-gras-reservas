<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id_reservacion']) ? $_POST['id_reservacion'] : '';
//$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$fecha_reservacion = isset($_POST['fecha_reservacion']) ? $_POST['fecha_reservacion'] : '';
$precio_reservacion = isset($_POST['precio_reservacion']) ? $_POST['precio_reservacion'] : '';
$estado_reservacion = isset($_POST['estado_reservacion']) ? $_POST['estado_reservacion'] : '';
$id_horario = isset($_POST['id_horario']) ? $_POST['id_horario'] : '';
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$id_cancha = isset($_POST['id_cancha']) ? $_POST['id_cancha'] : '';

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO t_reservacion VALUES (NULL, :fecha_reservacion, :precio_reservacion, :estado_reservacion, :id_horario, :id_cliente, :id_cancha)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':fecha_reservacion', $fecha_reservacion);
            $consulta->bindParam(':precio_reservacion', $precio_reservacion);
            $consulta->bindParam(':estado_reservacion', $estado_reservacion);
            $consulta->bindParam(':id_horario', $id_horario);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->bindParam(':id_cancha', $id_cancha);
            $consulta->execute();
            break;
        case 'editar':
            $sql = "UPDATE t_reservacion SET fecha_reservacion=:fecha_reservacion, precio_reservacion=:precio_reservacion, estado_reservacion=:estado_reservacion, id_horario=:id_horario, id_cliente=:id_cliente, id_cancha=:id_cancha WHERE id_reservacion=:id_reservacion";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_reservacion', $id);
            $consulta->bindParam(':fecha_reservacion', $fecha_reservacion);
            $consulta->bindParam(':precio_reservacion', $precio_reservacion);
            $consulta->bindParam(':estado_reservacion', $estado_reservacion);
            $consulta->bindParam(':id_horario', $id_horario);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->bindParam(':id_cancha', $id_cancha);
            $consulta->execute();
            header('location: reservaciones.php');
            break;
        case 'borrar':
            try {
                $sql = "DELETE FROM t_reservacion WHERE id_reservacion=:id";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id', $id);
                $consulta->execute();
            } catch (Exception $e) {
                echo '<script>alert("No se puede eliminar el registro porque tiene datos asociados")</script>';
            }
            break;
        case 'seleccionar':
            $sql = "SELECT * FROM t_reservacion WHERE id_reservacion=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $reservacion = $consulta->fetch(PDO::FETCH_ASSOC);
            $fecha_reservacion = $reservacion['fecha_reservacion'];
            $precio_reservacion = $reservacion['precio_reservacion'];
            $estado_reservacion = $reservacion['estado_reservacion'];
            $id_horario = $reservacion['id_horario'];
            $id_cliente = $reservacion['id_cliente'];
            $id_cancha = $reservacion['id_cancha'];
            //id_ciudad
            $sql1 = "SELECT t_cancha.id_ciudad FROM t_cancha inner join t_reservacion on t_cancha.id_cancha=t_reservacion.id_cancha where t_cancha.id_cancha=:id_cancha";
            $consulta = $conexionBD->prepare($sql1);
            $consulta->bindParam(':id_cancha', $id_cancha);
            $consulta->execute();
            $cancha = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_ciudad = $cancha['id_ciudad'];
            //id_cancha
            break;
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM t_reservacion");
$consulta->execute();
$listaReservaciones = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM t_horario");
$consulta->execute();
$listaHorarios = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM t_cliente");
$consulta->execute();
$listaClientes = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM t_cancha");
$consulta->execute();
$listaCanchas = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM t_ciudad");
$consulta->execute();
$listaCiudades = $consulta->fetchAll();
