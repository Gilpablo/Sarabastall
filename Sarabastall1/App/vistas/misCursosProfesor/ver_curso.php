<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/MiCursoProfesor">Cursos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Curso</li>
    </ol>
</nav>


<div class="container mt-4 ">

    <div class="row mb-5 g-0 pt-2">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <h4> Materiales </h4>
        </div>  
    </div>

    <div class="col-2 offset-10 d-flex align-items-center mb-2">
        <a class="newFile d-flex align-items-center" href=""> &nbsp &nbsp &nbsp &nbsp Subir Archivo &nbsp <i class="bi bi-file-earmark-arrow-up fs-4"></i> </a>
    </div>  
    <div class="shadow col-12">
        <?php foreach($datos['material'] as $material): ?>
            <div class="row bg-light g-0 ps-4 pt-3 pe-4 col-12">
                <div class="d-flex">
                    <a href="" class="d-flex align-items-center col-10"> <i class="bi bi-file-earmark-arrow-down fs-4"></i> &nbsp &nbsp <?php echo $material->Nombre ?> </a>
                    <button type="submit" class="archivo btn btn-outline-warning" onclick="pasarDatos('<?php echo $material->idMaterial; ?>', '<?php echo $material->Nombre; ?>')"> 
                        <i class="bi bi-pencil-square"></i> 
                    </button>
                    <button type="submit" class="borrar btn btn-outline-danger" onclick="pasarDatosBorrar('<?php echo $material->idMaterial; ?>', '<?php echo $material->Nombre; ?>')"> 
                        <i class="bi bi-trash"></i>
                    </button>
                        <a type="submit" class="btn btn-outline-success" href="<?php echo RUTA_URL?>/archivos_cliente/<?php echo $material->Nombre;?>" download="<?php echo $material->Nombre;?>" target="_blank">
                        
                        <i class="bi bi-download"></i> 
                        </a>
                    </form>
                </div>
                <hr class="mt-3">
            </div>
        <?php endforeach ?>
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

                <form method="post" enctype="multipart/form-data" action='<?php echo RUTA_URL?>/miCursoProfesor/anadirMateriales/<?php echo $datos['id_Curso'] ?>'>
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
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="modificar" value="Modificar Archivo" formaction="<?php echo RUTA_URL?>/miCursoProfesor/mod_archivo/<?php echo $datos['id_Curso'] ?>">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal-borrar">
    <div class="container">
        <div class="modal-dialog w-100">
            <div class="modal-content w-100 px-0 mx-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar Archivo</h5>
                    <button type="button" class="archivo-close btn-close" aria-label="Close"></button>
                </div>
                <form method="post"> 
                    <div class="modal-footer">
                        <input type="text" class="form-control d-none" id="id_Material_borrar" name="id_Material" value="">
                        <input type="text" class="form-control d-none" id="nombre_archivo_borrar" name="Nombre" value="">
                        <input type="submit" class="btn btn-danger" id="buttonDel" name="borrar" value="Borrar" onclick="confirmarDel()" formaction="<?php echo RUTA_URL?>/miCursoProfesor/del_archivo/<?php echo $datos['id_Curso'] ?>">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
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



    // +++++++++++++++ MODAL MODIFICAR ARCHIVO +++++++++++++++++
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

            //Oculta modal
            modalArchivo.classList.remove('modal--show');

        });
    });



    // +++++++++++++++ MODAL BORRAR ARCHIVO +++++++++++++++++
    const modalBorrar = document.querySelector('.modal-borrar');
    const closeModalBorrar = document.querySelectorAll('.archivo-close');
    const openModalBorrar = document.querySelectorAll('.borrar');

    function pasarDatosBorrar($archivoId, $archivoNombre){

        console.log($archivoId);
        console.log($archivoNombre);

        let modalId = document.querySelector('#id_Material_borrar');
        modalId.setAttribute("value", $archivoId);

        let modalNombre = document.querySelector('#nombre_archivo_borrar');
        modalNombre.setAttribute("value", $archivoNombre);
        modalNombre.innerHTML = $archivoNombre;
        
    }

    openModalBorrar.forEach(item => {
        item.addEventListener('click', (e)=> {

            e.preventDefault(); 

            // Enseña modal
            modalBorrar.classList.add('modal--show');

        });
    });

    closeModalBorrar.forEach(item => {
        item.addEventListener('click', (e)=> {

            e.preventDefault(); 

            //Reinicia la confirmacion de borrado
            buttonDel = document.querySelector("#buttonDel");
            buttonDel.setAttribute("value", "Borrar");
            buttonDel.setAttribute("onclick", "confirmarDel()");  
            buttonDel.disabled = false;

            //Oculta modal
            modalBorrar.classList.remove('modal--show');

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

</script>