<div class="modal fade" id="modalCrud" tabindex="" role="dialog" arial-labelledby="ejemplo" aria-hidden="true">
    <!--arial-labelledby="ejemplo" definir o delimitar el area  -->

    <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->

        <div class="modal-content"> <!--dar color al contenedor  -->

            <div class="modal-header">
                <h2>Cambio de datos de usuario</h2>

                <!--data-dismiss="modal" que al cerrar quite los modals -->
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">X</button>
            </div>

            <form id="formUsuariosEstudiantes">
                <div class="modal-body">
                    <div class="row">
                        <!-- aqui va 6 -->
                        <div class="col-lg-10 row">
                            <div class="form-group">
                                <!-- solucion del inge -->
                                <label class="col-form-label" id="nombreUsuario"></label>
                                <br>
                                <label class="col-form-label">Primer Nombre</label>
                                <input type="text" id="primerNombre" name="nombreUsuario" class="form-control">
                                <label class="col-form-label">Segundo Nombre</label>
                                <input type="text" id="segundoNombre" name="nombreUsuario" class="form-control">
                                <label class="col-form-label">Apellido Paterno</label>
                                <input type="text" id="apellidoPaterno" name="nombreUsuario" class="form-control">
                                <label class="col-form-label">Apellido Materno</label>
                                <input type="text" id="apellidoMaterno" name="nombreUsuario" class="form-control">
                                <label class="col-form-label">Correo electronico</label>
                                <input type="text" id="correo" name="nombreUsuario" class="form-control">
                                <label class="col-form-label">Direccion</label>
                                <input type="text" id="direccion" name="nombreUsuario" class="form-control">

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