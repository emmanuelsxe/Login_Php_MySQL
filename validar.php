
<?php

session_start();

require 'database.php';

/*$stmt = $conn->prepare('SELECT ID, Email, Contrasena * FROM USERS WHERE Email=:email');
$stmt->execute(['email' => $email]); 
$user = $stmt->fetch();  */

/*
if (!empty($_POST['email']) && !empty($_POST['pass'])) {

    $records = $conn->prepare('SELECT ID, Email, Contrasena FROM USUARIOS WHERE Email =:email');
    $records->bind_param(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
    
    if (count($results) > 0 && password_verify($_POST['pass'], $results['Contrasena'])) {
        $_SESSION['user_id'] = $results['ID'];
        header("Location:./Index.php");
            exit; 
        $message = 'Felicidades, estas en tu sesion';
    } else {
        $message = 'Lo siento, tus credenciales no son correctas.';
    } */

    // Verify data
   # $password = password_hash( $_POST['pass'], PASSWORD_BCRYPT );
    $email =  $_POST['email'];

    $SALT = 'EstoEsUnSalt';
    $password2 = hash('sha512', $SALT . $password);

    $sql = "SELECT ID, Email, Contrasena FROM USUARIOS WHERE Email='$email' AND Contrasena = '$password2' ";
    $result = $conn->query($sql);
    


    

    

    if ($result->num_rows > 0) {
        if (password_verify($password, $results['Contrasena'])) {
            header('Location: Index.php');
        }
        
        $message = 'Felicidades estas en una sesión';
    } else {
        $message = 'No son credenciales correctas';
  } 
    
#} 
?>

<?php
echo $message;
echo $sql;
?> 