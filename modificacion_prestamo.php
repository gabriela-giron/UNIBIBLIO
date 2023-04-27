<?php
include("funciones/modificar_prestamo.php"); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="responsive.css"/>
    <title>Modificar Prestamos</title>
</head>
<body>
    <section class="return">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </section>
    <div class="insertar">
        <div class="titulo">
            <h1>Modificar Prestamos</h1>
        </div>

        <?php
        $codusuario="";
        $nombre="";
        $codlibro="";
        $titulo="";
        $cantidad="";
        $tipoprestamo="";
        $fechasol="";
        $fechadev="";
        $status=""; 
        ?>
        <div class="formulario">
            <form action="funciones/modificar_prestamo.php" method="post">
                <section class="blocks">
                    <td>
                    <button type="button" class="principal" name="btn-buscar">Buscar</button>
                    </td>
                    <td>identificador </td>
                    <td align="center">
                         <input type="number" name="codigo" placeholder="Id del prestamo" min="0" required />
                    </td>
                </section>
                <section class="blocks">
                        <td>Codigo de Usuario </td>
                        <td colspan="2" align="center">
                            <input type="text" name="codusuario" placeholder="codigo" value="<?php echo $codusuario; ?>" readonly/>
                        </td>
                        <td>Nombre</td>
                        <td colspan="2" align="center">
                            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" readonly />
                        </td>
                </section>
                <section class="blocks">
                        <td>Codigo de Libro</td>
                        <td colspan="2" align="center">
                            <input type="text" name="codlibro" placeholder="identificador del libro" value="<?php echo $codlibro; ?>" readonly />
                        </td>
                        <td>Titulo</td>
                        <td colspan="2" align="center">
                            <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>" readonly />
                        </td>
                </section>
                <section class="blocks">
                        <td>Cantidad</td>
                        <td colspan="2" align="center">
                            <input type="text" name="cantidad" value="<?php echo $cantidad; ?>" readonly />
                        </td>
                        <td>Tipo Préstamo</td>
                        <td colspan="2" align="center">
                            <input type="text" name="tprestamo" placeholder="tipo de préstamo" value="<?php echo $tipoprestamo; ?>" readonly />
                        </td>
                </section>
                <section class="blocks">
                        <td>Fecha Solicitud</td>
                        <td colspan="2" align="center">
                            <input type="text" name="fsol" placeholder="dd/mm/yyyy" value="<?php echo $fechasol; ?>" readonly/>
                        </td>
                        <td>Fecha Devolución</td>
                        <td colspan="2" align="center">
                            <input type="text" name="fdev" placeholder="dd/mm/yyyy" value="<?php echo $fechadev; ?>" readonly />
                        </td>
                </section>
                <section class="blocks">
                       <td colspan="4">
                        <input type="text" name="status" placeholder="status" value="<?php echo $status; ?>"/>
                       </td>
                </section>
                </tr>
                <section class="blocks"> 
                    <tr>
                    <td align="center" colspan="4">
                      <button class="principal" name="btn-modificar">modificar prestamo</button>
                    </td>
                    </tr>
                </section>
            </form>

            <div class="section_tabla">
                <div class="fondo_tabla">
                    <div class="tabla">
                        <table align="center" border="1">
                            <tr>
                                <td>Id Prestamo</td>
                                <td>Id Usuario</td>
                                <td>Nombre</td>
                                <td>Codigo Libro</td>
                                <td>Titulo Libro</td>
                                <td>Cantidad</td>
                                <td>Tipo Préstamo</td>
                                <td>Fecha solicitud</td>
                                <td>Fecha devolución</td>
                                <td>Estatus</td>
                            </tr>

                            <?php
                            $valores="SELECT * FROM BD_UNIBIBLIO.LISTA_PRESTAMOS";
                            $ejecutar=mysqli_query($conn,$valores);
                            while ($busqueda=mysqli_fetch_array($ejecutar)){
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
                                echo'</tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> 
    <script src="js/busqueda.js"></script>
</body>
</html>