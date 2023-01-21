<?php include("cabeceraAdmin.php") ?>

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
                                <textarea id="compose-textarea" class="form-control" style="height: 300px">
                        <h1><u>Deber</u></h1>
                        <h4>Queridos estudiantes</h4>
                        <p>Por favor entregar el deber a tiempo</p>
                        <ul>
                        <li>CALIFICACIONES</li>
                        <li>10</li>
                        <li>5</li>
                        <li>0</li>
                        </ul>
                        <p>Thank you,</p>
                        <p>El profe</p>
                    </textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Attachment
                                    <input type="file" name="attachment">
                                </div>
                                <p class="help-block">Max. 32MB</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>