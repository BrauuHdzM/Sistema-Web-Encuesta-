<?php
session_start();
if(empty($_SESSION['boleta'])){
    header('Location: index.php');
}

require 'database.php';

$boleta=$_SESSION['boleta']; 

if( isset($_POST['idMateriaAlumno'])&& isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5'])&& isset($_POST['comentario'])){
    $idMateriaAlumno=$_POST['idMateriaAlumno'];
    $q1=$_POST['q1'];
    $q2=$_POST['q2'];
    $q3=$_POST['q3'];
    $q4=$_POST['q4'];
    $q5=$_POST['q5'];
    $comentario=$_POST['comentario'];
    for ($i=0; $i < sizeof($idMateriaAlumno); $i++) {
        $sql="INSERT INTO respuestas (idMateriaAlumno, q1, q2, q3, q4, q5) VALUES(".$idMateriaAlumno[$i].",".$q1[$i].",".$q2[$i].",".$q3[$i].",".$q4[$i].",".$q5[$i].")";
        if (mysqli_query($conexion, $sql)) {
            echo "Se ingreso una respuesta";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }



    }

    $sql="INSERT INTO comentarios VALUES('".$comentario."')";
    if (mysqli_query($conexion, $sql)) {
        echo "Se agrego correctamente el comentario";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    mysqli_close($conexion);

}



?>
