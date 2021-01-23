<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php require 'partials/header.php'  ?>;
    <h1>LOGIN</h1>

    <span>o <a href="singUp.php">Registrate</a></span>

    <?php
    if (!empty($message)) : ?>
        <p>
            <? $message ?>
        </p>
    <?php
    endif;
    ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <form action="login.php" method="post">

        <input type="email" name="email" placeholder="Ingresa tu email">

        <input type="password" name="pass" placeholder="Ingresa tu contraseña">

        <input type="submit" value="enviar">

    </form>
    <?php

    session_start();

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['pass'])) {

        $records = $conn->prepare('SELECT ID, Email, Contrasena FROM USUARIOS WHERE Email =:email');
        $records->bind_param(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['pass'], $results['Contrasena'])) {
            $_SESSION['user_id'] = $results['ID'];
            header('Locationn: Index.php');
        } else {
            $message = 'Lo siento, tus credenciales no son correctas.';
        }
    }


    ?>
</body>

</html>