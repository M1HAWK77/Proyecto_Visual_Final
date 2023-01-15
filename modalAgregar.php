<!-- Tercer Modal Agregar Aqui inicio  -->
<div class="modal fade" id="modalCrudAgregar" tabindex="" role="dialog" arial-labelledby="ejemplo" 
    aria-hidden="true">
        <!--arial-labelledby="ejemplo" definir o delimitar el area  -->
    	
        <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->
        
            <div class="modal-content">   <!--dar color al contenedor  -->

                <div class="modal-header">
                    <h2>Seccion para agregar usuarios</h2>

                    <!--data-dismiss="modal" que al cerrar quite los modals -->
                    <button type="button" class="close" data-dismiss="modal"
                    arial-label="Close">X</button>
                </div>

                <form id="formUsuariosAgregar">
                <div class="modal-body">
                    <div class="row">
                        <!-- aqui va 6 -->
                        <div class="col-lg-10 row">
                            <div class="form-group">

                                <br>
                                <label class="col-form-label">Cedula</label>
                                <input type="text" id="cedula" name="cedula" class="form-control">
                                <label class="col-form-label">Primer Nombre</label>
                                <input type="text" id="primerNombreAdd" name="primerNombreAdd" class="form-control">
                                <label class="col-form-label">Segundo Nombre</label>
                                <input type="text" id="segundoNombreAdd" name="segundoNombreAdd" class="form-control">
                                <label class="col-form-label">Apellido Paterno</label>
                                <input type="text" id="apellidoPaternoAdd" name="apellidoPaternoAdd" class="form-control">
                                <label class="col-form-label">Apellido Materno</label>
                                <input type="text" id="apellidoMaternoAdd" name="apellidoMaternoAdd" class="form-control">
                                <label class="col-form-label">Correo electronico</label>
                                <input type="text" id="correoAdd" name="correoAdd" class="form-control">
                                <label class="col-form-label">Contraseña</label>
                                <input type="text" id="pw" name="pw" class="form-control">
                                <label class="col-form-label">Direccion</label>
                                <input type="text" id="direccionAdd" name="direccionAdd" class="form-control">
                                <br>
                                <a id="upload" href="#" class="btn btn-sm btn-info float-left">Subir archivos</a>
                                    

                                <!-- 
                                <label class="col-form-label">Nombre de la imagen</label>
                                <input type="text" id="nombreImg" name="nombreImg" class="form-control">
                                <label class="col-form-label">Selecciona una imagen</label>
                                <input type="file" id="imgUser" name="imgUser" class="form-control"> -->

                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" type="submit">Guardar</button>
                </div>
            </form>

            </div>

        </div>


    </div>
    