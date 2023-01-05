<?php
include_once("conectarBD.php");

if(!isset($_SESSION)) 
    { 
        
        session_start(); 
        if(!isset($_SESSION['rol'])){
            // header("location:index.php");
        }
    }
    else
    {
        session_destroy();
        session_start(); 
    }
    echo("existe el usuario " .$_SESSION['user']. " y se ha definido como " . $_SESSION['rol']);

// if (isset($_POST['mail'])) {
//     $con = conectar();
//     $sentence = $con->prepare("SELECT COUNT(*)cantidad FROM usuarios WHERE mail_usu=? AND pw_usu=?");
//     $sentence->execute(array($_POST['mail'], $_POST['pw']));
//     $result = $sentence->fetch();

//     echo $result['cantidad'];
// }

if (isset($_POST['mail'])) {
    $con = conectar();
    $sentence = $con->prepare("SELECT * FROM usuarios WHERE mail_usu=? AND pw_usu=?");
    $sentence->execute(array($_POST['mail'], $_POST['pw']));
    $obtainData = $sentence->fetch();
    $result = $sentence->rowCount();
    if ($result >= 1) {
        $_SESSION['user'] = $obtainData['nom1_usu'];
        $_SESSION['rol'] = $obtainData['tipo_usu'];
        }
    echo $result;
}