<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
//$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$nombre_cliente = isset($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : '';
$apellido_cliente = isset($_POST['apellido_cliente']) ? $_POST['apellido_cliente'] : '';
$celular_cliente = isset($_POST['celular_cliente']) ? $_POST['celular_cliente'] : '';

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO t_cliente VALUES (NULL, :nombre_cliente, :apellido_cliente, :celular_cliente)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_cliente', $nombre_cliente);
            $consulta->bindParam(':apellido_cliente', $apellido_cliente);
            $consulta->bindParam(':celular_cliente', $celular_cliente);
            $consulta->execute();
            break;
        case 'editar':
            $sql = "UPDATE t_cliente SET nombre_cliente=:nombre_cliente, apellido_cliente=:apellido_cliente, celular_cliente=:celular_cliente WHERE id_cliente=:id_cliente";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_cliente', $id);
            $consulta->bindParam(':nombre_cliente', $nombre_cliente);
            $consulta->bindParam(':apellido_cliente', $apellido_cliente);
            $consulta->bindParam(':celular_cliente', $celular_cliente);
            $consulta->execute();
            header('location: clientes.php');
            break;
        case 'borrar':
            $sql = "DELETE FROM t_cliente WHERE id_cliente=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'seleccionar':
            $sql = "SELECT * FROM t_cliente WHERE id_cliente=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $cliente = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_cliente = $cliente['nombre_cliente'];
            $apellido_cliente = $cliente['apellido_cliente'];
            $celular_cliente = $cliente['celular_cliente'];
            break;
    }
}

$consulta = $conexionBD->prepare("SELECT count(id_cliente) FROM t_cliente");
$consulta->execute();
$cantidad_clientes = $consulta->fetchColumn();
$consulta = $conexionBD->prepare("SELECT count(id_cancha) FROM t_cancha");
$consulta->execute();
$cantidad_canchas = $consulta->fetchColumn();
$consulta = $conexionBD->prepare("SELECT count(id_ciudad) FROM t_ciudad");
$consulta->execute();
$cantidad_ciudades = $consulta->fetchColumn();

$consulta = $conexionBD->prepare("SELECT sum(precio_reservacion) FROM t_reservacion WHERE estado_reservacion=1");
$consulta->execute();
$precio_reservas = $consulta->fetchColumn();

$consulta = $conexionBD->prepare("select ci.nombre_ciudad,count(re.id_reservacion) as 'cantidad' from t_reservacion as re inner join
t_cancha as ca on ca.id_cancha=re.id_cancha inner join
t_ciudad as ci on ci.id_ciudad=ca.id_ciudad
where re.estado_reservacion=1
group by ci.nombre_ciudad");
$consulta->execute();
$ciudad_x_reservacion = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta = $conexionBD->prepare("select re.fecha_reservacion, sum(re.precio_reservacion) as 'precio' from t_reservacion as re
where now()>=re.fecha_reservacion and re.estado_reservacion=1
group by re.fecha_reservacion
desc limit 4");
$consulta->execute();
$ingreso_fechas = $consulta->fetchAll(PDO::FETCH_ASSOC);
