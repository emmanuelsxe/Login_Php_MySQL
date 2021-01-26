<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT ID, Email, Contrasena FROM USUARIOS WHERE ID = :id');
        $records->bind_param(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results)  > 0) {
            $user = $results;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido!</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php require 'partials/header.php'  ?>;

    <?php 
    if (!empty ($user)):
    ?>

    <br>
    <p>Bienvenido, estas en tu sesión</p>
    <a href="logOut.php">Cierra Sesión</a>
    
    
    <?php
        else:
    ?>

    <h1>Inicio de Sesión</h1>
    <a href="login.php">Inicia Sesión</a> 
    <br>
    ó
    <br>
    <a href="singUp.php">Registrate</a> 

    <?php
        endif;
    ?>
    
</body>
</html>