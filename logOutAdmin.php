<?php
session_start();
if(!empty($_SESSION['user'])){
    $_SESSION['user']='';
    session_destroy();
}
header("Location:inicioSesionAdmin.php");
?>