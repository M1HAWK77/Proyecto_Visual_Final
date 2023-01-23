<?php include("cabeceraDocente.php") ?>
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

        
        $("#upload").click(function() {
            $("#modalSubirArchivos").modal("show");
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


        $(".asignaturaSeleccionada").click(function(){
            fila = $(this).closest("tr"); //captura la fila
            idAsig = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            window.open("asignaturaDocente.php?id="+idAsig+"", "_self"); //hace que no se abra otra pestaña

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
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="card" style="width: 14rem;">
                        <img src="dist/img/user8-128x128.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"></p>
                            <button id="edit" type="button" class="btn btn-outline-success">Editar Datos</button>
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

            <section class="content">
                <!-- here  -->
                <table class="table table-sm table-borderless">
                        <thead>
                            <tr>
                                <th> <h2> Asignaturas </h2></th>
                            </tr>
                        </thead>

                        <?php
                        echo listarAsignaturasDocente();
                        ?>
                    </table>

            </section>

            <?php include("modalEditar.php"); ?>
            <?php include("modalBorrar.php"); ?>
            <?php include("modalSubirDocumento.php"); ?>


            <!-- FIN TABLE: LATEST ORDERS -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>