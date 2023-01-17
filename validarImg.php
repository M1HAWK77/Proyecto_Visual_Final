<?php 

//------------Update para guardar imagen-----------------

if (isset($_FILES['imgUser'])) {
    $archivo = $_FILES["imgUser"]["name"];
    $carpeta = "img/usuImg/";
    if (move_uploaded_file($_FILES["imgUser"]["tmp_name"], $carpeta . $archivo)) {
        echo "Archivo subido con exito";
    }else{
        echo "Fallo en cargar archivo";
    }
}
//------------Update para guardar imagen fin-------------

if (isset($_POST['opcion']) && $_POST['opcion'] == "upImg" ){

    $con = conectar();
    $query = "UPDATE asignaturas SET id_asig=?, nom_asig=?, where id_cur_per=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_POST['idAsig'], $_POST['nomA'], $_POST['curPer']));

}