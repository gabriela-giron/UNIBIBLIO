<?php
    include("funciones/conexion_bd.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="responsive.css"/>
    <title>Menu Principal</title>
</head>
<body>
    <div class="menu-toggle">
        <div class="contenido">
            <h1 class="titulo-2">Unibiblio.</h1>
            <nav class="options">
                <ul class="list">
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><a href="index.php">menu principal</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><a href="#">inventario</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg><a href="index_usuario.php">usuarios</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg><a href="index_libros.php">libros</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="id01" class="w3-modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-hor-8 w3-display-topright">&times;</span>
		<div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:600px">

			<form method="POST" action="reporte_solvencia.php" class="form">
				<div class="search">
					<h5>Generar Solvencia</h5>
					<p class="info">Ingrese codigo de usuario</p>
					<input type="text" id="codigo" name="codigo" placeholder="id usuario">
                    <button type="submit" class="principal" name="btn-solvencia">generar solvencia</button>
				</div>
			</form>

		</div>
	</div>
    <div class="dashboard-1">
        <div class="content-usr">
            <h1 class="titulo">Control de Usuario</h1>
            <nav class="options">
                <ul class="list">
                    <li class="btn">
                        <button onclick="document.getElementById('id02').style.display='block'" class="user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </li>
                    <div id="id02" class="w3-modal">
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-hor-8 w3-display-topright">&times;</span>
                        <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:600px">

                            <form method="POST" class="form">
                                <div class="search">
                                    <h5>Buscar Usuario</h5>
                                    <p class="info">Ingrese codigo de usuario</p>
                                    <input type="text" id="codigo" name="codigo" placeholder="id usuario">
                                    <button type="submit" class="principal" name="btn-busqueda">buscar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <button onclick="document.getElementById('id03').style.display='block'" class="user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    </button>

                    <div id="id03" class="w3-modal">
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-hor-8 w3-display-topright">&times;</span>
                        <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:600px">

                            <ul>
                                <li><a href="reporte_deuda.php">Reporte de Usuarios con deuda</a></li>
                                <li><a href="reporte_usuarios.php">Reporte de Usuarios agregados</a></li>
                            </ul>

                        </div>
                    </div>
                    
                </ul>
            </nav>
            <ul class="list">
                <li class="btn"><a href="Insercion_usuarios.php">agregar usuario</a></li>
                <li class="btn"><a href="modificacion_usuarios.php">modificar usuario</a></li>
                <li class="btn">
                    <button onclick="document.getElementById('id01').style.display='block'" class="user">
                        <a href="#">solvencia</a>
				    </button>
                </li>
            </ul>
        </div>
        <div class="section_tabla">
            <div class="fondo_tabla">
                <div class="tabla">
                    <?php
                       
                        if (isset($_POST['btn-busqueda'])){

                            $codigo = $_POST['codigo'];

                            if($codigo > 0){
                                $consulta = "SELECT u.ID_USUARIO, u.NOMBRE, u.APELLIDO, u.DPI, u.TELEFONO, u.CORREO, u.DOMICILIO, u.LIBROS_PRESTADOS, u.DEUDA, e.DESCRIPCION, g.DESCRIPCION as GDESCRIPCION
                                                FROM usuario u 
                                                JOIN estatus e ON u.ID_ESTATUS = e.ID_ESTATUS 
                                                JOIN grupo g ON u.ID_GRUPO = g.ID_GRUPO
                                                WHERE ID_USUARIO = " . $codigo . ";";

                                $resultado = $conn->query($consulta);
                    
                            // Verificar si la consulta devuelve resultados
                                if (mysqli_num_rows($resultado) > 0) {
                                    echo "<table border='1' align='center'>
                                            <tr>
                                                <th>ID Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>DPI</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Domicilio</th>
                                                <th>Libros Prestados</th>
                                                <th>Deuda</th>
                                                <th>Estatus</th>
                                                <th>Grupo</th>
                                            </tr>";
                                    while ($busqueda = mysqli_fetch_array($resultado)) {
                                        echo '<tr>';
                                                    echo '<td>'.$busqueda[0].'</td>';
                                                    echo '<td>'.$busqueda[1].'</td>';
                                                    echo '<td>'.$busqueda[2].'</td>';
                                                    echo '<td>'.$busqueda[3].'</td>';
                                                    echo '<td>'.$busqueda[4].'</td>';
                                                    echo '<td>'.$busqueda[5].'</td>';
                                                    echo '<td>'.$busqueda[6].'</td>';
                                                    echo '<td>'.$busqueda[7].'</td>';
                                                    echo '<td>'.$busqueda[8].'</td>';
                                                    echo '<td>'.$busqueda[9].'</td>';
                                                    echo '<td>'.$busqueda[10].'</td>';
                                                    echo'</tr>';
                                    }
                                }

                            }else{
                                $consulta = "SELECT u.ID_USUARIO, u.NOMBRE, u.APELLIDO, u.DPI, u.TELEFONO, u.CORREO, u.DOMICILIO, u.LIBROS_PRESTADOS, u.DEUDA, e.DESCRIPCION, g.DESCRIPCION as GDESCRIPCION
                                                FROM usuario u 
                                                JOIN estatus e ON u.ID_ESTATUS = e.ID_ESTATUS 
                                                JOIN grupo g ON u.ID_GRUPO = g.ID_GRUPO";
                                    $resultado = mysqli_query($conn, $consulta);
                                    echo "<table border='1' align='center'>
                                            <tr>
                                                <th>ID Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>DPI</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Domicilio</th>
                                                <th>Libros Prestados</th>
                                                <th>Deuda</th>
                                                <th>Estatus</th>
                                                <th>Grupo</th>
                                            </tr>";
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo "<tr>";
                                        echo "<td>" . $fila['ID_USUARIO'] . "</td>";
                                        echo "<td>" . $fila['NOMBRE'] . "</td>";
                                        echo "<td>" . $fila['APELLIDO'] . "</td>";
                                        echo "<td>" . $fila['DPI'] . "</td>";
                                        echo "<td>" . $fila['TELEFONO'] . "</td>";
                                        echo "<td>" . $fila['CORREO'] . "</td>";
                                        echo "<td>" . $fila['DOMICILIO'] . "</td>";
                                        echo "<td>" . $fila['LIBROS_PRESTADOS'] . "</td>";
                                        echo "<td>" . $fila['DEUDA'] . "</td>";
                                        echo "<td>" . $fila['DESCRIPCION'] . "</td>";
                                        echo "<td>" . $fila['GDESCRIPCION'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                            }
                        }else{
                            $consulta = "SELECT u.ID_USUARIO, u.NOMBRE, u.APELLIDO, u.DPI, u.TELEFONO, u.CORREO, u.DOMICILIO, u.LIBROS_PRESTADOS, u.DEUDA, e.DESCRIPCION, g.DESCRIPCION as GDESCRIPCION
                                                FROM usuario u 
                                                JOIN estatus e ON u.ID_ESTATUS = e.ID_ESTATUS 
                                                JOIN grupo g ON u.ID_GRUPO = g.ID_GRUPO";
                                    $resultado = mysqli_query($conn, $consulta);
                                    echo "<table border='1' align='center'>
                                            <tr>
                                                <th>ID Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>DPI</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Domicilio</th>
                                                <th>Libros Prestados</th>
                                                <th>Deuda</th>
                                                <th>Estatus</th>
                                                <th>Grupo</th>
                                            </tr>";
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo "<tr>";
                                        echo "<td>" . $fila['ID_USUARIO'] . "</td>";
                                        echo "<td>" . $fila['NOMBRE'] . "</td>";
                                        echo "<td>" . $fila['APELLIDO'] . "</td>";
                                        echo "<td>" . $fila['DPI'] . "</td>";
                                        echo "<td>" . $fila['TELEFONO'] . "</td>";
                                        echo "<td>" . $fila['CORREO'] . "</td>";
                                        echo "<td>" . $fila['DOMICILIO'] . "</td>";
                                        echo "<td>" . $fila['LIBROS_PRESTADOS'] . "</td>";
                                        echo "<td>" . $fila['DEUDA'] . "</td>";
                                        echo "<td>" . $fila['DESCRIPCION'] . "</td>";
                                        echo "<td>" . $fila['GDESCRIPCION'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                        }
                    ?>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>
