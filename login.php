<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php require 'partials/header.php'  ?>

    <?php if(!empty($message)): ?>
      <p> <?php $message ?></p>
    <?php endif; ?>

    <h1>LOGIN</h1>

    <span>o <a href="singUp.php">Registrate</a></span>

    <form action="validar.php" method="POST">

        <input type="email" name="email" placeholder="Ingresa tu email">

        <input type="password" name="pass" placeholder="Ingresa tu contraseña">

        <input type="submit" value="enviar">

    </form>
</body>
</html>