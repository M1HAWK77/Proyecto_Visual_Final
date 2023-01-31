<?php include("cabeceraEstudiantes.php"); ?>
<script>
    $(document).ready(function() {
        //recojer valor de la materia a la que pertenece
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var materia = arrayCad[1];
    });

</script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Estudiantes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- here -->
            <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Regresar</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="estudiantes.php" class="small-box-footer">Back <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

            <!-- here -->


            <div class="row">


                <!-- aqui inicia  -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre Actividad</th>
                                <th>Calificación</th>
                            </tr>
                        </thead>

                        <?php
                        include("consultas.php");
                        $host = $_SERVER["HTTP_HOST"];
                        $url = $_SERVER["REQUEST_URI"];
                        $string = strval($url);
                        $id = explode("=", $string);
                        echo consultarNotasAsignatura($id[1]);
                        ?>
                    </table>

                    <br> <br>
                </div>

                <!-- aqui termina  -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>