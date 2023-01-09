<?php include("cabeceraAdmin.php"); ?>
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
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
              
              <p> Gestionar Cursos </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="gestionCursos.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Gestionar Estudiantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="gestionEstudiantes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Gestionar Docentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="gestionDocentes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>  
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