<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['rol'])) {
  // echo ("no existe");
  echo ("<script> alert('Session no instanciada') </script>");
  $_SESSION['user'] = '';
  $_SESSION['rol'] = '';
  header("location:index.php");
} else {
  if ($_SESSION['rol'] == '') {
    //echo ("<script> alert('no existe el usuario')</script>");
    //header("location:index.php"); //me da problemas y me muestra que la pagina no esta disponible
  } else {
    //echo ("existe el usuario " . $_SESSION['user'] . " y se ha definido como " . $_SESSION['rol']);
    if ($_SESSION['rol'] == 'admin') {
      header('location: admin.php');
    } else if ($_SESSION['rol'] == 'estudiante') {
      header('location: estudiantes.php');
    } else if ($_SESSION['rol'] == 'docente') {
      header('location: docentes.php');
    } else if ($_SESSION['rol'] == 'invitado') { //agregue al final invitado
      header('location: invitado.php');
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UTA | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script src="JqueryLib.js"></script>

  <script>
    $(document).ready(function() {
      //alert("funcionaaa");
      $("#ingresar").click(function() {
        var userMail = $("#emailUser").val();
        var userPw = $("#passwordUser").val();

        $.post("validaciones.php", {
          mail: userMail,
          pw: userPw

        }, function(data, status) {
          //alert("valor: " + data + " estado: " + status + userMail + userPw);
          if (data >= 1 && roleUser == 'admin') {
            alert('entro al if' + roleUser);
            window.open("admin.php");
          } else if (data >= 1 && roleUser == 'estudiante') {
            window.open("estudiantes.php");
          } else if (data >= 1 && roleUser == 'docente') {
            window.open("docentes.php");
          }
        })
      });

    });
  </script>

</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center" style="background-color: #e74a3b ">
        <a href="panel.php" class="h1"><b>UTA </b>DADV</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form><!--aqui edite el method y href-->
          <div class="input-group mb-3">
            <input id="emailUser" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="passwordUser" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block " id="ingresar" name="ingresar">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <br>

  <!-- card -->
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="align-items: center;">-------------Bienvenido-------------</h5>
      <p class="card-text">Para visualizar la interfaz de la plataforma puede ingresar como invitado, para esto simularemos el proceso de logearse</p>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">usuario: invitado@gmail.com </li>
    <li class="list-group-item">contrase??a: invitado</li>
  </ul>
</div>
  <!-- card -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>