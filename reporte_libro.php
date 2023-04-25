<?php
require 'vendor/autoload.php';

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

    // Ejecutar la consulta SQL
    $sql = "SELECT * FROM BD_UNIBIBLIO.LIBROS";
    $resultado = $conexion->query($sql);

    // Verificar si la consulta devuelve resultados
    if ($resultado->num_rows > 0) {
        // Construir la tabla HTML para mostrar los datos de la tabla de libros
        $html = '<html><body>';
        $html .= '<h1>Libros Agregados</h1>';
        $html .= '<table>';
        $html .= '<tr><th>ID</th><th>Título</th><th>Temática</th><th>Autor</th><th>Cantidad</th><th>Grupo</th><th>Fecha de Ingreso</th></tr>';

        // Recorrer los resultados de la consulta y mostrar los datos de cada registro
        while ($fila = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $fila["ID_LIBRO"] . '</td>';
            $html .= '<td>' . $fila["TITULO"] . '</td>';
            $html .= '<td>' . $fila["TEMATICA"] . '</td>';
            $html .= '<td>' . $fila["AUTOR"] . '</td>';
            $html .= '<td>' . $fila["CANTIDAD"] . '</td>';
            $html .= '<td>' . $fila["ID_GRUPO"] . '</td>';
            $html .= '<td>' . $fila["FECHA_INGRESO"] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html .= '</body></html>';

        $dompdf->loadHtml($html);

        // Configurar el tamaño de papel y orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF generado al navegador para su descarga
        $dompdf->stream("libros_agregados.pdf", array("Attachment" => false));
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>