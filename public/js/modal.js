$(document).ready(function() {
    $('.categoria-link').on('click', function(e) {
        e.preventDefault();


        var categoriaId = $(this).data('categoria-id');


        $.ajax({
            url: '/api/categorias/productos/' + categoriaId,
            method: 'GET',
            success: function(productos) {
                var modalBody = $('#modal-body');
                modalBody.empty();


                productos.forEach(function(producto) {
                    modalBody.append('<p>' + producto.nombre + '</p>');
                });


                $('#modal').modal('show');
            }
        });
    });
});
