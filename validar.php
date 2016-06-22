<?php
session_start();

//DB configuration Constants
define('_HOST_NAME_', 'localhost');
define('_USER_NAME_', 'root');
define('_DB_PASSWORD', 'lasttip');
define('_DATABASE_NAME_', 'pizzeria');

//PDO Database Connection
try {
    $databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if(isset($_POST['submit'])){
    $errMsg = '';
    //username and password sent from Form
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);


    if($username == '')
        $errMsg .= 'You must enter your Username<br>';

    if($password == '')
        $errMsg .= 'You must enter your Password<br>';


    if($errMsg == ''){

        $records = $databaseConnection->prepare('SELECT id,usuario,password FROM  usuario WHERE usuario = :ususario');
        $records->bindParam(':username', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 && password_verify($password, $results['password'])){
            $_SESSION['usuario'] = $results['usuario'];
            header('location:listadoClientes.php');
            exit;
        }else{
            $errMsg .= 'Username and Password are not found<br>';
        }
    }
}

?>