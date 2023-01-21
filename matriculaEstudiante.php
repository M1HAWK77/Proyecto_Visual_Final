<?php include("cabeceraEstudiantes.php"); ?>
<!-- incluyo script de prueba para modal -->
<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        var matricula_id = "";
        var opcion;

        // puedo acceder a las class de otras clases
        $(".matricularse").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            matricula_id = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    idM: matricula_id,
                    opcion: "matricular"
                },
                success: function(resultado) {
                    alert(resultado);
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
                    <h1 class="m-0">Matriculas</h1>
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
    <br><br>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="" style="width: 18rem;">
                        <img src="img/EscudoUta.png" class="card-img-top" alt="...">

                    </div>
                </div>

                <!-- aqui inicia  -->
                <div class="card-body">
                    <table class="table table-dark table-striped-columns">
                        <thead>
                            <tr>
                                <th style="width: 400px">Id </th>
                                <th>Materia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <?php
                        include("consultas.php");
                        echo asignaturasEstudianteNoMatriculado();
                        ?>
                    </table>
                </div>

                <!-- aqui termina  -->
            </div>

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