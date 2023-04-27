<?php 
    include("conexion_bd.php"); 
    
    if (isset($_POST['btn-modificar'])){
        $idprestamo=$_POST['codigo'];
        $status=$_POST['status'];


        if ($status==NULL || $idprestamo==NULL) {
            echo "<script>alert('No se admiten campos vacíos');</script>";
            
        }else{
            $consulta="UPDATE BD_UNIBIBLIO.LISTA_PRESTAMOS SET ESTATUS='".$status."' WHERE ID_PRESTAMO=".$idprestamo;
            $exec=mysqli_query($conn,$consulta);
            if (!$exec) {
                echo "<script>alert('Error al modificar el prestamo');</script>";
                echo '<script>window.location.href = "http://localhost/UNIBIBLIO/modificacion_prestamo.php";</script>';
            }else{
                echo "<script>alert('Prestamo modificado con exito');</script>";
                echo '<script>window.location.href = "http://localhost/UNIBIBLIO/modificacion_prestamo.php";</script>';
            }

        }
     }
?>