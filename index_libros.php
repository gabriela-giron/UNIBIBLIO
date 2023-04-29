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
            <h1 class="titulo-2">Unibiblio.</h1>
            <nav class="options">
                <ul class="list">
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><a href="index.php">menu principal</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><a href="index_inventario.php">inventario</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg><a href="index_usuario.php">usuarios</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg><a href="index_libros.php">libros</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="dashboard-1">
        <div class="content-usr">
            <h1 class="titulo">Control de Libros</h1>
            <nav class="options">
                <ul class="list">
                    <li class="btn">
                        <button onclick="document.getElementById('id01').style.display='block'" class="user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </li>
                    <div id="id01" class="w3-modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-hor-8 w3-display-topright">&times;</span>
                        <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:600px">

                            <form method="POST" class="form">
                                <div class="search">
                                    <h5>Buscar libro</h5>
                                    <p class="info">Ingrese codigo de libro</p>
                                    <input type="text" id="codigo" name="codigo" placeholder="id libro">
                                    <button type="submit" class="principal" name="btn-busqueda">buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></li>
                </ul>
            </nav>
            <ul class="list">
                <li class="btn"><a href="Insercion_libros.php">agregar libro</a></li>
                <li class="btn"><a href="modificacion_libros.php">editar libro</a></li>
            </ul>
        </div>
        <div class="section_tabla">
                <div class="fondo_tabla">
                    <div class="tabla">
                        <?php
                       
                       if (isset($_POST['btn-busqueda'])){

                           $codigo = $_POST['codigo'];

                           if($codigo > 0){
                                $consulta = "SELECT * FROM LISTA_LIBROS WHERE ID_LIBRO = " . $codigo . ";";
                               $resultado = $conn->query($consulta);
                   
                           // Verificar si la consulta devuelve resultados
                               if (mysqli_num_rows($resultado) > 0) {
                                    echo "<table border='1' align='center'>
                                    <tr>
                                        <td>Identificador</td>
                                        <td>Titulo</td>
                                        <td>Tematica</td>
                                        <td>Autor</td>
                                        <td>Descripcion</td>
                                        <td>Cantidad</td>
                                    </tr>";
                                    while ($busqueda = mysqli_fetch_array($resultado)) {
                                        echo '<tr>';
                                        echo '<td>'.$busqueda[0].'</td>';
                                        echo '<td>'.$busqueda[1].'</td>';
                                        echo '<td>'.$busqueda[2].'</td>';
                                        echo '<td>'.$busqueda[3].'</td>';
                                        echo '<td>'.$busqueda[4].'</td>';
                                        echo '<td>'.$busqueda[5].'</td>';
                                        echo'</tr>';
                                    }
                                    echo "</table>";
                               }

                           }else{
                               $consulta = "SELECT * FROM LISTA_LIBROS;";
                                   $resultado = mysqli_query($conn, $consulta);
                                   echo "<table border='1' align='center'>
                                            <tr>
                                                <td>Identificador</td>
                                                <td>Titulo</td>
                                                <td>Tematica</td>
                                                <td>Autor</td>
                                                <td>Descripcion</td>
                                                <td>Cantidad</td>
                                            </tr>";
                                   while ($busqueda = mysqli_fetch_array($resultado)) {
                                    echo '<tr>';
                                    echo '<td>'.$busqueda[0].'</td>';
                                    echo '<td>'.$busqueda[1].'</td>';
                                    echo '<td>'.$busqueda[2].'</td>';
                                    echo '<td>'.$busqueda[3].'</td>';
                                    echo '<td>'.$busqueda[4].'</td>';
                                    echo '<td>'.$busqueda[5].'</td>';
                                    echo'</tr>';
                                   }
                                   echo "</table>";
                           }
                       }else{
                            $consulta = "SELECT * FROM LISTA_LIBROS;";
                            $resultado = mysqli_query($conn, $consulta);
                            echo "<table border='1' align='center'>
                                    <tr>
                                        <td>Identificador</td>
                                        <td>Titulo</td>
                                        <td>Tematica</td>
                                        <td>Autor</td>
                                        <td>Descripcion</td>
                                        <td>Cantidad</td>
                                    </tr>";
                            while ($busqueda = mysqli_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>'.$busqueda[0].'</td>';
                                echo '<td>'.$busqueda[1].'</td>';
                                echo '<td>'.$busqueda[2].'</td>';
                                echo '<td>'.$busqueda[3].'</td>';
                                echo '<td>'.$busqueda[4].'</td>';
                                echo '<td>'.$busqueda[5].'</td>';
                                echo'</tr>';
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
