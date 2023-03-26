
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">

                <h5 class="text-center">Actividad</h5>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="txt_nombreact"  name="txt_nombreact" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="txt_descripcionact" name="txt_descripcionact" required>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Contenido Multimedia</label>
                    <input class="form-control" type="file" name="archivos[]" id="archivos[]" multiple="" required>
                </div>


                <input type="submit" class="btn btn-primary" value="Crear" id="btn_buscar_usu">

                <div id="div_busqueda_usuarios">

                </div>


            </div>
        </div>
    </div>
