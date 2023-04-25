<html>
    <head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
	<meta http-equiv="refresh" content="2;url=http://localhost/UNIBIBLIO/insercion_usuarios.php">

<body>

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
  echo '<script>swal.fire("Error", "Ya existe el código", "error").then(() => {
    window.location.href = "../Insercion_usuarios.php";
  });</script>';
} else {
  if($grupo==0){
    echo '<script>swal.fire("Error", "No se seleccionó grupo", "error").then(() => {
      window.location.href = "../Insercion_usuarios.php";
    });</script>';
  }else{
    $consulta="INSERT INTO USUARIO VALUES(".$id.",'".$nombre."','".$apellido."',".$dpi.",".$telefono.",'".$correo."','".$domicilio."',".$libros_prestados.",".$deuda.",".$estatus.",".$grupo.")";
  }
  $exec=mysqli_query($conn,$consulta);
  if(!$exec){
    echo '<script>swal.fire("Error", "Error al ingresar el usuario", "error").then(() => {
      window.location.href = "../Insercion_usuarios.php";
    });</script>';
  }else{
    echo '<script>swal.fire("Éxito", "Usuario ingresado con éxito", "success").then(() => {
      window.location.href = "../Insercion_usuarios.php";
    });</script>';
  }
}
}

?>

</body>

    </head>
</html>

