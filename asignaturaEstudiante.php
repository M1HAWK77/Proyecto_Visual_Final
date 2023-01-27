<?php include("cabeceraEstudiantes.php"); ?>
<script>
    $(document).ready(function() {
        var idAsignatura = "";
        var ruta="";
        var opcion;

        //recojer valor de la materia a la que pertenece
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var materia = arrayCad[1];

        $(".uploadDeber").click(function() {
            fila = $(this).closest("tr");
            idAsignatura = fila.find('td:eq(0)').text();
            $("#modalSubirDeber").modal("show");
        });

        // puedo acceder a las class de otras clases
        $("#edit").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            usuario_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            usuario_nombre = fila.find('td:eq(1)').text();
            $("#nombreUsuario").val(usuario_nombre);
            $("#modalCrudEditar").modal('show');

        });

        //SUBIR ARCHIVOS
        $("#UploadE").click(function() { 
            var fd = new FormData();
            var files = $('#fileDeber')[0].files[0];
            fd.append('fileDeber', files);
            // AJAX request

            $.ajax({
                url: 'validarDeberes.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        // Show image preview
                        alert("Documento subido: " + response);
                        //$('#imgUsu').text(response);
                        ruta = response;
                    } else {
                        alert('file not uploaded');
                    }
                }
            });

        });

        $(".Aceptar").click(function(){

            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    file: ruta,
                    idAsignatura: idAsignatura,
                    opcion: "upDeberEstudiante"
                },
                success: function(resultado) {
                    location.reload();

                }

            });
        });

        $("#notasXMateria").click(function(){
            window.open("notasMateriaEstudiante.php?id=" + materia + "", "_self"); //hace que no se abra otra pestaña
        });

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
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>NOTAS</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a id="notasXMateria" class="small-box-footer">ver <i class="fas fa-arrow-circle-right"></i></a>
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
                                <th style="visibility:collapse; display:none;">ID Actividad</th>
                                <th>Nombre Actividad</th>
                                <th>Dirección Actividad</th>
                                <th>Fecha Entrega</th>
                                <th>Estado</th>
                                <th>Archivo</th>
                            </tr>
                        </thead>

                        <?php
                        include("consultas.php");
                        $host = $_SERVER["HTTP_HOST"];
                        $url = $_SERVER["REQUEST_URI"];
                        $string = strval($url);
                        $id = explode("=", $string);
                        echo listarTareas($id[1]);
                        ?>
                    </table>

                    <br> <br>
                </div>

                <!-- aqui termina  -->
            </div>


            <?php include("modalEditar.php"); ?>
            <?php include("modalBorrar.php"); ?>
            <?php include("modalSubirDeberEstudiante.php"); ?>


            <!-- FIN TABLE: LATEST ORDERS -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>