<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'hola');
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'jhon', 'ramos');
include_once './bd/bd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id_horario'])?$_POST['id_horario']:'';
//$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$inicio_horario=isset($_POST['inicio_horario'])?$_POST['inicio_horario']:'';
$fin_horario=isset($_POST['fin_horario'])?$_POST['fin_horario']:'';

$accion=isset($_POST['accion'])?$_POST['accion']:'';
if($accion!=''){
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO t_horario VALUES (NULL, :inicio_horario, :fin_horario)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':inicio_horario',$inicio_horario);
            $consulta->bindParam(':fin_horario',$fin_horario);
            $consulta->execute();
        break;
        case 'editar':
            $sql="UPDATE t_horario SET inicio_horario=:inicio_horario, fin_horario=:fin_horario WHERE id_horario=:id_horario";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_horario',$id);
            $consulta->bindParam(':inicio_horario',$inicio_horario);
            $consulta->bindParam(':fin_horario',$fin_horario);
            $consulta->execute();
            header('location: horario.php');
        break;
        case 'borrar':
            try{
                $sql="DELETE FROM t_horario WHERE id_horario=:id";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':id',$id);
                $consulta->execute();
            }catch(Exception $e){
                echo '<script>alert("No se puede eliminar el registro porque tiene datos asociados")</script>';
            }
            
        break;
        case 'seleccionar':
            $sql="SELECT * FROM t_horario WHERE id_horario=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $ciudad=$consulta->fetch(PDO::FETCH_ASSOC);
            $inicio_horario=$ciudad['inicio_horario'];
            $fin_horario=$ciudad['fin_horario'];
        break;
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM t_horario");
$consulta->execute();
$listaHorarios = $consulta->fetchAll(PDO::FETCH_ASSOC);