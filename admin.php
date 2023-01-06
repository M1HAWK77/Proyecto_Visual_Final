<?php include("cabecera.php"); ?>
<!-- incluyo script de prueba para modal -->
<script src="JqueryLib.js"></script>
    
    <script>
        $(document).ready(function(){
            var usuario_id="";
            var opcion;

            // puedo acceder a las class de otras clases
            $(".editar").click(function(){
                fila= $(this).closest("tr");//captura la fila
                usuario_id=fila.find('td:eq(0)').text();//que busque la columna con la posicion
                usuario_nombre=fila.find('td:eq(1)').text();
                $("#nombreUsuario").val(usuario_nombre);
                $("#modalCrud").modal('show');

            });
            
            $(".borrar").click(function(){

                fila= $(this).closest("tr");//captura la fila
                usuario_id=fila.find('td:eq(0)').text();//que busque la columna con la posicion
                usuario_nombre=fila.find('td:eq(1)').text();
                $("#modalCrudBorrar").modal('show');

            });

            //control del submit
            $("#formUsuarios").submit(function(e){ //variable cualquiera que coloco
                e.preventDefault(); //evita que el formulario mande todo hacia el servidor
                nombreUsuario= $("#nombreUsuario").val();
                opcion=1;

                var arraySeparadorCadena=nombreUsuario.split(" ");
                alert(arraySeparadorCadena);
                $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        usuario_id: usuario_id,
                        nom1: arraySeparadorCadena[0],
                        nom2: arraySeparadorCadena[1],
                        ape1: arraySeparadorCadena[2],
                        ape2: arraySeparadorCadena[3],
                        opcion: opcion
                    },
                    success: function(resultado){
                    location.reload();

                    }

                });

            });

            //Borrar
            $("#formSalir").submit(function(e){ //variable cualquiera que coloco
                e.preventDefault(); //evita que el formulario mande todo hacia el servidor
                nombreUsuario= $("#nombreUsuario").val();
                opcion=2;
                $.ajax({
                    url: "validaciones.php",
                    type: "POST",
                    data: {
                        usuario_id: usuario_id,
                        opcion: opcion
                    },
                    success: function(resultado){
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
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Añadir Estudiantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p> Añadir Cursos </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Añadir Materias</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
      </div>

      <!-- TABLE: LATEST ORDERS -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Tabla Estudiantes</h3>

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
                  <th>Dirección</th>
                  <th>status</th>
                </tr>
              </thead>
                <?php include_once('consultas.php');
                      echo listadoEstudiantes();
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

      <?php include("modalEditar.php");?>
      <?php include("modalBorrar.php");?>


      <!-- FIN TABLE: LATEST ORDERS -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>