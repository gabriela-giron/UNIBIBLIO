<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <meta http-equiv="refresh" content="2;url=http://localhost/UNIBIBLIO/modificacion_libros.php">
</head>
<body>
    <?php
    include("conexion_bd.php");

    if (isset($_POST['btn-modificar'])) {
        $id = $_POST['id_libro'];
        $titulo = $_POST['titulo'];
        $tematica = $_POST['tematica'];
        $autor = $_POST['autor'];
        $id_grupo = $_POST['id_grupo'];
        $stock = $_POST['stock'];

        // Verificar si el libro existe en la base de datos
        $busqueda = "SELECT * FROM LIBROS WHERE ID_LIBRO=" . $id;
        $exec = mysqli_query($conn, $busqueda);
        $contenido = mysqli_fetch_array($exec);

        if (is_array($contenido)) {
            // Realizar la modificación del libro
            $modificar = "UPDATE LIBROS SET TITULO='" . $titulo . "', TEMATICA='" . $tematica . "', AUTOR='" . $autor . "', ID_GRUPO=" . $id_grupo . ", STOCK=" . $stock . " WHERE ID_LIBRO=" . $id;
            $exec_modificar = mysqli_query($conn, $modificar);

            if (!$exec_modificar) {
                echo '<script>swal.fire("Error", "Error al modificar el libro", "error").then(() => {
                    window.location.href = "../index_libros.php";
                });</script>';
            } else {
                echo '<script>swal.fire("Éxito", "Libro modificado con éxito", "success").then(() => {
                    window.location.href = "../index_libros.php";
                });</script>';
            }
        } else {
            echo '<script>swal.fire("Error", "El libro no existe", "error").then(() => {
                window.location.href = "../index_libros.php";
            });</script>';
        }
    }
    ?>
</body>
</html>
