<html>
    <head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
	<meta http-equiv="refresh" content="5;url=http://localhost/UNIBIBLIO/insercion_prestamo.php">

<body>

<?php

include("conexion_bd.php"); 

// comprobamos que se haya enviado el formulario
if (isset($_POST['btn-ingresar'])) {
    // obtenemos los valores del formulario
    $id_prestamo = $_POST['id_prestamo'];
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $id_tipo_prestamo = $_POST['id_tipo_prestamo'];
    $fecha_sol = $_POST['fecha_sol'];
    $fecha_dev = $_POST['fecha_dev'];
    $cantidad = $_POST['cantidad'];


    // validar datos ingresados
    if (empty($id_prestamo) || empty($id_usuario) || empty($codigo) || empty($id_tipo_prestamo) || empty($fecha_sol) || empty($fecha_dev))  {
        echo "<script>
                alert('Debe ingresar todos los datos para registrar el préstamo');
                window.location.href='../insercion_prestamo.php';
              </script>";
        exit;
    }
    
    // Obtener el valor del campo Id_estatus en la tabla Usuario para el id_usuario ingresado
	$estatus_usuario = "SELECT ID_ESTATUS FROM usuario WHERE ID_USUARIO = ".$id_usuario."";
    	$resultado = mysqli_query($conn, $estatus_usuario);
	$fila = mysqli_fetch_array($resultado);
	$estatus_usuario = $fila['ID_ESTATUS'];

	//obtener valor de ID grupo
	$grupo_usuario = "SELECT Id_grupo FROM USUARIO WHERE ID_USUARIO = ".$id_usuario."";
		$resultado = mysqli_query($conn, $grupo_usuario);
	$fila = mysqli_fetch_array($resultado);
	$grupo_usuario = $fila['Id_grupo'];
	
	//obtener valor de Cantidad de libros
	$cantidad_libros = "SELECT Libros_prestados FROM USUARIO WHERE ID_USUARIO = ".$id_usuario."";
		$resultado = mysqli_query($conn, $cantidad_libros);
	$fila = mysqli_fetch_array($resultado);
	$cantidad_libros = $fila['Libros_prestados'];

	//obtener cantidad total
	$cantidad_total = "SELECT SUM(cantidad) AS total_cantidad FROM detalle_prestamo WHERE ID_Prestamo = " . $id_prestamo;
	
	$resultado = mysqli_query($conn, $cantidad_total);
	$fila = mysqli_fetch_array($resultado);
	$cantidad_total = $fila['total_cantidad'];
	
	if ($cantidad_total == 0) { $cantidad_total = $cantidad; }	

    // verificar si el préstamo ya existe en la base de datos
    $busqueda = "SELECT * FROM PRESTAMO WHERE ID_PRESTAMO=".$id_prestamo."";
    $exec = mysqli_query($conn, $busqueda);
    $contenido = mysqli_fetch_array($exec);
    if ($contenido) {
        echo "<script>
                alert('El préstamo ya ha sido registrado');
                window.location.href='../insercion_prestamo.php';
              </script>";
        exit;
    }

	// Verificar que el valor obtenido sea igual a 1
	
	if ($estatus_usuario == 1) {
  	
  	// Agregar los datos a la tabla Préstamo
	// preparamos la consulta SQL para insertar los valores en la base de datos
	  	
  	switch ($grupo_usuario){
	
	case 1:
	if (($cantidad_libros + $cantidad_total) < 4){
	$query1 = "INSERT INTO prestamo (id_prestamo, id_usuario, id_tipo_prestamo, fecha_sol, fecha_dev, cantidad_total) 
    
              VALUES ('$id_prestamo', '$id_usuario', '$id_tipo_prestamo', '$fecha_sol', '$fecha_dev', '$cantidad_total')";

  	  // ejecutamos las consultas
  	  $exec1 = mysqli_query($conn, $query1);
	
	}else{
	echo "<script>
                alert('Error, el usuario ya ha topado su cantidad maxima de libros a prestar');
                window.location.href='../insercion_prestamo.php';
              </script>";
	}
	break;
	
	case 2:
	$query1 = "INSERT INTO prestamo (id_prestamo, id_usuario, id_tipo_prestamo, fecha_sol, fecha_dev, cantidad_total) 
    
              VALUES ('$id_prestamo', '$id_usuario', '$id_tipo_prestamo', '$fecha_sol', '$fecha_dev', '$cantidad_total')";

 	   // ejecutamos las consultas
   	 $exec1 = mysqli_query($conn, $query1);
	break;
	
	case 3:
	if (($cantidad_libros + $cantidad_total) < 4){
	$query1 = "INSERT INTO prestamo (id_prestamo, id_usuario, id_tipo_prestamo, fecha_sol, fecha_dev, cantidad_total) 
    
              VALUES ('$id_prestamo', '$id_usuario', '$id_tipo_prestamo', '$fecha_sol', '$fecha_dev', '$cantidad_total')";

  	  // ejecutamos las consultas
   	 $exec1 = mysqli_query($conn, $query1);
	
	}else{
	echo "<script>
                alert('Error, el usuario ya ha topado su cantidad maxima de libros a prestar');
                window.location.href='../insercion_prestamo.php';
              </script>";
	}
	break;
	
	
	}
  	
	} else {
  	
  	// Mostrar una alerta indicando que el usuario está insolvente o inactivo
  	
  	echo "<script>
                alert('el usuario está insolvente o inactivo');
                window.location.href='../insercion_prestamo.php';
              </script>";
        
	
	}
    
    
    
    // verificamos si la inserción fue exitosa
    if ($exec1) {
        // mostramos un mensaje de éxito y redirigimos al usuario de vuelta al formulario
        echo "<script>
                alert('El préstamo se ha registrado correctamente');
                window.location.href='../insercion_prestamo.php';
              </script>";
    } else {
        // mostramos un mensaje de error y redirigimos al usuario de vuelta al formulario
        echo "<script>
                alert('Ha ocurrido un error al registrar el préstamo');
                window.location.href='../insercion_prestamo.php';
              </script>";
    }
}

