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
    <title>Modificar Usuarios</title>
</head>
<body>
    <section class="return">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </section>
    <div class="insertar">
        <div class="titulo">
            <h1 align="center">Modificar Usuarios</h1>
        </div>
        <div class="formulario">
            <form action="funciones/modificar_usuario.php" method="post">
                <section class="blocks">
                    <td>identificador </td>
                    <td colspan="2" align="center">
                        <input type="text" name="id_usuario" placeholder="ID de usuario a modificar" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Nombres</td>
                    <td colspan="2" align="center">
                        <input type="text" name="nombre" placeholder="Nombre" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Apellido(s) </td>
                    <td colspan="2" align="center">
                        <input type="text" name="apellido" placeholder="Apellido" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>DPI</td>
                    <td colspan="2" align="center">
                        <input type="text" name="dpi" placeholder="DPI" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Telefono</td>
                    <td colspan="2" align="center">
                        <input type="text" name="telefono" placeholder="Telefono" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Correo</td>
                    <td colspan="2" align="center">
                        <input type="email" name="correo" placeholder="Correo" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Libros prestados</td>
                    <td colspan="2" align="center">
                        <input type="number" name="libros_prestados" placeholder="Libros prestados" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Deuda</td>
                    <td colspan="2" align="center">
                        <input type="number" name="deuda" placeholder="Deuda" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Estatus</td>
                    <td colspan="2" align="center">
                        <select name="id_estatus">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </td>
                </section>
                <section class="blocks">
                    <td>Grupo</td>
                    <td colspan="2" align="center">
                        <select name="id_grupo">
                            <option value="1">Estudiante</option>
                            <option value="2">Profesor</option>
                            <option value="3">Investigador</option>
                        </select>
                    </td>
                </section>
                <section class="blocks">
                    <td>Domicilio</td>
                    <td colspan="2" align="center">
                        <input type="text" name="domicilio" placeholder="Domicilio" required />
                    </td>
                </section>
                <section class="blocks">
                    <td colspan="2" align="center">
                        <button class="principal" name="btn-modificar">Modificar</button>
                    </td>
                    <td align="center" colspan="2">
                      <button class="principal" name="btn-reporte"><a class="title" href="reporte_usuarios.php">reporte</a></button>
                    </td>
                </section>
            </form>
            <div class="section_tabla">
                <div class="fondo_tabla">
                    <div class="tabla">
                    
	  <?php
    		// Mostrar tabla actualizada con valores correspondientes de Estatus y Grupo
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
?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
   
</body>
</html>


