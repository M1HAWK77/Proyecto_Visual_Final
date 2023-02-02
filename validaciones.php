<?php
include_once("conectarBD.php");

if (!isset($_SESSION)) {

    session_start();
    if (!isset($_SESSION['rol'])) {
        // header("location:index.php");
    }
} else {
    session_destroy();
    session_start();
}
//echo("existe el usuario " .$_SESSION['user']. " y se ha definido como " . $_SESSION['rol']);

//Inicio validar usuario login.php
if (isset($_POST['mail'])) {
    $con = conectar();
    $sentence = $con->prepare("SELECT * FROM usuarios WHERE mail_usu=? AND pw_usu=?");
    $sentence->execute(array($_POST['mail'], $_POST['pw']));
    $obtainData = $sentence->fetch();
    $result = $sentence->rowCount();
    if ($result >= 1) {
        // $_SESSION['user'] = $obtainData['nom1_usu'];
        $_SESSION['user'] = $obtainData['nom1_usu'] . ' ' . $obtainData['nom2_usu'] . ' ' . $obtainData['ape1_usu'] . ' ' . $obtainData['ape2_usu'];
        $_SESSION['rol'] = $obtainData['tipo_usu'];
        $_SESSION['cedula'] = $obtainData['ced_usu'];
    }
    echo $result;
}
//Fin validar usuario login.php

//Inicio Editar usuario
if (isset($_POST['opcion']) && $_POST['opcion'] == 1) {
    $con = conectar();
    $query = "UPDATE usuarios SET nom1_usu=?, nom2_usu=?, ape1_usu=?, ape2_usu=?, mail_usu=?, dir_usu=?, img_usu=? WHERE  ced_usu = ?";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['nom1'], $_POST['nom2'], $_POST['ape1'], $_POST['ape2'], $_POST['cor'], $_POST['dir'], $_POST['img'], $_POST['usuario_id']));
    echo ("Usuario editado");
}
//Fin editar usuario

//Inicio de borrar Usuario
if (isset($_POST['opcion']) && $_POST['opcion'] == 2) {
    $con = conectar();
    $query = "DELETE FROM usuarios  WHERE ced_usu = ?";
    $sentencia = $con->prepare($query);
    $sentencia->execute(array($_POST['usuario_id']));
    echo ("Usuario Borrado");
}
//Fin de borrar Usuario

//Inicio de agregar Usuario
if (isset($_POST['opcion']) && $_POST['opcion'] == 3) {
    $con = conectar();
    //cambio tipo_usu='estudiante' por ? y agreggo post 
    $query = "INSERT INTO usuarios SET ced_usu=?, nom1_usu=?, nom2_usu=?, ape1_usu=?, ape2_usu=?, mail_usu=?,pw_usu=? ,dir_usu=? ,tipo_usu=?, img_usu=?";
    $sentencia = $con->prepare($query);
    // $sentencia->execute(array($_POST['ced'],$_POST['nom1'],$_POST['nom2'],$_POST['ape1'],$_POST['ape2'], $_POST['cor'],$_POST['pw'],$_POST['dir']));
    $sentencia->execute(array($_POST['ced'], $_POST['nom1'], $_POST['nom2'], $_POST['ape1'], $_POST['ape2'], $_POST['cor'], $_POST['pw'], $_POST['dir'], $_POST['tipoUsuario'], $_POST['img']));
    echo ("<script>Usuario Creado</script>");
}
//Fin de agregar Usuario


//Inicio agregar Curso
if (isset($_POST['opcion']) && $_POST['opcion'] == 4) {

    $con = conectar();
    $query = "INSERT INTO cursos SET id_cur=?, nom_cur=?, desc_cur=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_POST['idCurso'], $_POST['nomCurso'], $_POST['desCurso']));
    echo ("<script>Curso Creado</script>");
}
//Fin agregar Curso


//Inicio de borrar Curso
if (isset($_POST['opcion']) && $_POST['opcion'] == 5) {
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
    $sentence->execute(array($_POST['nomCurso'], $_POST['desCurso'], $_POST['idCurso']));
}
//Fin editar Curso

//Inicio agregar Asignatura op=7

if (isset($_POST['opcion']) && $_POST['opcion'] == 7) {

    $con = conectar();
    // $query = "INSERT INTO asignaturas SET id_asig=?, nom_asig=?, id_cur_per=?";
    $query = "INSERT INTO asignaturas SET id_asig=?, nom_asig=?, docente_asi=?, id_cur_per=?";
    $sentence = $con->prepare($query);
    // $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));
    $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['docAsi'], $_POST['curPer']));
    //echo ($_POST['idAsig']. $_POST['nomA']. $_POST['curPer']);

}

//Fin agregar Asignatura

//Inicio Editar Asignatura op=8

if (isset($_POST['opcion']) && $_POST['opcion'] == 8) {

    $con = conectar();
    //$query = "UPDATE asignaturas SET id_asig=?, nom_asig=?, where id_cur_per=?";
    $query = "UPDATE asignaturas SET nom_asig=?, docente_asi=? WHERE id_asig=?";
    $sentence = $con->prepare($query);
    //$sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));
    $sentence->execute(array($_POST['nomA'],  $_POST['docAsi'], $_POST['idAsig']));
}

//Fin editar Asignatura

//inicio borrar Asignatura 9
if (isset($_POST['opcion']) && $_POST['opcion'] == 9) {

    $con = conectar();
    $query = "DELETE FROM asignaturas WHERE id_asig=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_POST['idAsig']));
}
//Fin borrar Asignatura


