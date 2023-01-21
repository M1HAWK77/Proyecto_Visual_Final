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
  $query = "SELECT * FROM usuarios WHERE tipo_usu='docente'";
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();
  $selectB = "";
  foreach ($result as $res) {
    $selectB.= '<option selected value='.$res['ced_usu'].'>'.$res['nom1_usu'].' '.$res['ape1_usu'].'</option>';
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
        <td style="visibility:collapse; display:none;">' . $res['img_usu'] . '</td>

    </tr>
    </tbody>';
  }
  return $filas;
}

function fotoUsuario()
{
  $con = conectar();
  $query = "SELECT img_usu FROM usuarios WHERE ced_usu=?";
  $sentence = $con->prepare($query);
  $sentence->execute(array($_SESSION['cedula']));
  $result = $sentence->fetch();
  return $result['img_usu'];
}


function asignaturasEstudianteNoMatriculado()
{
  $con = conectar();
  $query = "SELECT * FROM asignaturas"; 
  $sentence = $con->prepare($query);
  $sentence->execute();
  $result = $sentence->fetchAll();

  $filas="";

  foreach($result as $res){
    $filas .=
    '<tbody> 
    <tr>
      <td>' . $res['id_asig'] . '</td>
      <td>' . $res['nom_asig'] . '</td>
      <td>
        <button type="button" class="btn btn-default matricularse" ><i class="fas fa-pencil-alt"></i>Matricularse</button>
      </td>

    <tr>
    </tbody>' ;
  }

  return $filas;
}

function listarAsignaturasEstudiante()
{
  $con = conectar();
  //Consulta original
  // $query = "SELECT asignaturas.nom_asig FROM asignaturas,  detalle_asignaturas WHERE  asignaturas.id_asig=detalle_asignaturas.id_asi_per AND
  //             detalle_asignaturas.ced_usu_det=?";

  //consulta para tener hasta el id
  $query = "SELECT asignaturas.* FROM asignaturas,  detalle_asignaturas WHERE  asignaturas.id_asig=detalle_asignaturas.id_asi_per AND
              detalle_asignaturas.ced_usu_det=?";

  $sentence = $con->prepare($query);
  $sentence->execute(array($_SESSION['cedula']));
  //$sentence->execute();
  $result = $sentence->fetchAll();

  //return $result;
  $filas= "";

  foreach ($result as $res) {
    $filas .=
    '
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
            <span class="info-box-text" value="'.$res['id_asig'].'">'.$res['nom_asig'].'</span>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>';
  }
  return $filas;
}

function listarAsignaturasDocente(){

  $con = conectar();
  $query = "SELECT * FROM asignaturas WHERE docente_asi=?";
  $sentence = $con->prepare($query);
  $sentence->execute(array($_SESSION['cedula']));
  $result = $sentence->fetchAll();
  $filas= "";

  foreach ($result as $res) {
    $filas .=
    '
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
            <span class="info-box-text idAsigDoc">'.$res['nom_asig'].'</span>
            <a value="'.$res['id_asig'].'" class="small-box-footer asignaturaSeleccionada">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>';
  }
  return $filas;

}

function listarEstudiantesPertencenAsignatura()
{
  $con = conectar();
  $query = "SELECT u.* FROM usuarios u, detalle_asignaturas d WHERE d.id_asi_per=1 AND u.ced_usu=d.ced_usu_det";
  $sentence = $con->prepare($query);
  // $sentence->execute(array($_SESSION['cedula']));
  $sentence->execute();
  $result = $sentence->fetchAll();
  $filas= "";

  foreach ($result as $res) {
    $filas .= '
        <tbody>
          <tr>
            <td><a href="#">' . $res['ced_usu'] . '</a></td>
            <td>' . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . ' ' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</td>
            <td><span class="badge badge-success">' . $res['mail_usu'] . '</span></td>
            <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">' . $res['dir_usu'] . '</div>
            </td>

          </tr>';
  }

  return $filas;
}
