<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';  ?>


<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/curso">Curso</a></li>
            <li class="breadcrumb-item active" aria-current="page">Añadir Aprendices</li>
        </ol>
    </nav>
    
    <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Aprendices</h1>
      </div>
    </div> 

    <h3 class="text-center">Curso: <?php echo $datos["datosCurso"]->Nombre?></h5>



    <div class="row p-5">

        <div class="card">

            <div class="card-body">

                <div class="row">
        
                    <div class="mb-3 col-5">
                        
                        <h5>Lista aprendices inscritos</h5>

                        <form action="" method="post">

                            <?php if (empty($this->datos["aprendicesCurso"])): ?>
                                
                                <p>No hay aprendices inscritos en este curso</p>
                                    
                            <?php else: ?>
                                <?php  foreach ($this->datos["aprendicesCurso"] as $aprendizCurso): ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0" type="checkbox" name="idPersona[]>" value="<?php echo $aprendizCurso->idPersona?>" aria-label="Checkbox for following text input">
                                        </div>
                                        <input type="text" class="form-control" style="background-color:white" disabled aria-label="Text input with checkbox" value="<?php echo $aprendizCurso->Nombre. " ". $aprendizCurso->Apellido ;?>">
                                    </div>
                                <?php endforeach ?>

                                <input type="submit" class="btn btn-danger col-12" name="boton" value="Eliminar">
                                
                            <?php endif ?>

                        </form>

                    </div>

                    <div class="mb-3 col-5 offset-2">
                        
                        <h5>Lista aprendices no inscritos</h5>
                        <form action="" method="post">
                            <?php if (empty($this->datos["aprendices"])) : ?>

                                <p>No quedan más aprendices por inscribir en este curso</p>

                            <?php else: ?>

                                <?php  foreach ($this->datos["aprendices"] as $aprendiz): ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0" type="checkbox" name="idPersona[]>" value="<?php echo $aprendiz->idPersona?>" aria-label="Checkbox for following text input">
                                        </div>
                                        <input type="text" class="form-control" style="background-color:white" disabled aria-label="Text input with checkbox" value="<?php echo $aprendiz->Nombre. " ". $aprendiz->Apellido ;?>">
                                    </div>
                                <?php endforeach ?>

                                
                                <input type="submit"  class="btn btn-success col-12" name="boton" value="Añadir">
                                                    
                            <?php endif ?>

                        </form>

                        

                    </div>
                    
                </div>
                
            </div>

        </div>

        <div class="">

            <a href="<?php echo RUTA_URL?>/curso"  class="btn btn-success col-6">Volver</a> 

        </div>

    </div>

    



    

</div>