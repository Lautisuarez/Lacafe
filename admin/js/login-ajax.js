$(document).ready(function() {
    $('#login-admin').on('submit', function(e) {
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
                        'Login correcto',
                        'Bienvenido!',
                        'success'
                    )
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 2000);
                } else {
                    Swal.fire(
                        'Error',
                        'Usuario/Password incorrecto',
                        'error'
                    )
                }
            }
        })
    });
});