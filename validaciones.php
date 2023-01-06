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

//Inicio validar usuario login.php
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
//Fin validar usuario login.php

//Inicio Editar usuario
if(isset($_POST['opcion']) && $_POST['opcion']==1){
    $con = conectar();
    $query = "UPDATE usuarios SET nom1_usu=?, nom2_usu=?, ape1_usu=?, ape2_usu=? WHERE  ced_usu = ?";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['nom1'],$_POST['nom2'],$_POST['ape1'],$_POST['ape2'], $_POST['usuario_id']));
    echo ("Usuario editado");
}
//Fin editar usuario

//Inicio de borrar Usuario
if(isset($_POST['opcion']) && $_POST['opcion']==2){
    $con = conectar();
    $query = "DELETE FROM usuarios  WHERE ced_usu = ?";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['usuario_id']));
    echo ("Usuario Borrado");
}
//Fin de borrar Usuario