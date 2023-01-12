<!-- Tercer Modal Agregar Aqui inicio  -->
<div class="modal fade" id="modalCrudAddCurso" tabindex="" role="dialog" arial-labelledby="ejemplo" 
    aria-hidden="true">
        <!--arial-labelledby="ejemplo" definir o delimitar el area  -->
    	
        <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->
        
            <div class="modal-content">   <!--dar color al contenedor  -->

                <div class="modal-header">
                    <h2>Seccion para agregar Cursos</h2>

                    <!--data-dismiss="modal" que al cerrar quite los modals -->
                    <button type="button" class="close" data-dismiss="modal"
                    arial-label="Close">X</button>
                </div>

                <form id="formAgregarCurso">
                <div class="modal-body">
                    <div class="row">
                        <!-- aqui va 6 -->
                        <div class="col-lg-10 row">
                            <div class="form-group">

                                <br>
                                <label class="col-form-label">Identificador Curso</label>
                                <input type="text" id="idCurso" name="idCurso" class="form-control">
                                <label class="col-form-label">Nombre del Curso</label>
                                <input type="text" id="nombreCurso" name="nombreCurso" class="form-control">
                                <label class="col-form-label">Descripción del Curso </label>
                                <input type="text" id="descripcionCurso" name="descripcionCurso" class="form-control">

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