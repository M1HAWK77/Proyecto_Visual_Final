<?php
include_once("conectarBD.php");
function listadoEstudiantes(){
    $con=conectar();
    $query="SELECT * FROM usuarios WHERE tipo_usu='estudiante'";
    $sentence = $con-> prepare($query);
    $sentence->execute();
    $result=$sentence->fetchAll();

    $filas = "";

    foreach ($result as $res) {
        $filas .= '
        <tbody>
          <tr>
            <td><a href="pages/examples/invoice.php">' . $res['ced_usu'] . '</a></td>
            <td>' . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . ' ' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</td>
            <td><span class="badge badge-success">' . $res['mail_usu'] . '</span></td>
            <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">' . $res['dir_usu'] . '</div>
            </td>
            <td>
                <button type="button" class="btn btn-default editar" ><i class="fas fa-pencil-alt"></i> Editar</button>

                <button type="reset" class="btn btn-default borrar"><i class="fas fa-times"></i> Discard</button>
            </td>

            
          </tr>';
    }

    return $filas;

}
function listadoDocentes(){
    $con=conectar();
    $query="SELECT * FROM usuarios WHERE tipo_usu='docente'";
    $sentence = $con-> prepare($query);
    $sentence->execute();
    $result=$sentence->fetchAll();

    $filas = "";

    foreach ($result as $res) {
        $filas .= '
        <tbody>
          <tr>
            <td><a href="pages/examples/invoice.php">' . $res['ced_usu'] . '</a></td>
            <td>' . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . ' ' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</td>
            <td><span class="badge badge-success">' . $res['mail_usu'] . '</span></td>
            <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">' . $res['dir_usu'] . '</div>
            </td>
            <td>
                <button type="button" class="btn btn-default editar" ><i class="fas fa-pencil-alt"></i> Editar</button>

                <button type="reset" class="btn btn-default borrar"><i class="fas fa-times"></i> Discard</button>
            </td>

            
          </tr>';
    }

    return $filas;

}

function listadoCursos()
{
  $con = conectar();
  $query = "SELECT * FROM cursos";
  $sentence= $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();

  $filas="";
  foreach($result as $res){
    $filas .= '<tbody>
    <tr>
      <td><a href="pages/examples/invoice.php">' . $res['id_cur'] . '</a></td>
      <td>' . $res['nom_cur'] .'</td>
      <td><span class="badge badge-success">' . $res['desc_cur'] . '</span></td>
      <td> <button type="button" class="btn btn-default gestion" ><i class="fas fa-wrench"></i> Gestión Curso</button> </td>
      <td>
          <button type="button" class="btn btn-default editar" ><i class="fas fa-pencil-alt"></i> Editar</button>

          <button type="reset" class="btn btn-default borrar"><i class="fas fa-times"></i> Discard</button>
      </td>

      
    </tr>';
  }

  return $filas;


}