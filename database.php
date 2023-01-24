<?php
use FFI\Exception;

$servername = "escom.database.windows.net";
$username = "escom";
$password = "Empanada123?";
$database = "escom";
$port= "1433";

// Create connection
$conexion = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
} else {
    /*echo "Connected successfully";*/
}
?>
