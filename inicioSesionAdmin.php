<?php
session_start();

if(!empty($_SESSION['user'])){
    header('Location:vistaGeneral.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv=refresh content=2>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/footer2.css">
    <title>Inicio sesion administración</title>
</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid cont-inicio-sesion">
        <div class="row " style="height: 100%;">
            <div class="col-lg-1 col-1">
                <img src="./src/circuloCortado.png" alt="circulo" class="img">
            </div>
            <div class="col-lg-6 col-md-6 col-10 offset-lg-3 offset-md-2">
                <div style="display: table; height: 100%;">
                    <div class="formulario">
                        <img src="./src/imgUser.png" alt="circulo" required="true" style="width: 100%;">
                        <div id="error"></div>
                        <br><br>
                        <form>
                            <input id="user" class="credenciales" type="text" name="user" placeholder="Usuario" required="true">
                            <br><br>
                            <input id="password" class="credenciales" type="password" name="password" placeholder="Contraseña" required="true">
                            <br><br>
                            <input id = "enviar" type="button" value="Enviar" class="form-control bot" required="true" >
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <br>
    </div>

    <footer>
        <div class="color">
            <p class="texto">© Team Chulada 2021</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/inicioSesionAdmin.js"></script>
<style>
    .cont-inicio-sesion {
        height: 97vh;
        width: 99vw;
        padding: 0;
        margin: 0;
    }
    
    .img {
        width: 100%;
        height: 100%;
    }
    
    .credenciales {
        width: 100%;
        background-color: #E6E6E6;
        border-radius: 50px;
        padding: 5px 0px 5px 20px;
        font-size: 110%;
        border-width: 0px;
    }
    
    .formulario {
        /*margin-top:50%;*/
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        /*background-color: red;*/
    }
    
    .bot {
        width: 50%;
        display: inline-block;
        vertical-align: top;
        background-color: #5C7AEA;
        color: #fff;
        font-weight: 700;
    }
</style>

</html>