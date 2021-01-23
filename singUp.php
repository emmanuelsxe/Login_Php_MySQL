<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <?php require 'partials/header.php'  ?>;

    <h1>Registo de Usuarios</h1>
    <span>o <a href="login.php">Ingresa con tus credenciales</a></span>

    <form action="singUp.php" method="post">

        <input type="text" name="nombres" placeholder="Ingresa tu nombre(s)" required>

        <input type="text" name="apellidoPrimero" placeholder="Ingresa tu primer apellido" required>

        <input type="text" name="apellidoSegundo" placeholder="Ingresa tu segundo apellido" required>

        <input type="email" name="email" placeholder="Ingresa tu correo" required>

        <input type="password" name="pass" placeholder="Ingresa tu contraseña" required minlength="6">

        <input type="password" name="confirmarPassword" placeholder="Veritifica tu contraseña" required>

        <input type="submit" value="enviar">

    </form>

    <?php
    require 'database.php';

    if (!empty($_POST['nombres']) && !empty($_POST['apellidoPrimero']) && !empty($_POST['apellidoSegundo']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
        
        $nombre = $_POST['nombres'];
        $apellidoPrimero = $_POST['apellidoPrimero'];
        $apellidoSegundo = $_POST['apellidoSegundo'];
        $email = $_POST['email'];
        $password = password_hash( $_POST['pass'], PASSWORD_BCRYPT );

        $sql = "INSERT INTO USUARIOS (Nombre, ApellidoPrimero, ApellidoSegundo, Email, Contrasena )
        VALUES ('$nombre', '$apellidoPrimero', '$apellidoSegundo', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                echo "Usuario creado con &eacute;xito";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

    }
    mysqli_close($conn);

    ?>
</body>

</html>