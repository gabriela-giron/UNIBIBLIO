<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <meta http-equiv="refresh" content="2;url=http://localhost/UNIBIBLIO/modificacion_usuarios.php">
</head>
<body>
    <?php
    include("conexion_bd.php");

    if (isset($_POST['btn-modificar'])) {
        $id = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dpi = $_POST['dpi'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $domicilio = $_POST['domicilio'];
        $libros_prestados = $_POST['libros_prestados'];
        $deuda = $_POST['deuda'];
        $estatus = $_POST['id_estatus'];
        $grupo = $_POST['id_grupo'];

        // Verificar si el usuario existe en la base de datos
        $busqueda = "SELECT * FROM USUARIO WHERE ID_USUARIO=" . $id;
        $exec = mysqli_query($conn, $busqueda);
        $contenido = mysqli_fetch_array($exec);

        if (is_array($contenido)) {
            // Realizar la modificación del usuario
            $modificar = "UPDATE USUARIO SET NOMBRE='" . $nombre . "', APELLIDO='" . $apellido . "', DPI=" . $dpi . ", TELEFONO=" . $telefono . ", CORREO='" . $correo . "', DOMICILIO='" . $domicilio . "', LIBROS_PRESTADOS=" . $libros_prestados . ", DEUDA=" . $deuda . ", ID_ESTATUS=" . $estatus . ", ID_GRUPO=" . $grupo . " WHERE ID_USUARIO=" . $id;
            $exec_modificar = mysqli_query($conn, $modificar);

            if (!$exec_modificar) {
                echo '<script>swal.fire("Error", "Error al modificar el usuario", "error").then(() => {
                    window.location.href = "../modificacion_usuarios.php";
                });</script>';
            } else {
                echo '<script>swal.fire("Éxito", "Usuario modificado con éxito", "success").then(() => {
                    window.location.href = "../modificacion_usuarios.php";
                });</script>';
            }
        } else {
            echo '<script>swal.fire("Error", "El usuario no existe", "error").then(() => {
                window.location.href = "../modificacion_usuarios.php";
            });</script>';
        }
    }
    ?>
</body>
</html>
