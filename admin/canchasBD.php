<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id_cancha']) ? $_POST['id_cancha'] : '';
$nombre_cancha = isset($_POST['nombre_cancha']) ? $_POST['nombre_cancha'] : '';
$imagen_cancha = isset($_POST['imagen_cancha']) ? $_POST['imagen_cancha'] : '';
$descripcion_cancha = isset($_POST['descripcion_cancha']) ? $_POST['descripcion_cancha'] : '';
$telefono_cancha = isset($_POST['telefono_cancha']) ? $_POST['telefono_cancha'] : '';
$direccion_cancha = isset($_POST['direccion_cancha']) ? $_POST['direccion_cancha'] : '';
$estado_cancha = isset($_POST['estado_cancha']) ? $_POST['estado_cancha'] : '';
$encargado_cancha = isset($_POST['encargado_cancha']) ? $_POST['encargado_cancha'] : '';
$id_ciudad = isset($_POST['id_ciudad']) ? $_POST['id_ciudad'] : '';

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO t_cancha VALUES (NULL, :nombre_cancha, :imagen_cancha, :descripcion_cancha, :telefono_cancha, :direccion_cancha, :estado_cancha, :encargado_cancha, :id_ciudad)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_cancha', $nombre_cancha);
            $consulta->bindParam(':imagen_cancha', $imagen_cancha);
            $consulta->bindParam(':descripcion_cancha', $descripcion_cancha);
            $consulta->bindParam(':telefono_cancha', $telefono_cancha);
            $consulta->bindParam(':direccion_cancha', $direccion_cancha);
            $consulta->bindParam(':estado_cancha', $estado_cancha);
            $consulta->bindParam(':encargado_cancha', $encargado_cancha);
            $consulta->bindParam(':id_ciudad', $id_ciudad);
            $consulta->execute();
            break;
        case 'editar':
            $sql = "UPDATE t_cancha SET nombre_cancha=:nombre_cancha, imagen_cancha=:imagen_cancha, descripcion_cancha=:descripcion_cancha, telefono_cancha=:telefono_cancha, direccion_cancha=:direccion_cancha, estado_cancha=:estado_cancha, encargado_cancha=:encargado_cancha, id_ciudad=:id_ciudad WHERE id_cancha=:id_cancha";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_cancha', $id);
            $consulta->bindParam(':nombre_cancha', $nombre_cancha);
            $consulta->bindParam(':imagen_cancha', $imagen_cancha);
            $consulta->bindParam(':descripcion_cancha', $descripcion_cancha);
            $consulta->bindParam(':telefono_cancha', $telefono_cancha);
            $consulta->bindParam(':direccion_cancha', $direccion_cancha);
            $consulta->bindParam(':estado_cancha', $estado_cancha);
            $consulta->bindParam(':encargado_cancha', $encargado_cancha);
            $consulta->bindParam(':id_ciudad', $id_ciudad);
            $consulta->execute();
            header('location: canchas.php');
            break;
        case 'borrar':
            try {
                $sql = "DELETE FROM t_cancha WHERE id_cancha=:id";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id', $id);
                $consulta->execute();
            } catch (Exception $e) {
                echo "<script>alert('No se puede eliminar, primero borre toda las reservaciones asociadas a ella');</script>";
            }
            break;
        case 'seleccionar':
            $sql = "SELECT * FROM t_cancha WHERE id_cancha=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $cancha = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_cancha = $cancha['nombre_cancha'];
            $imagen_cancha = $cancha['imagen_cancha'];
            $descripcion_cancha = $cancha['descripcion_cancha'];
            $telefono_cancha = $cancha['telefono_cancha'];
            $direccion_cancha = $cancha['direccion_cancha'];
            $estado_cancha = $cancha['estado_cancha'];
            $encargado_cancha = $cancha['encargado_cancha'];
            $id_ciudad = $cancha['id_ciudad'];
            break;
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM t_cancha");
$consulta->execute();
$listaCancha = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM t_ciudad");
$consulta->execute();
$listaCiudad = $consulta->fetchAll();
