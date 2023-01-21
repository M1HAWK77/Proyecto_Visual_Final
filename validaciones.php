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
        // $_SESSION['user'] = $obtainData['nom1_usu'];
        $_SESSION['user'] = $obtainData['nom1_usu'].' '.$obtainData['nom2_usu'].' '.$obtainData['ape1_usu'].' '.$obtainData['ape2_usu'];
        $_SESSION['rol'] = $obtainData['tipo_usu'];
        $_SESSION['cedula'] = $obtainData['ced_usu'];
        }
    echo $result;
}
//Fin validar usuario login.php

//Inicio Editar usuario
if(isset($_POST['opcion']) && $_POST['opcion']==1){
    $con = conectar();
    $query = "UPDATE usuarios SET nom1_usu=?, nom2_usu=?, ape1_usu=?, ape2_usu=?, mail_usu=?, dir_usu=?, img_usu=? WHERE  ced_usu = ?";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['nom1'],$_POST['nom2'],$_POST['ape1'],$_POST['ape2'], $_POST['cor'],$_POST['dir'], $_POST['img'] ,$_POST['usuario_id']));
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

//Inicio de agregar Usuario
if(isset($_POST['opcion']) && $_POST['opcion']==3){
    $con = conectar();
    //cambio tipo_usu='estudiante' por ? y agreggo post 
    $query = "INSERT INTO usuarios SET ced_usu=?, nom1_usu=?, nom2_usu=?, ape1_usu=?, ape2_usu=?, mail_usu=?,pw_usu=? ,dir_usu=? ,tipo_usu=?, img_usu=?";
    $sentencia = $con->prepare($query);
    // $sentencia->execute(array($_POST['ced'],$_POST['nom1'],$_POST['nom2'],$_POST['ape1'],$_POST['ape2'], $_POST['cor'],$_POST['pw'],$_POST['dir']));
    $sentencia->execute(array($_POST['ced'],$_POST['nom1'],$_POST['nom2'],$_POST['ape1'],$_POST['ape2'], $_POST['cor'],$_POST['pw'],$_POST['dir'], $_POST['tipoUsuario'], $_POST['img']));    
    echo ("<script>Usuario Creado</script>");
}
//Fin de agregar Usuario


//Inicio agregar Curso
if (isset($_POST['opcion']) && $_POST['opcion'] == 4) {

    $con = conectar();
    $query = "INSERT INTO cursos SET id_cur=?, nom_cur=?, desc_cur=?";
    $sentence = $con->prepare($query);
    $sentence-> execute(array($_POST['idCurso'], $_POST['nomCurso'], $_POST['desCurso']));
    echo ("<script>Curso Creado</script>");
}
//Fin agregar Curso


//Inicio de borrar Curso
if(isset($_POST['opcion']) && $_POST['opcion']==5){
    $con = conectar();
    $query = "DELETE FROM cursos  WHERE id_cur=? ";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['idC']));
    echo ("<script>Curso Borrado</script>");
}
//Fin de borrar Curso

//Inicio editar Curso
if (isset($_POST['opcion']) && $_POST['opcion'] == 6) {

    $con = conectar();
    $query = "UPDATE cursos SET nom_cur=?, desc_cur=? WHERE id_cur=?";
    $sentence = $con->prepare($query);
    $sentence-> execute(array($_POST['nomCurso'], $_POST['desCurso'], $_POST['idCurso']));
}
//Fin editar Curso

//Inicio agregar Asignatura op=7

if (isset($_POST['opcion']) && $_POST['opcion'] == 7 ){

    $con = conectar();
    // $query = "INSERT INTO asignaturas SET id_asig=?, nom_asig=?, id_cur_per=?";
    $query = "INSERT INTO asignaturas SET id_asig=?, nom_asig=?, docente_asi=?, id_cur_per=?";
    $sentence = $con->prepare($query);
   // $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));
    $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['docAsi'] ,$_POST['curPer']));
    //echo ($_POST['idAsig']. $_POST['nomA']. $_POST['curPer']);

}

//Fin agregar Asignatura

//Inicio Editar Asignatura op=8

if (isset($_POST['opcion']) && $_POST['opcion'] == 8 ){

    $con = conectar();
    //$query = "UPDATE asignaturas SET id_asig=?, nom_asig=?, where id_cur_per=?";
    $query = "UPDATE asignaturas SET nom_asig=?, docente_asi=? WHERE id_asig=?";
    $sentence = $con->prepare($query);
    //$sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));
    $sentence->execute(array($_POST['nomA'],  $_POST['docAsi'] ,$_POST['idAsig']));

}

//Fin editar Asignatura

//inicio borrar Asignatura 9
if (isset($_POST['opcion']) && $_POST['opcion'] == 9 ){

    $con = conectar();
    $query = "DELETE FROM asignaturas WHERE id_asig=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_POST['idAsig']));

}
//Fin borrar Asignatura


//inicio Matricularse
if (isset($_POST['opcion']) && $_POST['opcion'] == "matricular" ){
    $con = conectar();
    //consulta para ver si el ESTUDIANTE esta matriculado en dicha materia
    $verificar = "SELECT ced_usu_det FROM detalle_asignaturas WHERE id_asi_per=? AND ced_usu_det=?";
    $resultadoVerificar= $con->prepare($verificar);
    $resultadoVerificar->execute(array($_POST['idM'],$_SESSION['cedula']));
    $resultadoVerificar->fetch();
    echo ($resultadoVerificar['ced_usu_det']);

    if($resultadoVerificar == $_SESSION['cedula']){
        echo ("<script> alert(El usuario se encuentra registrado en esta materia);</select>");
    }else {
        $query = "INSERT INTO detalle_asignaturas SET ced_usu_det=?, id_asi_per=?";
        $sentence = $con->prepare($query);
        $sentence->execute(array($_SESSION['cedula'], $_POST['idM']));
    }

}
//Fin borrar Asignatura



//salir
if(isset($_POST['opcion']) && $_POST['opcion']=="salir"){
    $_SESSION['nombre'] = "";
    $_SESSION['rol'] = "";
    $_SESSION['cedula'] = "";
    session_destroy();
    echo ("Usuario deslogueado");
}