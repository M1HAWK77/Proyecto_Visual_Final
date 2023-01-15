<?php 

if (isset($_POST['opcion']) && $_POST['opcion'] == "upImg" ){

    $con = conectar();
    $query = "UPDATE asignaturas SET id_asig=?, nom_asig=?, where id_cur_per=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));

}