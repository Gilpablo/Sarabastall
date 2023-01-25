<?php include 'inc/header_inicio_sesion.php'?>
        
            <div style="background-color:rgba(235,236,240,255);" class="col-xl-11 col-12 col-sm-10 col-xs-6 col-md-10 col-lg-10"    >
                <div class="container  ">
                    <div class="col-10 offset-1">
                        <div class="col-12 d-flex mt-5">
                            <div class="col-6 d-flex justify-content-start mt-5" >
                                <h5 class="text-center p-2 ps-0"> Mis Archivos </h5>
                            </div>





                            <div class="col-1 offset-4 mt-2 d-flex justify-content-end mt-5">
                                <a id="newDocument" href="#" class="text-reset"> <img id="icono" src="img/nuevo-documento.png"> </a>
                            </div>




                            <div class="col-1 mt-2 d-flex justify-content-end mt-5">
                                <a href="#" class="text-reset"> <img id="icono" src="img/agregar-carpeta.png"> </a>
                            </div>
                        </div>
                        <div class="upload-container col-12 bg-light ">
                            <div class="border-container border border-1 border-secondary">
                                <!-- CAMBIAR URGENTE LOS BR PERO NO SE COMO SE HACE XD -->
                                <br> <br> <br> <br> <br> <br>
                                <div class="d-flex justify-content-center">
                                    <p class=""> Arrastra un archivo AQUI </p>
                                </div>
                                <br> <br> <br> <br> <br> <br> 
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="col-4 col-xl-9 col-md-7 col-sm-6 mt-2 d-flex justify-content-end" >
                                <button type="button" class="btn btn-danger"> Cancelar </button>
                            </div>
                            <div class="col-8 col-xl-3 col-md-5 col-sm-6 mt-2 d-flex justify-content-end">
                                <button type="button" class="btn btn-success"> Guardar Cambios </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <section class="modal">
        <div class="container modal-container">
            <div class="modal-header d-flex col-12">
                <h2 class="modal-title col-10"> Selección de archivos </h2>
                <button type="button" class="btn btn-outline-secondary border border-secondary modal-close"> X </button>
            </div>

            <label for="basic-url" class="form-label pb-0 mb-0"> Archivo </label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>

            <label for="basic-url" class="form-label pb-0 mb-0"> Guardar como </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>

            <label for="basic-url" class="form-label pb-0 mb-0"> Autor </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

                <button type="button" class="btn btn-success"> Subir archivo</button>
            
            </div>
        </div>
    </section>


<?php include 'inc/footer.php'?>
