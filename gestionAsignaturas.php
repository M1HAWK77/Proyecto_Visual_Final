<?php include("cabeceraAdmin.php"); ?>
<script src="JqueryLib.js"></script>

<script>
    $(document).ready(function() {
        //obtener valor del pk de cursos, no utilizo en el proyecto
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var valor = arrayCad[1];
        //alert(valor);
        var opcion;
        var asigId="";

        $("#addAsignatura").click(function() {
            $("#modalCrudAddAsignatura").modal("show");
        }); 
        
        $(".editarAsignatura").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            asigId = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            $("#eNomAsignatura").val(fila.find('td:eq(1)').text());
            $("#modalCrudEditAsignatura").modal("show");
            
        });
        
        $(".borrarAsignatura").click(function() {
            fila = $(this).closest("tr"); //captura la fila
            asigId = fila.find('td:eq(0)').text(); //que busque la columna con la posicion
            $("#txtDel").text('Confirmación para eliminar Asignatura');
            $("#modalCrudBorrar").modal("show");
            
        });
        
        
        //Agregar
        $("#formAgregarAsignatura").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            e.preventDefault();                 //evita que el formulario mande todo hacia el servidor
            idA = $("#idAsignatura").val();     //si lo borro se pudre el crud de agregar, pero en realidad no tiene funcionalidad
            nombreA = $("#nombreAsignatura").val();
            docSelect=$("#aSeleccion").val();
            opcion = 7;
            
            if(nombreA.length < 1){
                alert("No se admite el campo nombre vacio ");
                return 0;
            }
            
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    idAsig: idA,
                    nomA: nombreA,
                    curPer: valor,
                    docAsi: docSelect,
                    opcion: opcion
                },
                success: function(resultado) {
                    //aler(resultado);
                    location.reload();
                    
                }
                
            });
            
        });
        //Editar
        
        $("#formEditarAsignatura").submit(function(e) { //variable cualquiera que coloco, es para controlar el boton submit
            
            e.preventDefault(); //evita que el formulario mande todo hacia el servidor
            nombreA = $("#eNomAsignatura").val();
            docSelect=$("#eSeleccion").val();
            opcion = 8;

            if(nombreA.length< 1 ){
                alert("No se admite el campo vacio");
                return 0;
            }

            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    nomA: nombreA,
                    docAsi: docSelect,
                    idAsig: asigId,
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
            opcion = 9;
            $.ajax({
                url: "validaciones.php",
                type: "POST",
                data: {
                    idAsig: asigId,
                    opcion: opcion
                },
                success: function(resultado) {
                    location.reload();

                }

            });

        });




    });
</script>

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
                        <li class="breadcrumb-item active">Principal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Añadir Asignatura</h3>
                            <p>Modulo Registro</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a id="addAsignatura" class="small-box-footer">Desplegar registro <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Cursos</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="gestionCursos.php" class="small-box-footer">Retornar <i class="fas fa-arrow-circle-right"></i></a>
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
                                    <th>Identificador de la Asignatura</th>
                                    <th>Nombre de la Asignatura</th>
                                    <th>Edicion</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            $host = $_SERVER["HTTP_HOST"];
                            $url = $_SERVER["REQUEST_URI"];
                            $string = strval($url);
                            $id = explode("=", $string);
                            //var_dump($id[1] . PHP_EOL); //verificar si imprime bien
                            echo (listadoAsignaturas($id[1]));
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

            <!-- Eh aqui el problema de los modales, tenia que ver con la posicion en que los llamo -->
            <?php include("modalEditarAsignatura.php"); ?>
            <?php include("modalBorrar.php"); ?>
            <?php include("modalAgregarAsignatura.php"); ?>
            

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.va el footer -->



        <?php include("footer.php"); ?>