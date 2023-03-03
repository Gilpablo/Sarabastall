<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
      
            <div style="background-color:rgba(235,236,240,255);" class="col-xl-11 col-11 col-sm-10 col-xs-6 col-md-10 col-lg-10"    >
                <div class="col-container d-flex justify-content-center">
                    <div class="col-12 g-0 ">
                        <div class="col-12 d-flex mt-5">
                            <div class="col-5 d-flex justify-content-start mt-5" >
                                <h5 class="text-center p-2 ps-0"> Material </h5>
                            </div>
                            <!-- <div class="col-5 d-flex justify-content-start mt-5" >
                                <h5 class="text-center p-2 ps-0"> Dropdown de cursos </h5>
                            </div> -->
                            <div class="col-2 offset-5 mt-2 d-flex justify-content-end mt-5">
                                <a href="#" class="newFile text-reset"> <img id="icono" src="img/nuevo-documento.png"> </a>
                            </div>
                        </div>
                        <div class="drag-area d-flex justify-content-center align-items-center h-100 col-12 bg-light border border-1 border-secondary flex-wrap" id="contenedorArchivos">
                        
                        <?php if ($datos['materiales'] != null): ?>
                                <?php foreach ($datos['materiales'] as $material): ?>
                                    <?php echo "<div onclick=\"pasarDatos('$material->idMaterial', '$material->Nombre')\" class='archivo d-flex flex-column justify-content-center px-1'>" ?>
                                        <?php echo "<img id='iconoArchivo' class='d-block justify-content-center mx-auto' src='img/archivoimg.png' </img>" ?>
                                        <?php echo "<p> $material->Nombre </p>" ?>
                                    <?php echo "</div>" ?>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?php echo 'Arrastra un archivo AQUI' ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal">
            <div class="container">
                <div class="modal-dialog w-100">
                    <div class="modal-content w-100 px-0 mx-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                            <button type="button" class="modal-close btn-close" aria-label="Close"></button>
                        </div>

                        <form method="post" enctype="multipart/form-data" action="<?php echo RUTA_URL ?>/archivo/add_archivos">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Archivo:</label>
                                    <input type="file" class="form-control" id="material" name="material">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="mat_renombre" name="mat_renombre"></input>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Subir Archivo</button>
                            </div> 
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal-archivo">
            <div class="container">
                <div class="modal-dialog w-100">
                    <div class="modal-content w-100 px-0 mx-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar Archivo</h5>
                            <button type="button" class="archivo-close btn-close" aria-label="Close"></button>
                        </div>

                        <form method="post">
                            <div class="modal-body">
                                <label for="message-text" class="col-form-label">Nombre:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control d-none" id="id_Material" name="id_Material" value="">
                                    <input type="text" class="form-control d-none" id="mod_nombre_original" name="mod_nombre_original" value="">
                                    <input type="text" class="form-control" id="mod_nombre" name="mod_nombre" value="">
                                </div>
                                <a href=>
                                    <input type="submit" class="btn btn-primary" value="Descargar" formaction="<?php echo RUTA_URL?>/archivo/get_archivo">
                                </a>
                            </div>
                            <div class="modal-footer">

                                <input type="submit" class="btn btn-danger" id="buttonDel" name="borrar" value="Borrar" onclick="confirmarDel()" formaction="<?php echo RUTA_URL?>/archivo/del_archivo">
                                <input type="submit" class="btn btn-success" name="modificar" value="Modificar Archivo" formaction="<?php echo RUTA_URL?>/archivo/mod_archivo">

                            </div> 
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    // +++++++++++++++ MODAL AÑADIR ARCHIVO +++++++++++++++++
    // Recoge la clase del boton para abrir el modal
    const openModal = document.querySelector('.newFile');

    // Recoge la clase del modal
    const modal = document.querySelector('.modal');

    // Recoge la clase del boton para cerrar el modal
    const closeModal = document.querySelector('.modal-close');

    // Escuchar cuando se clickee el boton
    openModal.addEventListener('click', (e)=>{

        
        e.preventDefault();
        
        //Añade la clase "modal--show" a "modal" que hace visible el modal
        modal.classList.add('modal--show');

    });

    // Escuchar cuando se clickee el boton
    closeModal.addEventListener('click', (e)=> {

        e.preventDefault();

        //Borra la clase "modal--show" de "modal" que hace que cierre/oculte el modal
        modal.classList.remove('modal--show');

    });

    // +++++++++++++++ MODAL VER ARCHIVO +++++++++++++++++
    const modalArchivo = document.querySelector('.modal-archivo');
    const closeModalArchivos = document.querySelectorAll('.archivo-close');
    const openModalArchivos = document.querySelectorAll('.archivo');

    function pasarDatos($archivoId, $archivoNombre){

        console.log($archivoId);
        console.log($archivoNombre);

        let modalId = document.querySelector('#id_Material');
        modalId.setAttribute("value", $archivoId);

        let modalNombre = document.querySelector('#mod_nombre');
        let modalNombreOriginal = document.querySelector('#mod_nombre_original');
        modalNombre.setAttribute("value", $archivoNombre);
        modalNombreOriginal.setAttribute("value", $archivoNombre);

    }

    openModalArchivos.forEach(item => {
        item.addEventListener('click', (e)=> {

            e.preventDefault(); 

            //Pone el nombre del archivo 
            ModificarNombre = document.querySelector("#mod_nombre");
            NombreOriginal = document.querySelector("#mod_nombre_original");
            ModificarNombre.value = NombreOriginal.value;

            // Enseña modal
            modalArchivo.classList.add('modal--show');

        });
    });

    closeModalArchivos.forEach(item => {
        item.addEventListener('click', (e)=> {

            e.preventDefault(); 

            // Reinicia la confirmacion de borrado
            buttonDel = document.querySelector("#buttonDel");
            buttonDel.setAttribute("value", "Borrar");
            buttonDel.setAttribute("onclick", "confirmarDel()");  
            buttonDel.disabled = false;

            //Oculta modal
            modalArchivo.classList.remove('modal--show');

        });
    });

    // funcion para confirmar borrado de archivo
    function confirmarDel() {

        buttonDel = document.querySelector("#buttonDel");
        
        buttonDel.setAttribute("value", "¿Está seguro?");
        buttonDel.disabled = true
        
        buttonDel.removeAttribute("onclick");   

        setTimeout(() => {
            buttonDel.disabled = false
        }, 2000);
        
    }

    function getId() {

        id = document.querySelector("")


    }
</script>    

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<?php //include 'inc/footer.php'?>