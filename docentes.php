<?php include("cabeceraDocente.php") ?>
<!-- incluyo script de prueba para modal -->
<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {

        //imagen en tiempo real
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var valor = arrayCad[1];
        //imagen en tiempo real


        //Cargar Img
        $.ajax({
            url: "validaciones.php",
            type: "POST",
            data: {
                opcion: "foto"
            },
            success: function(resultado) {
                $("#usuImg").attr("src", resultado);
                //alert(resultado);
            }

        });

        //Fin Cargar Img    



        var usuario_id = "";
        var opcion;
        var ruta = "";

        // puedo acceder a las class de otras clases
        $("#edit").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            usuario_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            usuario_nombre = fila.find('td:eq(1)').text();
            usuario_apellidos = fila.find('td:eq(2)').text();
            var arraySeparadorCadena = usuario_nombre.split(" ");
            var arraySeparadorCadenaA = usuario_apellidos.split(" ");

            $("#primerNombre").val(arraySeparadorCadena[0]);
            $("#segundoNombre").val(arraySeparadorCadena[1]);
            $("#apellidoPaterno").val(arraySeparadorCadenaA[0]);
            $("#apellidoMaterno").val(arraySeparadorCadenaA[1]);
            $("#correo").val(fila.find('td:eq(3)').text());
            $("#direccion").val(fila.find('td:eq(4)').text());
            ruta = fila.find('td:eq(5)').text();
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
            opcion = 1;

            if (pNombre.length < 1 || pApellido.length < 1 || correo.length < 1) {
                alert("No se admiten los campos primarios como vacios [Primer nombre, Apellido, Correo]");
                return 0;
            }

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
                    img: ruta,
                    opcion: opcion
                },
                success: function(resultado) {
                    location.reload();

                }

            });

        });


        $(".asignaturaSeleccionada").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            idAsig = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            window.open("asignaturaDocente.php?id=" + idAsig + "", "_self"); //hace que no se abra otra pestaña

        });


        //SUBIR ARCHIVOS
        $("#Upload").click(function() { //variable cualquiera que coloco
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);
            // AJAX request

            $.ajax({
                url: 'validarImg.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        // Show image preview
                        alert("Imagen subida: " + response);
                        $('#imgUsu').text(response);
                        ruta = response;
                    } else {
                        alert('file not uploaded');
                    }
                }
            });
        });


        $("#acceptImg").click(function() {

            if (valor != null) {

                $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        i: valor,
                        opcion: "fotoTimeReal"
                    },
                    success: function(resultado) {
                        location.reload();

                    }

                });
            } else {

                alert('No se ha tomado ninguna foto');
            }

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
                    <h1 class="m-0"></h1>
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
                        <img id="usuImg" src="dist/img/user8-128x128.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"></p>
                            <a href="tomarFotoDocente.php"><button id="takePicture" type="button" class="btn btn-outline-info">Tomar Foto</button></a>
                            <button id="acceptImg" type="button" class="btn btn-outline-info">Aceptar Imagen</button>
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
                                <th>Editar Datos</th>

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
                            <th>
                                <h2> Asignaturas </h2>
                            </th>
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