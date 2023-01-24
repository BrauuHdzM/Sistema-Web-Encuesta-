<?php
session_start();
require 'database.php';

if(empty($_SESSION['user'])){
    header('Location: inicioSesionAdmin.php');
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
    <link rel="stylesheet" type="text/css" href="./css/tablaMaterias.css">
    <title>Vista General</title>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="logo">Encuestas ESCOM</h1>

            <nav>
            <ul>
                    <li><a href="vistaGeneral.php">Vista General</a></li>
                    <li><a href="listaMaterias.php">Materias</a></li>
                    <li><a href="logOutAdmin.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container ref">
        <br><br>
        <input id="buscador" class="credenciales" type="text" placeholder="Buscar materia">

        <table class="table table-striped table-hover espacio-tabla">
            <thead>
                <tr>
                    <th style="width: 75%;">Materia</th>
                    <th>Promedio</th>
                </tr>
            </thead>
            <tbody id="materias">
                <?php
                    
                    $sql = "select m.idMateria, m.nomMateria, avg((q1 + q2 + q3 + q4 + q5)/5) as promedio
                        from materiaGrupo mg 
                        inner join materias m on m.idMateria = mg.idMateria
                        inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
                        inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno 
                        group by nomMateria;";
                    $res = mysqli_query($conexion, $sql);        
                    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                        echo "<tr class='clickable-row' data-href='vistaMateria.php?idMateria=".$fila['idMateria']."'>";
                        echo "<th scope=\"row\">".$fila['nomMateria']."</th>";
                        echo "<td>".$fila['promedio']."</td>";
                        echo "</tr>";
                    }
                    mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
    <footer class="page-footer">
        <div class="foocool">
            <div class="container">
                <p class="piedepagina">© Team Chulada 2021</p>
            </div>
        </div>
    </footer>
</body>
<script src = "./js/jquery-3.6.0.min.js"></script>
<script src = "./js/buscarMateria.js"></script>



</html>