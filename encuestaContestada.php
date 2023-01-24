<?php
session_start();

if(empty($_SESSION['boleta'])){
    header('Location: index.php');
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
    <link rel="stylesheet" type="text/css" href="./css/navbar_css.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/footer2.css">
    <title>Encuesta</title>
</head>

<body>
    <br>
    <br>
    <div class="container cont">
        <div class="row" style="height: 100%;">
            <div class="col-lg-8 col-12 offset-lg-2" style="display: inline-table; height: 100%;">
                <div class="centrar">
                    <p class="titulo2">
                        Ya ha constestado la encuenta
                    </p>
                    <br>
                    <form action="./logOutAlumnos.php">
                        <input type="submit" class="bot" value="Cerrar Sesion">
                    </form>
                </div>

            </div>
        </div>

    </div>

    <footer>
        <div class="color">
            <p class="texto">© Team Chulada 2021</p>
        </div>
    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<style>
    .bot {
        width: 50%;
        display: inline-block;
        vertical-align: top;
        background-color: #5C7AEA;
        color: #fff;
        font-weight: 700;
        display: table-cell;
        vertical-align: middle;
        border-radius: 10px;
    }
    
    .titulo {
        /*margin: 25% auto;*/
        font-size: 200%;
        text-transform: uppercase;
        text-align: left;
        font: bold;
        font-family: Arial;
        font-weight: 700;
        color: #444444;
    }
    
    .titulo2 {
        /*margin: 25% auto;*/
        font-size: 200%;
        text-transform: uppercase;
        text-align: left;
        font: bold;
        font-family: Arial;
        display: table-cell;
        vertical-align: middle;
        font-weight: 700;
        color: #444444;
    }
    
    .con {
        text-align: center;
    }
    
    body {
        background-image: url('./src/sol.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top right;
    }
    
    .centrar {
        display: table-cell;
        vertical-align: middle;
    }
    
    table {
        background-color: #fff;
    }
    
    .cont {
        height: 80vh;
    }
</style>

</html>