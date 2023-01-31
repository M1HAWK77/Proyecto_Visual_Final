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
        <td >' . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . '</td>
        <td >' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</td>
        <td >' . $res['mail_usu'] . '</td>
        <td >' . $res['dir_usu'] . '</td>
        <td style="visibility:collapse; display:none;">' . $res['img_usu'] . '</td>     
        <td >
        <button id="edit" type="button" class="btn btn-outline-success">Editar</button>
        </td>     
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
  $img='<img id="picture" src="' . $result['img_usu']. '" class="card-img-top" alt="...">';
  return $img;
                        
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

//es lo mismo que docentes, listar con divs, no funciona arreglar como la de abajo mi so 
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
    '<tbody>
  <tr>
    <td style="visibility:collapse; display:none;">'.$res['id_asig'].'</td>
    <td> 
    <div class="">
    <button type="button" class="btn btn-block btn-outline-primary asignaturaSeleccionada"><i class="fas fa-pencil-alt"></i> ' .$res['nom_asig']. ' </button>
    </div>

    </td>
  </tr>
  </tbody>';
}
return $filas;      
}


function listarAsignaturasDocente()
{

    $con = conectar();
    $query = "SELECT * FROM asignaturas WHERE docente_asi=?";
    $sentence = $con->prepare($query);
    $sentence->execute(array($_SESSION['cedula']));
    $result = $sentence->fetchAll();
    $filas= "";

    foreach ($result as $res) {
      $filas .=
        '<tbody>
      <tr>
        <td style="visibility:collapse; display:none;">'.$res['id_asig'].'</td>

        <td> 
        <div class="">
        <button type="button" class="btn btn-block btn-outline-primary asignaturaSeleccionada"><i class="fas fa-pencil-alt"></i> ' .$res['nom_asig']. ' </button>
        </div>
    
        </td>

      </tr>
      </tbody>';
    }
  return $filas;      
}

function listarEstudiantesPertencenAsignatura($id)
{
  $con = conectar();
  $query = "SELECT u.* FROM usuarios u, detalle_asignaturas d WHERE d.id_asi_per=? AND u.ced_usu=d.ced_usu_det";
  $sentence = $con->prepare($query);
  // $sentence->execute(array($_SESSION['cedula']));
  $sentence->execute(array($id));
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
function listarTareas($id)
{
  $con = conectar();
  $query = "SELECT * FROM actividades WHERE id_asig_per=?";
  $sentence = $con->prepare($query);
  $sentence->execute(array($id));
  $result = $sentence->fetchAll();
  $filas= "";

  foreach ($result as $res) {
    $filas .= '
        <tbody>
          <tr>
            <td style="visibility:collapse; display:none;"><a href="#">' . $res['id_act'] . '</a></td>
            <td>' . $res['nom_act'] . '</td>
            <td><span class="badge">' . $res['desc_act'] . '</span></td>
            <td><span class="badge badge-success">' . $res['fec_entrega_act'] . '</span></td>
            <td><span class="badge badge-success">' . $res['estado_act'] . '</span></td>
            <td><a class="btn btn-sm btn-warning" href="'.$res['instruccion_act'].'" download> Descargar Actividad! </td>
            <td><a href="#" class="btn btn-sm btn-info float-left uploadDeber">Subir Actividad</a>
              <a href="#" class="btn btn-sm btn-danger float-left Aceptar"> Aceptar</a>
            </td>
          </tr>';
  }

  return $filas;
}

function deberesRecibidos($id)
{
  $con = conectar();
  
  $query = "SELECT d.id_det_act, d.calificacion, d.archivo_act, a.nom_act, u.* FROM detalle_actividades d, actividades a, usuarios u, asignaturas s WHERE s.id_asig = ?
  AND a.id_asig_per = s.id_asig AND d.id_act_per = a.id_act AND u.ced_usu = d.id_usu_act";

  $sentence = $con->prepare($query);
  $sentence->execute(array($id));
  $result = $sentence->fetchAll();
  $filas= "";


  foreach ($result as $res) {
    $filas .= '
        <tbody>
          <tr>
            <td style="visibility:collapse; display:none;"><a href="#">' . $res['id_det_act'] . '</a></td>
            <td>' . $res['nom_act'] . '</td>
            <td><span class="badge">'  . $res['nom1_usu'] . ' ' . $res['nom2_usu'] . ' ' . $res['ape1_usu'] . ' ' . $res['ape2_usu'] . '</span></td>
            <td><span class="badge badge-success">' . $res['id_det_act'] . '</span></td>
            <td><a class="btn btn-sm btn-warning" href="'.$res['archivo_act'].'" download> Descargar! </td>
            <td>'.$res['calificacion'].'</td>
            <td><a href="#" class="btn btn-sm btn-info float-left calificar">Calificar</a></td>
            <td> <a href="#" class="btn btn-sm btn-danger float-left editar"> Editar Nota</a></td>
          </tr>';
  }

  return $filas;

}
function consultarNotasAsignatura($id)
{
  $con = conectar();
  // $query = "SELECT asignaturas.* FROM asignaturas,  detalle_asignaturas WHERE  asignaturas.id_asig=detalle_asignaturas.id_asi_per AND
  //             detalle_asignaturas.ced_usu_det=?";
  //$query = "SELECT d.calificacion, a.nom_act FROM detalle_actividades d, actividades a WHERE a.id_asig_per=? AND  d.id_usu_act=?";
  $query = "SELECT d.calificacion, a.nom_act FROM detalle_actividades d, actividades a WHERE a.id_asig_per=? AND d.id_usu_act=? AND d.id_act_per = a.id_act";
  $sentence = $con->prepare($query);
  $sentence->execute(array($id, $_SESSION['cedula']));
  $result = $sentence->fetchAll();
  $filas= "";


  foreach ($result as $res) {
    $filas .= '
        <tbody>
          <tr>
            <td>' . $res['nom_act'] . '</td>
            <td>'.$res['calificacion'].'</td>
          </tr>';
  }

  return $filas;

}
