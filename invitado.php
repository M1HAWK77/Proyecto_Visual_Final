<?php include("cabeceraInvitado.php"); ?>
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
                        <li class="breadcrumb-item active">Invitado</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Identificador Curso</th>
                                    <th>Nombre del Curso</th>
                                    <th>Descripción del curso</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            echo listadoCursosInvitado();
                            ?>
                        </table>
                    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>