<?php
include("conexion_bd.php");
$id = $_POST['id'];
if($id){
    $response = [];
    $consulta="SELECT * FROM bd_unibiblio.LISTA_PRESTAMOS WHERE ID_PRESTAMO=".$id."";
    $exec=mysqli_query($conn,$consulta);

    $contenido=mysqli_fetch_array($exec);

    if (is_array($contenido)) {
        $codusuario=$contenido[1];
        $nombre=$contenido[2];
        $codlibro=$contenido[3];
        $titulo=$contenido[4];
        $cantidad=$contenido[5];
        $tipoprestamo=$contenido[6];
        $fechasol=$contenido[7];
        $fechadev=$contenido[8];
        $status=$contenido[9];
        
        $response = [
            'codusuario' => $codusuario,
            'nombre' => $nombre,
            'codlibro' => $codlibro,
            'titulo' => $titulo,
            'cantidad' => $cantidad,
            'tipoprestamo' => $tipoprestamo,
            'fechasol' => $fechasol,
            'fechadev' => $fechadev,
            'status' => $status,
        ];
    }
    echo json_encode($response);  
}