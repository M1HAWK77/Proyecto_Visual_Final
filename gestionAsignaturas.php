<?php include("cabeceraAdmin.php"); ?>

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

                                    <th></th>
                                </tr>
                            </thead>
                            <?php include_once('consultas.php');
                            echo listadoAsignaturas();  
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

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.va el footer -->



<?php include("footer.php"); ?>