//inicio Matricularse
if (isset($_POST['opcion']) && $_POST['opcion'] == "matricular") {
    $con = conectar();
    //query para verificar si el estudiante existe en esa materia
    $verificar = "SELECT ced_usu_det FROM detalle_asignaturas WHERE id_asi_per=? AND ced_usu_det=?";
    $resultadoVerificar = $con->prepare($verificar);
    $resultadoVerificar->execute(array($_POST['idM'], $_SESSION['cedula']));
    $res = $resultadoVerificar->fetch();

    if ($res['ced_usu_det'] == $_SESSION['cedula']) {
        echo false;
    } else {
        $query = "INSERT INTO detalle_asignaturas SET ced_usu_det=?, id_asi_per=?";
        $sentence = $con->prepare($query);
        $sentence->execute(array($_SESSION['cedula'], $_POST['idM']));
        echo true;
    }
}
//Fin Matricularse

//Inicio de asignar deberes-------------------

// if (isset($_POST['opcion']) && $_POST['opcion'] == "upDeber") {

//     $con = conectar();
//     $query = "INSERT INTO actividades SET  nom_act=?, desc_act=?, instruccion_act=?, fec_entrega_act=?, estado_act='Enviado', id_asig_per=?";
//     $ejecutar= $con->prepare($query);
//     $ejecutar->execute(array($_POST['act'],$_POST['desAct'], $_POST['file'] ,$_POST['fecha'], $_POST['idAsignatura']));

// }


//cambio de funcionalidad xd
    //ya funciono

if (isset($_POST['opcion']) && $_POST['opcion'] == "upDeber") {

    $con = conectar();
    $query = "INSERT INTO actividades SET  nom_act=?, desc_act=?, instruccion_act=?, fec_entrega_act=?, estado_act='Enviado', id_asig_per=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_POST['act'], $_POST['desAct'], $_POST['file'], $_POST['fecha'], $_POST['idAsignatura']));


    //Consulta para encontrar el id de la ultima actividad ingresada
    $query2 = "SELECT id_act FROM actividades
    WHERE nom_act=? AND desc_act=? AND fec_entrega_act=? AND id_asig_per=?";
    $sentencia2 = $con->prepare($query2);
    $sentencia2->execute(array($_POST['act'], $_POST['desAct'], $_POST['fecha'], $_POST['idAsignatura']));
    $r2 = $sentencia2->fetch();

    //Consulta para encontrar todos los usuarios pertenecientes a una asignatura
    $query3 = "SELECT ced_usu FROM usuarios 
    WHERE ced_usu IN (SELECT ced_usu_det FROM detalle_asignaturas WHERE id_asi_per=?)";
    $sentencia3 = $con->prepare($query3);
    $sentencia3->execute(array($_POST['idAsignatura']));// ver si este funciona, no creo que le tengo en el ajax
    $r3 = $sentencia3->fetchAll();

    //Bucle para generar un detalle por cada usuario registrado
    foreach ($r3 as $resu) {
        $query4 = "INSERT INTO detalle_actividades SET  id_usu_act=?, id_act_per=?";
        $sentencia4 = $con->prepare($query4);
        $sentencia4->execute(array($resu['ced_usu'], $r2['id_act']));
    }
    echo ("Actividad Ingresada");

}

//Fin cambio nueva funcionalidad



//Fin de asignar deberes--------------------------------------

//Inicio de subir deberes Estudiante

if (isset($_POST['opcion']) && $_POST['opcion'] == "upDeberEstudiante") {

    // $con = conectar();
    // $query = "INSERT INTO detalle_actividades SET  id_usu_act=?, id_act_per=?, archivo_act=?";
    // $ejecutar = $con->prepare($query);
    // $ejecutar->execute(array($_SESSION['cedula'], $_POST['idAsignatura'], $_POST['file']));
    
    //nueva funcion    
    $con = conectar();
    $query = "UPDATE detalle_actividades SET archivo_act=? WHERE id_usu_act=? AND id_act_per=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_POST['file'], $_SESSION['cedula'], $_POST['idAsignatura'] ));
    //nueva funcion fin


}

//Fin de subir deberes Estudiante

//Inicio de subir calificaciones

if (isset($_POST['opcion']) && $_POST['opcion'] == "calificacion") {

    $con = conectar();
    $query = "UPDATE detalle_actividades SET calificacion=? WHERE id_det_act=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_POST['calf'], $_POST['idDeber']));
}

//Fin  de subir calificaciones

//Inicio de editar calificaciones

if (isset($_POST['opcion']) && $_POST['opcion'] == "editarcalificacion") {

    $con = conectar();
    $query = "UPDATE detalle_actividades SET calificacion=? WHERE id_det_act=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_POST['calf'], $_POST['idDeber']));
}

//Fin  de editar calificaciones

//Traer imagen

if (isset($_POST['opcion']) && $_POST['opcion'] == "foto") {

    $con = conectar();
    $query = "SELECT img_usu FROM usuarios WHERE ced_usu=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_SESSION['cedula']));
    $traer = $ejecutar->fetch();
    echo $traer['img_usu'];
}

//Traer imagen

//Aceptar imagen tomada

if (isset($_POST['opcion']) && $_POST['opcion'] == "fotoTimeReal") {

    $con = conectar();
    $query = "UPDATE  usuarios SET img_usu=? WHERE ced_usu=?";
    $ejecutar = $con->prepare($query);
    $ejecutar->execute(array($_POST['i'], $_SESSION['cedula']));
    $traer = $ejecutar->fetch();
    echo $traer['img_usu'];
}

//Aceptar imagen tomada


//salir
if (isset($_POST['opcion']) && $_POST['opcion'] == "salir") {
    $_SESSION['nombre'] = "";
    $_SESSION['rol'] = "";
    $_SESSION['cedula'] = "";
    session_destroy();
    echo ("Usuario deslogueado");
}
