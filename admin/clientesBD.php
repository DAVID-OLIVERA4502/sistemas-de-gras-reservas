<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id_cliente'])?$_POST['id_cliente']:'';
//$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$nombre_cliente=isset($_POST['nombre_cliente'])?$_POST['nombre_cliente']:'';
$apellido_cliente=isset($_POST['apellido_cliente'])?$_POST['apellido_cliente']:'';
$celular_cliente=isset($_POST['celular_cliente'])?$_POST['celular_cliente']:'';

$accion=isset($_POST['accion'])?$_POST['accion']:'';
if($accion!=''){
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO t_cliente VALUES (NULL, :nombre_cliente, :apellido_cliente, :celular_cliente)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_cliente',$nombre_cliente);
            $consulta->bindParam(':apellido_cliente',$apellido_cliente);
            $consulta->bindParam(':celular_cliente',$celular_cliente);
            $consulta->execute();
        break;
        case 'editar':
            $sql="UPDATE t_cliente SET nombre_cliente=:nombre_cliente, apellido_cliente=:apellido_cliente, celular_cliente=:celular_cliente WHERE id_cliente=:id_cliente";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_cliente',$id);
            $consulta->bindParam(':nombre_cliente',$nombre_cliente);
            $consulta->bindParam(':apellido_cliente',$apellido_cliente);
            $consulta->bindParam(':celular_cliente',$celular_cliente);
            $consulta->execute();
            header('location: clientes.php');
        break;
        case 'borrar':
            try {
                $sql="DELETE FROM t_cliente WHERE id_cliente=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            } catch (Exception $e) {
                echo "<script>alert('No se puede eliminar, primero borre toda las recervaciones asociadas a este cliente');</script>";
            }
            
        break;
        case 'seleccionar':
            $sql="SELECT * FROM t_cliente WHERE id_cliente=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $cliente=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_cliente=$cliente['nombre_cliente'];
            $apellido_cliente=$cliente['apellido_cliente'];
            $celular_cliente=$cliente['celular_cliente'];
        break;
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM t_cliente");
$consulta->execute();
$listaClientes=$consulta->fetchAll();