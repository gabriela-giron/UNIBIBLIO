<?php
require 'vendor/autoload.php';

//require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$database = "BD_UNIBIBLIO";
$username = "root";
$password = "";
$host = "localhost";

try {
        $conexion = new mysqli($host, $username, $password, $database);

        if ($conexion->connect_error) {
            die("Error al conectarse a la base de datos: " . $conexion->connect_error);
        }

            $consulta = "SELECT u.ID_USUARIO, u.NOMBRE, u.APELLIDO, u.DPI, u.TELEFONO, u.CORREO, u.DOMICILIO, u.LIBROS_PRESTADOS, u.DEUDA, e.DESCRIPCION, g.DESCRIPCION as GDESCRIPCION
            FROM usuario u 
            JOIN estatus e ON u.ID_ESTATUS = e.ID_ESTATUS 
            JOIN grupo g ON u.ID_GRUPO = g.ID_GRUPO
            WHERE DEUDA > 0";

            $resultado = $conexion->query($consulta);

            $dia = date('d/m/Y H:i:s');
            echo $dia;

            // Verificar si la consulta devuelve resultados
                if (mysqli_num_rows($resultado) > 0) {

                    $html = '<html><body>';
                    $html .= '<h1>Usuarios con deuda</h1>';

                    $html .= "<table border='1' align='center'>
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
                        $html .= "<tr>";
                        $html .= "<td>" . $fila['ID_USUARIO'] . "</td>";
                        $html .= "<td>" . $fila['NOMBRE'] . "</td>";
                        $html .= "<td>" . $fila['APELLIDO'] . "</td>";
                        $html .= "<td>" . $fila['DPI'] . "</td>";
                        $html .= "<td>" . $fila['TELEFONO'] . "</td>";
                        $html .= "<td>" . $fila['CORREO'] . "</td>";
                        $html .= "<td>" . $fila['DOMICILIO'] . "</td>";
                        $html .= "<td>" . $fila['LIBROS_PRESTADOS'] . "</td>";
                        $html .= "<td>" . $fila['DEUDA'] . "</td>";
                        $html .= "<td>" . $fila['DESCRIPCION'] . "</td>";
                        $html .= "<td>" . $fila['GDESCRIPCION'] . "</td>";
                        $html .= "</tr>";
                            
                    }

                    $html .= '</body></html>';

                    //echo $html;

                    $dompdf->loadHtml($html);

                    // Configurar el tamaño de papel y orientación
                    $dompdf->setPaper('A4', 'landscape');

                    // Renderizar el PDF
                    $dompdf->render();

                    // Enviar el PDF generado al navegador para su descarga
                    $dompdf->stream("deudores.pdf", array("Attachment" => false));

        }else{
            echo 'no agarro';
        }
       
        $conexion->close();
    }
    
    catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();

}


?>