<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$database = "BD_UNIBIBLIO";
$username = "root";
$password = "";

try {
    $conexion = mysqli_connect("localhost", $username, $password, $database);
    

    // Ejecutar la consulta SQL
    $sql = "SELECT * FROM BD_UNIBIBLIO.USUARIO";
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta devuelve resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Construir la tabla HTML para mostrar los datos de la tabla de libros
        $html = '<html><body>';
        $html .= '<h1>Usuarios Agregados</h1>';
        $html .= '<table>';
        $html .= '<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>DPI</th><th>Telefono</th><th>Correo</th><th>Domicilio</th><th>Libros prestados</th><th>Deuda</th<th>Estatus</th><th>Grupo</th></tr>';
        
        // Recorrer los resultados de la consulta y mostrar los datos de cada registro
        while ($fila = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $fila["ID_USUARIO"] . '</td>';
            $html .= '<td>' . $fila["NOMBRE"] . '</td>';
            $html .= '<td>' . $fila["APELLIDO"] . '</td>';
            $html .= '<td>' . $fila["DPI"] . '</td>';
            $html .= '<td>' . $fila["TELEFONO"] . '</td>';
            $html .= '<td>' . $fila["CORREO"] . '</td>';
            $html .= '<td>' . $fila["DOMICILIO"] . '</td>';
            $html .= '<td>' . $fila["LIBROS_PRESTADOS"] . '</td>';
            $html .= '<td>' . $fila["DEUDA"] . '</td>';
            $html .= '<td>' . $fila["ID_ESTATUS"] . '</td>';
            $html .= '<td>' . $fila["ID_GRUPO"] . '</td>';
            $html .= '</tr>';
        } 
        
        $html .= '</table>';
        $html .= '</body></html>';

        $dompdf->loadHtml($html);

        // Configurar el tamaño de papel y orientación
        $dompdf->setPaper('A4', 'landscape');

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF generado al navegador para su descarga
        $dompdf->stream("usuarios_agregados.pdf", array("Attachment" => false));
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>