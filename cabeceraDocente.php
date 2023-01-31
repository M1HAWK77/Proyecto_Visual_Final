<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['rol'])) {
    echo ("no existe");
    $_SESSION['user'] = '';
    $_SESSION['rol'] = '';
    //$_SESSION['cedula'] = '';
    header("location:index.php");
} else {
    if ($_SESSION['rol'] == '') {
        header("location:index.php"); //me da problemas y me muestra que la pagina no esta disponible
    } else {
        //echo ("existe el usuario " . $_SESSION['user'] . " y se ha definido como " . $_SESSION['rol'] . ' CabeceraGeneral->' . $_SESSION['cedula']);
        if ($_SESSION['rol'] == 'admin') {
        }
    }
}

?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UNIVERSIDAD TECNICA DE AMBATO | Dashboard</title>
        <script src="JqueryLib.js"></script>

        <script>
            $(document).ready(function() {

                 //Cargar Img
            $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        opcion: "foto"
                    },
                    success: function(resultado) {
                        $(".userImg").attr("src",resultado);
                        //alert(resultado);
                    }

                });

        //Fin Cargar Img


                //alert("funcionaaa");
                var user = (<?php echo json_encode($_SESSION['user']); ?>); //guuardar la variable en jquery con variables de sesion
                var rol = (<?php echo json_encode($_SESSION['rol']); ?>); //guuardar la variable en jquery con variables de sesion
                var usuarioId = (<?php echo json_encode($_SESSION['cedula']); ?>); //Agrege 16/01/2023 para ver si se arrregla lo de las variables de session
                //$("#usuario").text(user);
                $(".usuario").text(user);
                $("#salir").click(function() {

                    $.post("validaciones.php", {
                        nombre: user,
                        rol: rol,
                        id: usuarioId, //agrego 16/01/2023
                        opcion: "salir"

                    }, function(data, status) {
                        //alert("valor: " + data + " estado: " + status);
                        window.location("index.php");
                    })
                    location.reload();
                });

            });
        </script>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="docentes.php" class="nav-link">Home</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->

                    <!-- User  controls -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image userImg" alt="User Image">
                            <span class="hidden-xs usuario">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle userImg" alt="User Image">

                                <p class='usuario'>
                                    Nombre del usuario
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">

                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a  class="btn btn-default btn-flat" id="salir">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                    <!-- end user controls -->
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="navbar-brand">
                    <img src="./img/utalogo.png" alt="UTA Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="85">
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-4 pb-4 mb-4 d-flex">
                        <div class="image">
                            <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-3" alt="User Image"> -->
                        </div>
                        <div class="info">
                            <a href="#" class="d-block usuario" id="usuarioid">Alexander Pierce</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="./docentes.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Home</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                    </nav> <!--here-->
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>