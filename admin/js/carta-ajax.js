$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        // Ajax en Jquery
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    Swal.fire(
                        'Correcto!',
                        'Se ha guardado correctamente',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error!',
                        'Hubo un error...',
                        'error'
                    )
                }
            }
        })
    });

    $('.borrar_registro').on('click', function(e){
        e.preventDefault();

        var tipo = $(this).attr('data-tipo');
        var id = $(this).attr('data-id');
        Swal.fire({
            title: '¿Estas seguro?',
            text: "No vas a poder revertir este cambio!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if(result.isConfirmed){
                $.ajax({
                    type:'post',
                    data:{
                        id: id,
                        registro: 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success: function(data){
                        var resultado = JSON.parse(data);
                        console.log(resultado);
                        if(resultado.respuesta == 'exito'){
                            Swal.fire(
                                'Eliminado!',
                                'Se elimino correctamente',
                                'success'
                            )
                            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        } else {
                            Swal.fire(
                                'Error!',
                                'No se pudo eliminar...',
                                'error'
                            )
                        }
                    }
                })
            } 
        });
    });
});