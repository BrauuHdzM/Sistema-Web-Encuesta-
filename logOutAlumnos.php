<?php
session_start();
if(!empty($_SESSION['boleta'])){
    $_SESSION['boleta']='';
    session_destroy();
}
header("Location:index.php");
?>