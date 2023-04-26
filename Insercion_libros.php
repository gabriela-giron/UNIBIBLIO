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
    <title>Insertar Libros</title>
</head>
<body>
    <section class="return">
         <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></a>
    </section>
    <div class="insertar">
        <div class="titulo">
            <h1>Insertar Libros</h1>
        </div>
        <div class="formulario">
            <form action="funciones/insertar_libros.php" method="post">
                <section class="blocks">
                    <td>identificador </td>
                    <td colspan="2" align="center">
                         <input type="text" name="codigo" placeholder="Id del libro" required />
                    </td>
                    <td>Titulo</td>
                    <td colspan="2" align="center">
                        <input type="text" name="titulo" placeholder="Titulo del libro" required />
                    </td>
                </section>
                <section class="blocks">
                        <td>Tematica </td>
                        <td colspan="2" align="center">
                            <input type="text" name="tematica" placeholder="Tematica del libro" required />
                        </td>
                        <td>Autor </td>
                        <td colspan="2" align="center">
                            <input type="text" name="autor" placeholder="Autor del libro" required />
                        </td>
                </section>
                <section class="blocks">
                        <td>Cantidad </td>
                        <td align="center">
                            <input type="number" name="cantidad" placeholder="Cantidad" min="1" max="250" value="1" required />
                        </td>
                        <td align="center" colspan="2">
                            <select name="cmbcat">
                                <option value="0">--Sin Grupo--</option>
                                <?php
                                    $buscar="SELECT * FROM GRUPO_LIB";
                                    $ejecutar=mysqli_query($conn,$buscar);
                                    while ($leer=mysqli_fetch_array($ejecutar)) {
                                        echo '<option value="'.$leer[0].'">'.$leer[1].'</option>';
                                    } 
                                 ?>
                            </select>
                        </td>
                    </tr>
                </section>
                </tr>
                <section class="blocks"> 
                    <tr>
                    <td align="center" colspan="2">
                      <button class="principal" name="btn-ingresar">agregar libro</button>
                    </td>
                    <td align="center" colspan="2">
                      <button class="principal" name="btn-reporte"><a class="title" href="reporte_libro.php">reporte</a></button>
                    </td>
                    </tr>
                </section>
            </form>
            <div class="section_tabla">
                <div class="fondo_tabla">
                    <div class="tabla">
                        <table align="center" border="1">
                            <tr>
                                <td>Identificador</td>
                                <td>Titulo</td>
                                <td>Tematica</td>
                                <td>Autor</td>
                                <td>Grupo</td>
                                <td>Cantidad</td>
                            </tr>

                            <?php
                            $valores="SELECT * FROM BD_UNIBIBLIO.LISTA_LIBROS";
                            $ejecutar=mysqli_query($conn,$valores);
                            while ($busqueda=mysqli_fetch_array($ejecutar)){
                                echo '<tr>';
                                echo '<td>'.$busqueda[0].'</td>';
                                echo '<td>'.$busqueda[1].'</td>';
                                echo '<td>'.$busqueda[2].'</td>';
                                echo '<td>'.$busqueda[3].'</td>';
                                echo '<td>'.$busqueda[4].'</td>';
                                echo '<td>'.$busqueda[5].'</td>';
                                echo'</tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>
