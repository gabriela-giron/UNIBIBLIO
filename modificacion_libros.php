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
    <link rel="stylesheet" href="responsive.css" />
    <title>Modificar Libros</title>
</head>

<body>
    <section class="return">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </section>
    <div class="insertar">
        <div class="titulo">
            <h1 align="center">Modificar Libros</h1>
        </div>
        <div class="formulario">
            <form action="funciones/modificar_libros.php" method="post">
                <section class="blocks">
                    <td>Identificador </td>
                    <td colspan="2" align="center">
                        <input type="text" name="id_libro" placeholder="ID de libro a modificar" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Título</td>
                    <td colspan="2" align="center">
                        <input type="text" name="titulo" placeholder="Título" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Temática</td>
                    <td colspan="2" align="center">
                        <select name="tematica">
                            <option value="Fantasía">Fantasía</option>
                            <option value="Historia">Historia</option>
                            <option value="Misterio">Misterio</option>
                            <option value="Tecnología">Tecnología</option>
                            <option value="Romance">Romance</option>
                        </select>
                    </td>
                </section>
                <section class="blocks">
                    <td>Autor</td>
                    <td colspan="2" align="center">
                        <input type="text" name="autor" placeholder="Autor" required />
                    </td>
                </section>
                <section class="blocks">
                    <td>Grupo</td>
                    <td colspan="2" align="center">
                        <select name="id_grupo">
                            <option value="1">Unicen</option>
                            <option value="2">Unitesis</option>
                            <option value="3">UniRev</option>
                        </select>
                    </td>
                </section>
                <section class="blocks">
                    <td>Stock</td>
                    <td colspan="2" align="center">
                        <input type="number" name="stock" placeholder="Stock" required />
                    </td>
                </section>
                <section class="blocks">
                    <td colspan="2" align="center">
                        <button class="principal" name="btn-modificar">Modificar</button>
                    </td>
                    <td align="center" colspan="2">
                        <button class="principal" name="btn-reporte"><a class="title" href="reporte_libros.php">Reporte</a></button>
                    </td>
                </section>
            </form>
            <div class="section_tabla">
                <div class="fondo_tabla">
                    <div class="tabla">

                        <?php
                        // Mostrar tabla actualizada con valores correspondientes de Temática y Grupo
                        $consulta = "SELECT l.ID_LIBRO, l.TITULO, l.TEMATICA, l.AUTOR, l.ID_GRUPO, l.STOCK, g.DESCRIPCION AS GDESCRIPCION
            FROM libros l
            JOIN grupo g ON l.ID_GRUPO = g.ID_GRUPO";

                        $resultado = mysqli_query($conn, $consulta);
                        echo "<table border='1' align='center'>
        <tr>
            <th>ID Libro</th>
            <th>Título</th>
            <th>Temática</th>
            <th>Autor</th>
            <th>ID Grupo</th>
            <th>Stock</th>
        </tr>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['ID_LIBRO'] . "</td>";
            echo "<td>" . $fila['TITULO'] . "</td>";
            echo "<td>" . $fila['TEMATICA'] . "</td>";
            echo "<td>" . $fila['AUTOR'] . "</td>";
            echo "<td>" . $fila['ID_GRUPO'] . "</td>";
            echo "<td>" . $fila['STOCK'] . "</td>";
            echo "</tr>";
            if (isset($_POST['id_libro']) && $fila['ID_LIBRO'] == $_POST['id_libro']) {
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'El libro ha sido modificado',
                    showConfirmButton: false,
                    timer: 1500
                    })</script>";
            }
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

