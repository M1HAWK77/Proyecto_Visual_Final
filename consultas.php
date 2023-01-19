<?php
include_once("conectarBD.php");
function listadoEstudiantes()
{
  $con = conectar();
  $query = "SELECT * FROM usuarios WHERE tipo_usu='estudiante'";
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();

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
function listadoDocentes()
{
  $con = conectar();
  $query = "SELECT * FROM usuarios WHERE tipo_usu='docente'";
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();

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
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();

  $filas = "";
  foreach ($result as $res) {
    $filas .= '<tbody>
    <tr>
      <td><a href="pages/examples/invoice.php">' . $res['id_cur'] . '</a></td>
      <td>' . $res['nom_cur'] . '</td>
      <td><span class="badge badge-success">' . $res['desc_cur'] . '</span></td>
      <td> <button type="button" class="btn btn-default gestion" ><i class="fas fa-wrench"></i> Gestión Asignaturas</button> </td>
      <td>
          <button type="button" class="btn btn-default editar" ><i class="fas fa-pencil-alt"></i> Editar</button>

          <button type="reset" class="btn btn-default borrar"><i class="fas fa-times"></i> Discard</button>
      </td>


    </tr>';
  }

  return $filas;
}


function listadoAsignaturas($id)
{

  $con = conectar();
  $query = "SELECT * FROM asignaturas WHERE id_cur_per=?";
  $sentence = $con->prepare($query);
  $sentence->execute(array($id));
  $result = $sentence->fetchAll();

  $filas = "";
  foreach ($result as $res) {
    $filas .= '<tbody>
    <tr>
      <td><a href="#">' . $res['id_asig'] . '</a></td>
      <td>' . $res['nom_asig'] . '</td>
      <td>
          <button type="button" class="btn btn-default editarAsignatura" ><i class="fas fa-pencil-alt"></i> Editar</button>
          <button type="reset" class="btn btn-default borrarAsignatura"><i class="fas fa-times"></i> Discard</button>
      </td>


    </tr>';
  }

  return $filas;
}

function comboBoxDocentes()
{
  
  $con = conectar();
  $query = "SELECT * FROM usuarios WHERE tipo_usu=docente";
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();
  $selectB = "";
  foreach ($result as $res) {
    $selectB = '
    <select class="form-select" aria-label="Default select example">
    <option selected id=' . $res['ced_usu'] . '>' . $res['nom1_usu'] . $res['ape1_usu'] . '</option>
    </select>';
  }
  return $selectB;
}



function datosEstudiante()
{
  $con = conectar();
  $query = "SELECT * FROM usuarios WHERE ced_usu=?";
  $sentence = $con->prepare($query);
  $sentence->execute(array($_SESSION['cedula']));
  $result = $sentence->fetchAll();

  $filas = "";
  foreach ($result as $res) {
    $filas .=
      '<tbody>
    <tr>
        <td>' . $res['ced_usu'] . '</td>
        <td>' . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . '</td>
        <td>' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</td>
        <td>' . $res['mail_usu'] . '</td>
        <td>' . $res['dir_usu'] . '</td>
        <td><span class="badge bg-danger">55%</span></td>
    </tr>
    </tbody>';
  }
  return $filas;
}

function listarAsignaturasEstudiante()
{
  $con = conectar();
  // $query = "SELECT asignaturas.nom_asig FROM asignaturas INNER JOIN
  //           detalle_asignaturas ON asignaturas.id_asig=detalle_asignaturas.id_det_asig WHERE  detalle_asignaturas.ced_usu_det=?";

  $query = "SELECT asignaturas.nom_asig FROM asignaturas,  detalle_asignaturas WHERE  asignaturas.id_asig=detalle_asignaturas.id_asi_per AND
              detalle_asignaturas.ced_usu_det='1802'";

  $sentence = $con->prepare($query);
  //$sentence->execute(array($_SESSION['cedula']));
  $sentence->execute();
  $result = $sentence->fetchAll();

  return $result;
  //$filas = "";

  // foreach ($result as $res) {
  //   $filas .=
  //   '
  //       <div class="col-lg-3 col-6">
  //         <!-- small box -->
  //         <div class="small-box bg-info">
  //         <div class="inner">
  //             <h3>150</h3>

  //             <p>'.$res['nom_asig'].'</p>
  //         </div>
  //         <div class="icon">
  //             <i class="ion ion-person-add"></i>
  //           </div>
  //         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  //       </div>
  //     </div>';
  // }
  // return $filas;
}
