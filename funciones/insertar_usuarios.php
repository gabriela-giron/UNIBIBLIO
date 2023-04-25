<?php

include("conexion_bd.php"); 

if (isset($_POST['btn-ingresar'])){
    $id=$_POST['id_usuario'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dpi=$_POST['dpi'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $domicilio=$_POST['domicilio'];
    $libros_prestados=$_POST['libros_prestados'];
    $deuda=$_POST['deuda'];
    $estatus=$_POST['id_estatus'];
    $grupo=$_POST['id_grupo'];

    // Verificar si el usuario ya existe en la base de datos
    $busqueda="SELECT * FROM USUARIO WHERE ID_USUARIO=".$id."";
    $exec=mysqli_query($conn,$busqueda);
    $contenido=mysqli_fetch_array($exec);

    if (is_array($contenido)) {
        echo "<script>alert('Error Ya existe el codigo');</script>";
    } else {
        if($grupo==0){
            echo "<script>alert('No se selecciono grupo');</script>";   
        }else{
            $consulta="INSERT INTO USUARIO VALUES(".$id.",'".$nombre."','".$apellido."',".$dpi.",".$telefono.",'".$correo."','".$domicilio."',".$libros_prestados.",".$deuda.",".$estatus.",".$grupo.")";
            //$consulta2="SELECT * FROM BD_UNIBIBLIO.LIBROS";
        }
        $exec=mysqli_query($conn,$consulta);
        if (!$exec) {
            echo "<script>alert('Error al ingresar al usuario');</script>";
        }else{
            /*$consulta2 = "SELECT * FROM BD_UNIBIBLIO.LISTA_USUARIOS";
            $exec2=mysqli_query($conn,$consulta2);*/
            echo "<script>alert('Usuario ingresado con exito');</script>";
        }
    }
}

?>