if (isset($_POST['btn-agregarlibro'])) {
    // obtenemos los valores del formulario
    $id_prestamo = $_POST['id_prestamo'];
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $id_tipo_prestamo = $_POST['id_tipo_prestamo'];
    $fecha_sol = $_POST['fecha_sol'];
    $fecha_dev = $_POST['fecha_dev'];
    $cantidad = $_POST['cantidad'];

    // validar datos ingresados
    if (empty($id_prestamo) || empty($id_usuario) || empty($codigo) || empty($id_tipo_prestamo) || empty($fecha_sol) || empty($fecha_dev) || empty($cantidad)) {
        echo "<script>
                alert('Debe ingresar todos los datos para registrar el préstamo');
                window.location.href='../insercion_prestamo.php';
              </script>";
        exit;

    }

 	// Obtener el valor del campo Id_estatus en la tabla Usuario para el id_usuario ingresado
	$estatus_usuario = "SELECT ID_ESTATUS FROM usuario WHERE ID_USUARIO = ".$id_usuario."";
    	$resultado = mysqli_query($conn, $estatus_usuario);
	$fila = mysqli_fetch_array($resultado);
	$estatus_usuario = $fila['ID_ESTATUS'];

	//obtener valor de ID grupo
	$grupo_usuario = "SELECT Id_grupo FROM USUARIO WHERE ID_USUARIO = ".$id_usuario."";
		$resultado = mysqli_query($conn, $grupo_usuario);
	$fila = mysqli_fetch_array($resultado);
	$grupo_usuario = $fila['Id_grupo'];
	
	//obtener valor de Cantidad de libros
	$cantidad_libros = "SELECT Libros_prestados FROM USUARIO WHERE ID_USUARIO = ".$id_usuario."";
		$resultado = mysqli_query($conn, $cantidad_libros);
	$fila = mysqli_fetch_array($resultado);
	$cantidad_libros = $fila['Libros_prestados'];
	
	// Verificar que el valor obtenido sea igual a 1
	
	if ($estatus_usuario == 1) {
  	
  	// Agregar los datos a la tabla Préstamo
	// preparamos la consulta SQL para insertar los valores en la base de datos
	  	
  	switch ($grupo_usuario){
	
	case 1:
	if ($cantidad_libros < 3){
	 // preparamos la consulta SQL para insertar los valores en la base de datos
   	 $query2 = "INSERT INTO detalle_prestamo (id_prestamo, id_libro, cantidad) 
              VALUES ('$id_prestamo', '$codigo', '$cantidad')";

   	 // ejecutamos las consultas
   	 $exec2 = mysqli_query($conn, $query2);

	
	}else{
	echo "<script>
                alert('Error, el usuario ya ha topado su cantidad maxima de libros a prestar');
                window.location.href='../insercion_prestamo.php';
              </script>";
	}
	break;
	
	case 2:
	 // preparamos la consulta SQL para insertar los valores en la base de datos
   	 $query2 = "INSERT INTO detalle_prestamo (id_prestamo, id_libro, cantidad) 
              VALUES ('$id_prestamo', '$codigo', '$cantidad')";

   	 // ejecutamos las consultas
   	 $exec2 = mysqli_query($conn, $query2);

	break;
	
	case 3:
	if ($cantidad_libros < 3){
	 // preparamos la consulta SQL para insertar los valores en la base de datos
   	 $query2 = "INSERT INTO detalle_prestamo (id_prestamo, id_libro, cantidad) 
              VALUES ('$id_prestamo', '$codigo', '$cantidad')";

   	 // ejecutamos las consultas
   	 $exec2 = mysqli_query($conn, $query2);

	
	}else{
	echo "<script>
                alert('Error, el usuario ya ha topado su cantidad maxima de libros a prestar');
                window.location.href='../insercion_prestamo.php';
              </script>";
	}
	break;
	
	
	}
  	
	} else {
  	
  	// Mostrar una alerta indicando que el usuario está insolvente o inactivo
  	
  	echo "<script>
                alert('el usuario está insolvente o inactivo');
                window.location.href='../insercion_prestamo.php';
              </script>";
        
	
	}
   
    // verificamos si la inserción fue exitosa
    if ($exec2) {
        // mostramos un mensaje de éxito y redirigimos al usuario de vuelta al formulario
        echo "<script>
                alert('El libro se ha registrado correctamente');
                window.location.href='../insercion_prestamo.php';
              </script>";
    } else {
        // mostramos un mensaje de error y redirigimos al usuario de vuelta al formulario
        echo "<script>
                alert('Ha ocurrido un error al registrar el libro');
                window.location.href='../insercion_prestamo.php';
              </script>";
    }
}

// cerramos la conexión a la base de datos
mysqli_close($conn);
?>

</body>

    </head>
</html>