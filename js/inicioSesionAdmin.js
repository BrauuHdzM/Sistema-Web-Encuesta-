$(document).ready(function() {
    $('#enviar').click(function() {
        var username = $("#user").val();
        var password = $("#password").val();

        if (username.length && password.length) {
            $.ajax({
                type: "POST",
                url: "inicioSesionAdminEnviar.php",
                data: { username: username, password: password },
                success: function(data) {
                    if (data) {
                        console.log(data);
                        alert("Bienvenido " + data);
                        window.location.href = "vistaGeneral.php";
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