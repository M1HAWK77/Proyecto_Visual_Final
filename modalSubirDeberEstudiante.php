<!-- Tercer Modal Agregar Aqui inicio  -->
<div class="modal fade" id="modalSubirDeber" tabindex="" role="dialog" arial-labelledby="ejemplo" 
    aria-hidden="true">
        <!--arial-labelledby="ejemplo" definir o delimitar el area  -->

        <div class="modal-dialog" role="document"> <!--document, digo que este modal va a tener incrustado un documento-->
        
            <div class="modal-content">   <!--dar color al contenedor  -->

                <div class="modal-header">
                    <h2>Subir Tarea</h2>

                    <!--data-dismiss="modal" que al cerrar quite los modals -->
                    <button type="button" class="close" data-dismiss="modal"
                    arial-label="Close">X</button>
                </div>

                <form id="subirArchivos" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <!-- aqui va 6 -->
                        <div class="col-lg-10 row">
                            <div class="form-group">

                                <br>    
                                <label class="col-form-label">Seleccionar Archivo</label>
                                <input type="file" id="fileDeber" name="fileDeber" class="form-control"> 

                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="button" id="UploadE" value="UploadE">
                    <!-- <button class="btn" type="button" value="Subir archivo">Subir archivo</button> -->
                </div>
            </form>

            </div>

        </div>


    </div>
    