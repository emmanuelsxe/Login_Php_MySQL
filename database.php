<?php

#Credenciales para la conexión a la Base de Datos en Php My Admin
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login_php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');


    if (!$conn) {
        die("Conexión fallida, intente más tarde o contacte a Soporte Tecnico" . mysqli_connect_error());
    }
?>