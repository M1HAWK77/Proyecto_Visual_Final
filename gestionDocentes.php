<?php include("cabeceraAdmin.php") ?>

<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        var usuario_id = "";
        var opcion;

        // puedo acceder a las class de otras clases
        $(".editar").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            usuario_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            usuario_nombre = fila.find('td:eq(1)').text();
            var arraySeparadorCadena = usuario_nombre.split(" ");

            $("#nombreUsuario").text(usuario_nombre); //Cambio lo que estaba escrito por el argumento que mando
            $("#primerNombre").val(arraySeparadorCadena[0]);
            $("#segundoNombre").val(arraySeparadorCadena[1]);
            $("#apellidoPaterno").val(arraySeparadorCadena[2]);
            $("#apellidoMaterno").val(arraySeparadorCadena[3]);
            $("#correo").val(fila.find('td:eq(2)').text());
            $("#direccion").val(fila.find('td:eq(3)').text());
            $("#modalCrudEditar").modal('show');

        });

        $(".borrar").click(function() {

            fila = $(this).closest("tr"); //captura la fila
            usuario_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            usuario_nombre = fila.find('td:eq(1)').text();
            $("#modalCrudBorrar").modal('show');

        });

        //Modulo apara agregar Estudiantes reference addEstudiante
        $("#addDocente").click(function() {
            $("#modalCrudAgregar").modal('show');
        });

        $("#formUsuariosEditar").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            nombreUsuario = $("#nombreUsuario").val();
            pNombre = $("#primerNombre").val();
            sNombre = $("#segundoNombre").val();
            pApellido = $("#apellidoPaterno").val();
            sApellido = $("#apellidoMaterno").val();
            correo = $("#correo").val();
            direccion = $("#direccion").val();
            opcion = 1;

            if(pNombre.length < 1 || pApellido.length < 1 || correo.length < 1 ){
                alert("No se admiten los campos primarios como vacios [Primer nombre, Apellido, Correo]");
                return 0;
            }

            var arraySeparadorCadena = nombreUsuario.split(" ");
            alert(arraySeparadorCadena);
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    usuario_id: usuario_id,
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

        //Borrar
        $("#formBorrar").submit(function(e) { //variable cualquiera que coloco
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            nombreUsuario = $("#nombreUsuario").val();
            opcion = 2;
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    usuario_id: usuario_id,
                    opcion: opcion
                },
                success: function(resultado) {
                    location.reload();

                }

            });

        });

        //Agregar
        $("#formUsuariosAgregar").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            //alert('agregar click');
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            cedula = $("#cedula").val();
            pNombre = $("#primerNombreAdd").val();
            sNombre = $("#segundoNombreAdd").val();
            pApellido = $("#apellidoPaternoAdd").val();
            sApellido = $("#apellidoMaternoAdd").val();
            correo = $("#correoAdd").val();
            password = $("#pw").val();
            direccion = $("#direccionAdd").val();
            opcion = 3;

            if(pNombre.length < 1 || pApellido.length < 1 || correo.length < 1 ){
                alert("No se admiten los campos primarios como vacios [Primer nombre, Apellido, Correo]");
                return 0;
            }


            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    ced: cedula,
                    nom1: pNombre,
                    nom2: sNombre,
                    ape1: pApellido,
                    ape2: sApellido,
                    cor: correo,
                    pw: password,
                    dir: direccion,
                    tipoUsuario: 'docente',
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
                    <h1 class="m-0">Modulo Gestion Docentes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>A??adir Docente</h3>

                            <p>Modulo Registro</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a id="addDocente" class="small-box-footer">Desplegar registro <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Home</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="admin.php" class="small-box-footer">Retornar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Listado Docentes</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Correo electronico</th>
                                    <th>Direcci??n</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            echo listadoDocentes();
                            ?>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
            </div>

            <?php include("modalEditar.php"); ?>
            <?php include("modalBorrar.php"); ?>
            <?php include("modalAgregar.php"); ?>


            <!-- FIN TABLE: LATEST ORDERS -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>