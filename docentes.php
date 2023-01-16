<?php include("cabeceraEstudiantes.php") ?>
<!-- incluyo script de prueba para modal -->
<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        var usuario_id = "";
        var opcion;

        // puedo acceder a las class de otras clases
        $("#edit").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            usuario_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            usuario_nombre = fila.find('td:eq(1)').text();
            $("#nombreUsuario").val(usuario_nombre);
            $("#modalCrudEditar").modal('show');

        });

        //control del submit
        $("#formUsuariosEditar").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            var usuarioId = (<?php echo json_encode($_SESSION['cedula']); ?>);
            pNombre = $("#primerNombre").val();
            sNombre = $("#segundoNombre").val();
            pApellido = $("#apellidoPaterno").val();
            sApellido = $("#apellidoMaterno").val();
            correo = $("#correo").val();
            direccion = $("#direccion").val();
            // Nueva funcion desde aqui
            fileImg=$("#imgUser").val();    

            // Nueva funcion desde aqui FIN
            opcion = 1;

            // var arraySeparadorCadena = nombreUsuario.split(" ");
            // alert(arraySeparadorCadena);
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    usuario_id: usuarioId,
                    nom1: pNombre,
                    nom2: sNombre,
                    ape1: pApellido,
                    ape2: sApellido,
                    cor: correo,
                    dir: direccion,
                    opcion: opcion
                },
                success: function(resultado) {
                    location.reload();

                }

            });

        });

    });
</script>

<!-- Fin de incluir script de prueba para modal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Curso al que pertenece</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Docente</li>
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
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card" style="width: 18rem;">
                        <img src="dist/img/user8-128x128.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Estimado Docente, en esta seccion podra editar sus datos</p>
                            <button id="edit" type="button" class="btn btn-outline-success">Editar</button>
                        </div>
                    </div>
                </div>

                <!-- aqui inicia  -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo electronico</th>
                                <th>Direccion</th>
                                <th style="width: 40px">Label</th>

                            </tr>
                        </thead>

                        <?php
                        include("consultas.php");
                        echo datosEstudiante();
                        ?>
                    </table>
                </div>

                <!-- aqui termina  -->
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Materias</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="gestionEstudiantes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Deberes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="gestionDocentes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <?php include("modalEditar.php"); ?>
            <?php include("modalBorrar.php"); ?>


            <!-- FIN TABLE: LATEST ORDERS -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>