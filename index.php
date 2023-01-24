<?php
session_start();

if(!empty($_SESSION['boleta'])){
    header('Location: encuesta.php');
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
    
    <title>Inicio sesion</title>
</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid cont-inicio-sesion" style="padding: 0;">

        <div class="row ">
            <div class="col-2 col-lg-1">
                <img src="./src/circuloCortado.png" alt="circulo" class="img">
            </div>
            <div class="col-2 col-lg-1"></div>
            <div class="col-lg-4 col-10 " style="display: inline-table;">
                <p class="titulo">Encuesta de satisfaccion escolar</p>
            </div>
            <div class="col-lg-5 col-xs-12 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="formulario">
                                <img src="./src/imgUser.png" alt="circulo" width="400px" required="true">
                                <div id="error"></div> 
                                <br><br>
                                <form >
                                    <input id = "boleta" class="credenciales" type="text" placeholder="Boleta" required="true">
                                    <br><br>
                                    <input id = "CURP" class="credenciales" type="text" placeholder="CURP" required="true">
                                    <br><br>
                                    <input id = "enviar" type="button" value="Enviar" class="form-control bot" required="true" >
                                </form>
                            </div>

                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 "></div>
        </div>
        <br>
    </div>


    <footer>
        <div class="color">
            <p class="texto">© Team Chulada 2021</p>
        </div>
    </footer>




<!--
    <footer class="foocool">

        <div class="foocool">
            <div class="container">
                <p class="piedepagina">© Team Chulada 2021</p>
            </div>
        </div>
    </footer> ---->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src = "./js/jquery-3.6.0.min.js"></script>
<script src = "./js/inicioSesion.js"></script>
<style>
    html,
    body {
        height: 50vh;
    }
    
    .cont-inicio-sesion {
        height: 90vh;
    }
    
    .img {
        width: 100%;
        height: 98vh;
    }
    
    .bordes {
        border-style: solid;
        border-width: 1px;
    }
    
    .credenciales {
        width: 100%;
        background-color: #E6E6E6;
        border-radius: 50px;
        padding: 5px 0px 5px 20px;
        font-size: 110%;
        border-width: 0px;
    }
    
    .titulo {
        /*margin: 25% auto;*/
        font-size: 500%;
        text-transform: uppercase;
        text-align: left;
        font: bold;
        font-family: Arial;
        display: table-cell;
        vertical-align: middle;
        font-weight: 700;
        color: #444444;
    }
    
    .formulario {
        margin-top: 50%;
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