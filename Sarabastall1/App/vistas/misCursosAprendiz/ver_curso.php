<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/MiCursoAprendiz">Cursos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Curso</li>
    </ol>
</nav>


<div class="container mt-4 ">

    <div class="row mb-5 g-0 pt-2">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <h4> Materiales </h4>
        </div>  
    </div>
    <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [10])):?>
        <div class="col-2 offset-8 d-flex align-items-center mb-2">
            <a class="newFile d-flex align-items-center" href=""> &nbsp &nbsp &nbsp Subir Archivo &nbsp <i class="bi bi-file-earmark-arrow-up fs-4"></i> </a>
        </div>  
    <?php endif ?>
    <div class="shadow col-12">
        <?php foreach($datos['material'] as $material): ?>
            <div class="row bg-light g-0 ps-4 pt-3 pe-4 col-12">
                <div class="d-flex">
                    <a href="" class="d-flex align-items-center col-10"> <i class="bi bi-file-earmark-arrow-down fs-4"></i> &nbsp &nbsp <?php echo $material->Nombre ?> </a>
                    <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [10])):?>
                        <!-- <button type="submit" class="archivo btn btn-outline-warning" onclick="pasarDatos('<?php echo $material->idMaterial; ?>', '<?php echo $material->Nombre; ?>')"> 
                            <i class="bi bi-pencil-square"></i> 
                        </button>
                        <button type="submit" class="borrar btn btn-outline-danger" onclick="pasarDatosBorrar('<?php echo $material->idMaterial; ?>', '<?php echo $material->Nombre; ?>')"> 
                            <i class="bi bi-trash"></i>
                        </button> -->
                    <?php endif ?>
                    <a type="submit" class="btn btn-outline-success" href="<?php echo RUTA_URL?>/archivos_cliente/<?php echo $material->Nombre;?>" download="<?php echo $material->Nombre;?>" target="_blank">
                            <i class="bi bi-download"></i> 
                        </a>
                </div>
                <hr class="mt-3">
            </div>
        <?php endforeach ?>
    </div>

</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>