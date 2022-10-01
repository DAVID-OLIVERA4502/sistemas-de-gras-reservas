<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id_ciudad']) ? $_POST['id_ciudad'] : '';
//$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$nombre_ciudad = isset($_POST['nombre_ciudad']) ? $_POST['nombre_ciudad'] : '';
$descripcion_ciudad = isset($_POST['descripcion_ciudad']) ? $_POST['descripcion_ciudad'] : '';
$imagen_ciudad = isset($_POST['imagen_ciudad']) ? $_POST['imagen_ciudad'] : '';

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO t_ciudad VALUES (NULL, :nombre_ciudad, :descripcion_ciudad, :imagen_ciudad)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_ciudad', $nombre_ciudad);
            $consulta->bindParam(':descripcion_ciudad', $descripcion_ciudad);
            $consulta->bindParam(':imagen_ciudad', $imagen_ciudad);
            $consulta->execute();
            break;
        case 'editar':
            $sql = "UPDATE t_ciudad SET nombre_ciudad=:nombre_ciudad, descripcion_ciudad=:descripcion_ciudad, imagen_ciudad=:imagen_ciudad WHERE id_ciudad=:id_ciudad";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_ciudad', $id);
            $consulta->bindParam(':nombre_ciudad', $nombre_ciudad);
            $consulta->bindParam(':descripcion_ciudad', $descripcion_ciudad);
            $consulta->bindParam(':imagen_ciudad', $imagen_ciudad);
            $consulta->execute();
            header('location: ciudades.php');
            break;
        case 'borrar':
            try {
                $sql = "DELETE FROM t_ciudad WHERE id_ciudad=:id";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id', $id);
                $consulta->execute();
            } catch (PDOException $e) {
                echo "<script>alert('No se puede eliminar, primero borre toda las canchas asociadas a esta ciudad');</script>";
            }

            break;
        case 'seleccionar':
            $sql = "SELECT * FROM t_ciudad WHERE id_ciudad=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $ciudad = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_ciudad = $ciudad['nombre_ciudad'];
            $descripcion_ciudad = $ciudad['descripcion_ciudad'];
            $imagen_ciudad = $ciudad['imagen_ciudad'];
            break;
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM t_ciudad");
$consulta->execute();
$listaCiudades = $consulta->fetchAll();
