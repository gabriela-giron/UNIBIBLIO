<?php

$database = "BD_UNIBIBLIO";
$username = "root";
$password = "";
$host = "localhost";

try {
        $conexion = new mysqli($host, $username, $password, $database);

        if ($conexion->connect_error) {
            die("Error al conectarse a la base de datos: " . $conexion->connect_error);
        }

        if (isset($_POST['codigo2'])){

            $codigo = $_POST['codigo2'];
             // Ejecutar la consulta SQL
            $sql = "SELECT * FROM USUARIO WHERE ID_USUARIO = " . $codigo . ";";
            $resultado = $conexion->query($sql);

        // Verificar si la consulta devuelve resultados
            if (mysqli_num_rows($resultado) > 0) {
                while ($busqueda = mysqli_fetch_array($resultado)) {
                    echo '<tr>';
                                echo '<td>'.$busqueda[0].'</td>';
                                echo '<td>'.$busqueda[1].'</td>';
                                echo '<td>'.$busqueda[2].'</td>';
                                echo '<td>'.$busqueda[3].'</td>';
                                echo '<td>'.$busqueda[4].'</td>';
                                echo '<td>'.$busqueda[5].'</td>';
                                echo '<td>'.$busqueda[6].'</td>';
                                echo'</tr>';
                    }
            }else{
                echo '<script>swal.fire("Error", "Usuario no existe", "error").then(() => {
                    window.location.href = "index_usuario.php";
                  });</script>';
            }
                
        }else{
            echo '<script>swal.fire("Error", "Favor ingresar codigo", "error").then(() => {
                window.location.href = "index_usuario.php";
              });</script>';
        }
       
        $conexion->close();
    }
    
    catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
