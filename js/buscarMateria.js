$(document).ready(function() {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    $("#buscador").keyup(function() {

        var parametros = "buscador=" + $(this).val()
        $.ajax({
            data: parametros,
            url: 'buscarMateria.php',
            type: 'POST',
            success: function(res) {
                $("#materias").html(res);
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            },
            error: function() {
                alert("error");
            }
        });
    })
});