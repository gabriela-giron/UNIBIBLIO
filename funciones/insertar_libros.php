
<html>
    <head>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    </head>
</html>

<?php 
    include("conexion_bd.php"); 
    
    if (isset($_POST['btn-ingresar'])){
        $id=$_POST['codigo'];
        $titulo=$_POST['titulo'];
        $tematica=$_POST['tematica'];
        $autor=$_POST['autor'];
        $cantidad=$_POST['cantidad'];
        $grupo=$_POST['cmbcat'];
        $fecha=$_POST['fechaingreso'];
  
        $busqueda="SELECT * FROM LIBROS WHERE ID_LIBRO=".$id."";
        $exec=mysqli_query($conn,$busqueda);
        $contenido=mysqli_fetch_array($exec);

        if (is_array($contenido)) {
            echo '<script>alert("Error Ya existe el codigo");
            window.location.href="../Insercion_libros.php;</script>';
            
        }else{
            if($grupo==0){
                echo '<script>alert("No se selecciono grupo");
                window.location.href="../Insercion_libros.php";</script>';   
            }else{
                $consulta="INSERT INTO LIBROS VALUES(".$id.",'".$titulo."','".$tematica."','".$autor."',".$cantidad.",".$grupo.",'".$fecha."')";
                //$consulta2="SELECT * FROM BD_UNIBIBLIO.LIBROS";
            }
            $exec=mysqli_query($conn,$consulta);
            if (!$exec) {
                echo '<script>alert("Error al ingresar el libro");
                        window.location.href="../Insercion_libros.php";</script>';
            }else{
                $consulta2 = "SELECT * FROM BD_UNIBIBLIO.LISTA_LIBROS";
                $exec2=mysqli_query($conn,$consulta2);
                //echo '<script>Swal.fire("registro agregado correctamente");</script>';
                /*echo "<script>
                        Swal.fire({
                            title: 'Mensaje',
                            text: 'Este es un mensaje de SweetAlert2',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        </script>";*/
                echo '<script>alert("Libro ingresado con exito");
                    window.location.href="../Insercion_libros.php";
                    </>';
            }

        }

     }
?>