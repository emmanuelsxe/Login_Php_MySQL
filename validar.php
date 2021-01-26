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
            header("Location:Index.php");
        } else {
            $message = 'Lo siento, tus credenciales no son correctas.';
        }
    }
?>