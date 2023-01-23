<?php include("cabeceraDocente.php") ?>

<script src="JqueryLib.js"></script>
<!-- //Script para el texto giga prosito -->
<script>
    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    });
</script>


<script>
    $(document).ready(function() {
        //obtener id de la url para asignar la tareas
        var urlCursos = $(location).attr('href');
        var arrayCad = urlCursos.split('=');
        var valor = arrayCad[1];
        alert(valor);

           //SUBIR ARCHIVOS
           $("#UploadDeber").click(function() { //variable cualquiera que coloco
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
                    <h1 class="m-0">Asignación De Tareas</h1>
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
            <div class="row">
                <div class="col-md-2">
                    <a href="asignaturaDocente.php" class="btn btn-primary btn-block mb-3">Regresar</a>
                </div>
                <div class="col-md-10">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">UNIVERSIDAD TECNICA DE AMBATO</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="Nombre De La Actividad:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Descripción:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" id="fileDeber" name="fileDeber" class="form-control"> 
                                <br><br>
                                <p class="help-block">El limite lo pones tu crack</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" id="UploadDeber" value="UploadDeber" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>