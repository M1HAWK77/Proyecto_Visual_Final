<?php include("cabeceraDocente.php") ?>

<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        //obtener id de la url para asignar la tareas
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var valor = arrayCad[1];
        var idActividad;
        var notaActual;
        alert(valor);

        // puedo acceder a las class de otras clases
        $("#goTareas").click(function() {

            window.open("asignarTareasDocente.php?id="+valor+"", "_self");
        });

        $(".calificar").click(function(){
            fila = $(this).closest("tr"); 
            idActividad= fila.find('td:eq(0)').text(); 
            $("#modalCalificar").modal('show');

        });

        $(".editar").click(function(){
            fila = $(this).closest("tr"); 
            idActividad= fila.find('td:eq(0)').text();
            notaActual=fila.find('td:eq(5)')
            $("#modalCalificarE").modal('show');

        });

         //Agregar Calificacion
        $("#formCalificacion").submit(function(e) { 
            e.preventDefault(); 
            nota = $("#upNota").val();
            //alert(idA+ nombreA);
            if(nota >= 0 && nota <= 10){
            
                $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        idDeber: idActividad,
                        calf: nota,
                        opcion: "calificacion"
                    },
                    success: function(resultado) {
                        //aler(resultado);
                        location.reload();
                        
                    }
                    
                });
            }else{
                alert("la nota que se quiere ingresar no es valida")
            }
            
        });

         //Editar Calificacion
        $("#formCalificacionE").submit(function(e) { 
            e.preventDefault(); 
            nota = $("#upNotaE").val();
            if(nota >= 0 && nota <= 10){
            
                $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        idDeber: idActividad,
                        calf: nota,
                        opcion: "editarcalificacion"
                    },
                    success: function(resultado) {
                        //aler(resultado);
                        location.reload();
                        
                    }
                    
                });
            }else{
                alert("la nota que se quiere ingresar no es valida")
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
                    <h1 class="m-0">UNIVERSIDAD DE LA VIDA SINCE 2002</h1>
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

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Deberes Subidos</h3>

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
                                    <th style="visibility:collapse; display:none;">id_act_per</th>
                                    <th>Asignacion</th>
                                    <th>Nombre Estudiante</th>
                                    <th>ID</th>
                                    <th>Descargar tarea</th>
                                    <th>Calificación</th>
                                    <th>Calificar</th>
                                    <th>Editar calificacion</th>

                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            $host = $_SERVER["HTTP_HOST"];
                            $url = $_SERVER["REQUEST_URI"];
                            $string = strval($url);
                            $id = explode("=", $string);
                            echo deberesRecibidos($id[1]);
                            ?>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-footer -->
            </div>

            <?php include("modalCalificar.php")?>           
            <?php include("modalEditarCalificacion.php")?>           
            
            <!-- FIN TABLE: LATEST ORDERS -->
            
        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>