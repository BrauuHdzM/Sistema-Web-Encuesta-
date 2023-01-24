$(document).ready(function() {

    $('#enviar').click(function() {
        var boleta = $("#boleta").val();
        var CURP = $("#CURP").val();

        if (boleta.length && CURP.length) {
            $.ajax({
                type: "POST",
                url: "inicioSesion.php",
                data: { boleta: boleta, CURP: CURP },
                success: function(data) {
                    if (data) {
                        console.log(data);
                        alert("Bienvenido " + data);
                        window.location.href = "encuesta.php";
                    } else {
                        $("#error").html("<span style='color:#cc0000'>Error:</span> Datos erroneos");
                    }


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("error");
                }
            });
        } else {
            $("#error").html("<span style='color:#cc0000'>Error:</span> Campos vacios");
        }




    });

});