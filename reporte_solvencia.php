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

        if (isset($_POST['btn-solvencia'])){

            $codigo = $_POST['codigo'];

            if ($codigo > 0){
                $sql = "SELECT * FROM USUARIO WHERE ID_USUARIO = " . $codigo . ";";
                $resultado = $conexion->query($sql);

            // Verificar si la consulta devuelve resultados
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_array($resultado)) {

                        if ($fila[9] == 1 && $fila[8] > 0){
                            //$id_user = $fila["ID_USUARIO"];
                            $id_user = $codigo;
                            insolvente_reporte($id_user,$conexion,$dompdf);
                        }elseif($fila[9] == 1 && $fila["DEUDA"] == 0){
                                //$id_user = $fila["ID_USUARIO"];
                                $id_user = $codigo;
                                solvente_reporte($id_user,$conexion,$dompdf);
                        }elseif($fila[9] == 2) {
                            echo '<script>swal.fire("Error", "Usuario esta inactivo", "error").then(() => {
                                window.location.href = "index_usuario.php";
                            });</script>';
                            
                        }else{
                            echo 'algo no funciono';
                        }
                            
                    }
                }

            }else{
                echo 'algo no esta funcionando con el boton';
            }
             // Ejecutar la consulta SQL
            
        }else{
            echo 'no agarro';
        }
       
        $conexion->close();
    }
    
    catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}

function solvente_reporte($id_user,$conexion,$dompdf){
    $dia = date('d/m/Y H:i:s');
    $html = $dia;

    try{

        $sql = "SELECT * FROM USUARIO WHERE ID_USUARIO = " . $id_user . ";";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {

            $html .= '<html><body>';
            $html .= '<h1>Solvencia</h1>';

            while ($busqueda = mysqli_fetch_array($resultado)) {
                $html .= '<p>Por este medio, UNIBIBLIO establece que la persona ';
                $html .= $busqueda[1].' ';
                $html .= $busqueda[2].' ';
                $html .= 'con numero de documento ';
                $html .= $busqueda[3].' ';
                $html .= 'no posee deuda con la biblioteca. </p>';
            }

            $html .= '</body></html>';

            $dompdf->loadHtml($html);

            // Configurar el tamaño de papel y orientación
            $dompdf->setPaper('A4', 'portrait');

            // Renderizar el PDF
            $dompdf->render();

            // Enviar el PDF generado al navegador para su descarga
            $dompdf->stream("solvencia.pdf", array("Attachment" => false));

    }

    }catch(Exception $e){
        echo 'Error al generar el PDF: ', $e->getMessage();
    }
    /*else{
        echo $id_user;
    }*/


}

function insolvente_reporte($id_user,$conexion,$dompdf){
    $dia = date('d/m/Y H:i:s');
    $html = $dia;
    if($id_user == ''){
        echo 'no hay codigo de usuario';
    }else{
        $sql = "SELECT * FROM USUARIO WHERE ID_USUARIO = " . $id_user . ";";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {

            $html .= '<html><body>';
            $html .= '<h1>Solvencia</h1>';


            while ($busqueda = mysqli_fetch_array($resultado)) {
                $html .= '<p>Por este medio, UNIBIBLIO establece que la persona ';
                $html .= $busqueda[1].' ';
                $html .= $busqueda[2].' ';
                $html .= 'con numero de documento ';
                $html .= $busqueda[3].' ';
                $html .= 'posee una deuda con la biblioteca de Q';
                $html .= $busqueda[8].' ';
                $html .='por lo que se encuenta <b>INSOLVENTE.</p>';
            }

            $html .= '</body></html>';

            $dompdf->loadHtml($html);

            // Configurar el tamaño de papel y orientación
            $dompdf->setPaper('A4', 'portrait');

            // Renderizar el PDF
            $dompdf->render();

            // Enviar el PDF generado al navegador para su descarga
            $dompdf->stream("solvencia.pdf", array("Attachment" => false));
        }
    }

}


?>
