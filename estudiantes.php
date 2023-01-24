<?php include("cabeceraEstudiantes.php") ?>
<!-- incluyo script de prueba para modal -->
<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        var usuario_id = "";
        var opcion;
        // recoger valores de la tabla para img -- aun nio funciona
        // fila = $(this).closest("tr"); //captura la fila
        // imageUsu = fila.find('td:eq(5)').text();

        $("#upload").click(function() {
            $("#modalSubirArchivos").modal("show");
        });

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
            fileImg = $("#imgUser").val();
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


        
        $(".asignaturaSeleccionada").click(function(){
            fila = $(this).closest("tr"); //captura la fila
            idAsig = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            window.open("asignaturaEstudiante.php?id="+idAsig+"", "_self"); //hace que no se abra otra pestaña

        });


        // alert(imageUsu); AQUI ES PARA QUE APAREZCA LA IMAGEN
        // replaceImg='<img id="picture" src="'+imageUsu+'" class="card-img-top" alt="...">'
        // $("#picture").replaceWith(replaceImg);
        //Control para cambio de img segun el usuario
        // $("#picture").on('change',function() {         
        //     fila = $(this).closest("tr"); //captura la fila
        //     imageUsu = fila.find('td:eq(5)').text();
        //     //$("#picture").replaceWith('<img id="picture" src="img/usuImg/spidi.jpg" class="card-img-top" alt="...">');
        // });

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
                    <h1 class="m-0">UNIVERSIDAD DE LA VIDA</h1>
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
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card" style="width: 18rem;">
                        <img id="picture" src="img/usuImg/spidi.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Estimado estudiante, en esta seccion podra editar sus datos</p>
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
                                <th style="visibility:collapse; display:none;">ruta img</th>


                            </tr>
                        </thead>

                        <?php
                        include("consultas.php");
                        echo datosEstudiante();
                        ?>
                    </table>
                    <!-- IMPLEMENTO MATRICULA -->
                    <br> <br>

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>UTA</h3>

                                    <p>Matriculas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="matriculaEstudiante.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- IMPLEMENTO MATRICULA -->
                </div>

                <!-- aqui termina  -->
            </div>



            <section class="content">
                <!-- here  -->
                <table class="table table-sm table-borderless  ">
                    <thead >
                        <tr>
                            <th><h2> Asignaturas </h2></th>
                        </tr>
                    </thead>

                    <?php
                    echo listarAsignaturasEstudiante();
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