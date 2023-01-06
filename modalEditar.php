<div class="modal fade" id="modalCrud" tabindex="" role="dialog" arial-labelledby="ejemplo" 
    aria-hidden="true">
        <!--arial-labelledby="ejemplo" definir o delimitar el area  -->
    	
        <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->
        
            <div class="modal-content">   <!--dar color al contenedor  -->

                <div class="modal-header">
                    <h2>Cambio de datos de usuario</h2>

                    <!--data-dismiss="modal" que al cerrar quite los modals -->
                    <button type="button" class="close" data-dismiss="modal"
                    arial-label="Close">X</button>
                </div>

                <form id="formUsuarios">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <!-- solucion del inge -->
                                    <label class="col-form-label">Nombre de usuario</label>
                                    <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control">

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