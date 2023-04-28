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
    <title>Insertar Prestamo</title>

</head>
<body>
    <section class="return">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </section>
    <div class="insertar">
        <div class="titulo">
            <h1 align="center">Insertar Prestamo</h1>
        </div>
        <div class="formulario">
   		<form action="funciones/insertar_prestamo.php" method="post">
		
 
		<section class="blocks">
  		 <td>identificador </td>
                    <td colspan="2" align="center">
                        <input type="text" name="id_prestamo" placeholder="ID de prestamo" required />
                    </td>
		   </section>
  		
		
    
                
                <section class="blocks">
                    <td>ID de Usuario</td>
                    <td colspan="2" align="center">
                        <input type="text" name="id_usuario" placeholder="ID de usuario" required />
                    </td>
                    <td>Nombres</td>
                    <td colspan="2" align="center">
                        <input type="text" name="nombre" placeholder="Nombre" required readonly />
                    </td>
                </section>
                
                 <section class="blocks">
                    <td>ID de Libro</td>
                    <td colspan="2" align="center">
                         <input type="text" name="codigo" placeholder="ID del libro" required />
                    </td>
                    <td>Titulo</td>
                    <td colspan="2" align="center">
                        <input type="text" name="titulo" placeholder="Titulo del libro" required readonly />
                    </td>
                </section>
                
                <section class="blocks">
                    <td>Tipo prestamo </td>
                    <td colspan="2" align="center">
                        <td>
                        <select name="id_tipo_prestamo">
                            <option value="1">Normal</option>
                            <option value="2">Nocturno</option>
                            <option value="3">Fin de Semana</option>
                            <option value="4">Permanente</option>
                            <option value="5">Sala</option>
                            <option value="6">Por dias</option>
                        </select>
                    </td>
                    
                </section>
                <section class="blocks">
                    <td>Fechas</td>
                    <td class="labels">Fecha prestamo: </td>
                        <input type="date" name="fecha_sol" required />
                    </td>
                     <td class="labels">Fecha devolucion: </td>
                        <input type="date" name="fecha_dev" required />
                    </td>
                </section>
		   <section class="blocks">
                    <td>cantidad </td>
                    <td colspan="2" align="center">
                        <input type="number" name="cantidad" placeholder="Cantidad de libros" required />
                    </td>    
                </section>
                
                   
                <section class="blocks">
                    <td colspan="2" align="center">
                        <button class="principal" name="btn-ingresar">Ingresar</button>
                    </td>	
			<td colspan="2" align="center">
                        <button class="principal" name="btn-agregarlibro">Agregar Libro</button>
                    	</td>
                    <td align="center" colspan="2">
                      <button class="principal" name="btn-reporte"><a class="title" href="reporte_prestamos.php">reporte</a></button>
                    </td>
                </section>
            </form>
        </div>
    </div>
</body>
</html>