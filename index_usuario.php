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
    <link rel="stylesheet" href="responsive.css"/>
    <title>Menu Principal</title>
</head>
<body>
    <div class="menu-toggle">
        <div class="contenido">
            <h1 class="titulo">Unibiblio.</h1>
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
    <div class="dashboard-1">
        <div class="content-usr">
            <h1 class="titulo">Control de Usuario</h1>
            <nav class="options">
                <ul class="list">
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></li>
                </ul>
            </nav>
            <ul class="list">
                <li class="btn"><a href="Insercion_usuarios.php">agregar usuario</a></li>
                <li class="btn"><a href="#">editar usuario</a></li>
                <li class="btn"><a href="#">solvencia</a></li>
            </ul>
        </div>
        <div class="section_tabla">
            <div class="fondo_tabla">
                <div class="tabla">
                    <?php
                        // Mostrar tabla actualizada
                        $consulta = "SELECT * FROM USUARIO";
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
                            //echo "<td>" . $fila['ID_ESTATUS'] . "</td>";
                            //echo "<td>" . $fila['ID_GRUPO'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    ?>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>