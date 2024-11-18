<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'sitio web con php');

include_once '../Configuraciones/bd.php'; 
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id'])?$_POST['id']:'';
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$accion=isset($_POST['accion']) ? $_POST['accion']:'';

print_r($_POST);

if ($accion !=''){

switch ($accion){

case 'agregar':
    $sql="INSERT INTO cursos (id, nombre_curso) VALUES (NULL, :nombre_curso)";
    $consulta=$conexionBD -> prepare ($sql);
    $consulta->bindParam (':nombre_curso', $nombre_curso);
    $consulta-> execute();  

    echo $sql;
    
    break;

case 'editar':
    $sql="UPDATE cursos SET nombre_curso=:nombre_curso WHERE id=:id";
    $consulta=$conexionBD -> prepare ($sql);
    $consulta -> bindParam (':id', $id);
    $consulta -> bindParam (':nombre_curso', $nombre_curso);
    $consulta -> execute ();

    echo $sql;
    break;

    case 'borrar':
        $sql="DELETE FROM cursos WHERE id=:id";
        $consulta=$conexionBD -> prepare ($sql);
        $consulta -> bindParam (':id', $id);
        $consulta -> execute ();

        echo $sql;
        break;

    case 'seleccionar':
        $sql="SELECT * FROM cursos WHERE id=:id";
        $consulta=$conexionBD -> prepare ($sql);
        $consulta -> bindParam (':id', $id);
        $consulta -> execute ();
        $cursos=$consulta -> fetch (PDO::FETCH_ASSOC);
        $nombre_curso=$cursos ['nombre_curso'];
        //echo $nombre_curso;

    break; 

}


}

$consulta=$conexionBD -> prepare ("SELECT * FROM cursos");
$consulta ->execute ();
$listaCursos = $consulta-> fetchAll();

print_r($listaCursos);

?>
