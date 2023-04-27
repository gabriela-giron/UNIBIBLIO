$('button[name="btn-buscar"]').click(function() {
    let id = $('input[name="codigo"]').val();
    if(id){
        $.ajax({
            type: 'POST',
            url: 'funciones/busqueda_prestamo.php',
            data: {
                "id" : id,
            },
            dataType: 'json',
            async: true,
            cache: false,
            success: function (response) {
                if(response != ""){
                    $('input[name="codusuario"]').val(response.codusuario);
                    $('input[name="nombre"]').val(response.nombre);
                    $('input[name="codlibro"]').val(response.codlibro);
                    $('input[name="titulo"]').val(response.titulo);
                    $('input[name="cantidad"]').val(response.cantidad);
                    $('input[name="tprestamo"]').val(response.tipoprestamo);
                    $('input[name="fsol"]').val(response.fechasol);
                    $('input[name="fdev"]').val(response.fechadev);
                    $('input[name="status"]').val(response.status);
                }else{
                    alert("El código ingresado no existe")
                    $('input[name="codigo"]').val('');
                    $('input[name="codusuario"]').val('');
                    $('input[name="nombre"]').val('');
                    $('input[name="codlibro"]').val('');
                    $('input[name="titulo"]').val('');
                    $('input[name="cantidad"]').val('');
                    $('input[name="tprestamo"]').val('');
                    $('input[name="fsol"]').val('');
                    $('input[name="fdev"]').val('');
                    $('input[name="status"]').val('');
                }
            }
        });
    }else{
        $('input[name="codusuario"]').val('');
        $('input[name="nombre"]').val('');
        $('input[name="codlibro"]').val('');
        $('input[name="titulo"]').val('');
        $('input[name="cantidad"]').val('');
        $('input[name="tprestamo"]').val('');
        $('input[name="fsol"]').val('');
        $('input[name="fdev"]').val('');
        $('input[name="status"]').val('');
    }
})