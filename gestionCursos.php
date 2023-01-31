<?php include("cabeceraAdmin.php") ?>

<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        var opcion;
        var cursoId = "";

        // puedo acceder a las class de otras clases
        $(".gestion").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            cursoId = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            alert(cursoId);
            window.open("gestionAsignaturas.php?id="+cursoId+"");
        });


        $(".editar").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            cursoId = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            $("#enombreCurso").val(fila.find('td:eq(1)').text());
            $("#edescripcionCurso").val(fila.find('td:eq(2)').text());
            $("#modalCrudEditCurso").modal('show');

        });

        $(".borrar").click(function() {

            fila = $(this).closest("tr"); //captura la fila
            cursoId = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            $("#txtDel").text('Confirmación para eliminar Curso');
            $("#modalCrudBorrar").modal('show');

        });

        //Modulo apara agregar Estudiantes reference addEstudiante
        $("#addCurso").click(function() {
            $("#modalCrudAddCurso").modal("show");

        });

        //Agregar
        $("#formAgregarCurso").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            idC = $("#idCurso").val();
            nombreC = $("#nombreCurso").val();
            descripcionC = $("#descripcionCurso").val();
            opcion = 4;

            if( idC.length < 1 || nombreC.length < 1){
                alert("No se admite el nombre y el id del curso vacio");
                return 0;
            }

            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    idCurso: idC,
                    nomCurso: nombreC,
                    desCurso: descripcionC,
                    opcion: opcion
                },
                success: function(resultado) {
                    location.reload();

                }

            });

        });
        //Editar
        $("#formEditarCurso").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            nombreC = $("#enombreCurso").val();
            descripcionC = $("#edescripcionCurso").val();
            opcion = 6;

            if(nombreC.length < 1){
                alert("No se admite el nombre del curso vacio");
                return 0;
            }

            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    nomCurso: nombreC,
                    desCurso: descripcionC,
                    idCurso: cursoId,
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
            opcion = 5;
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    idC: cursoId,
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
                    <h1 class="m-0">Dashboard</h1>
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
                            <h3>Añadir Curso</h3>

                            <p>Modulo Registro</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a id="addCurso" class="small-box-footer">Desplegar registro <i class="fas fa-arrow-circle-right"></i></a>
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
                    <h3 class="card-title">Listado Cursos</h3>

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
                                    <th>Identificador Curso</th>
                                    <th>Nombre del Curso</th>
                                    <th>Descripción del curso</th>
                                    <th>Gestión Asignaturas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            echo listadoCursos();
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

            <?php include("modalAgregarCurso.php"); ?>
            <?php include("modalBorrar.php"); ?>
            <?php include("modalEditarCurso.php"); ?>


            <!-- FIN TABLE: LATEST ORDERS -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>