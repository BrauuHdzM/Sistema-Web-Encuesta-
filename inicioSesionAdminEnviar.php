<?php 
session_start();

require 'database.php';


if(isset($_POST['username']) && isset($_POST['password'])){

    $username=$_POST['username']; 
    $password=$_POST['password']; 

    $res=mysqli_query($conexion,"SELECT * FROM administradores WHERE usuario='$username' and contrasena='$password'");
    $datos=mysqli_fetch_array($res,MYSQLI_ASSOC);

    if(mysqli_num_rows($res)==1){
        $_SESSION['user']=$datos['usuario'];
        echo $datos['usuario'];
    }

}
?>