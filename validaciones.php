<?php
include_once("conectarBD.php");

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
    // $obtainData = $sentence->fetchAll();
    $result = $sentence->rowCount();

    // $role = $obtainData['tipo_usu'];
    // echo $result, $role;
    echo $result;
}