<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/usuario">Usuarios</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Usuario</li>
    </ol>
  </nav>
  <h5 class="text-center">Usuario: <?php echo $datos['usuario']->Nombre?></h5>

    <div class="row p-2">
        <div class="card">
          <div class="card-body">
            <form method="post" class="mb-5">
                <div class="row">
                  
                  <div class="mb-3 col-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['usuario']->Nombre?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input  type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $datos['usuario']->Apellido?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="genero" class="form-label">Genero</label>
                      <select name="genero" id="genero" class="form-control">
                        <option value=""><?php echo $datos['usuario']->Genero?></option>
                        <?php if ($datos['usuario']->Genero=="Masculino"):?>
                          <option value="Femenino">Femenino</option>
                        <?php else: ?> 
                        <option value="Masculino">Masculino</option>
                        <?php endif ?>
                      </select>    
                  </div>

                  <div class="mb-3 col-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $datos['usuario']->Telefono?>">    
                  </div>

                  <div class="mb-3 col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $datos['usuario']->Correo?>">
                  </div>

                  <div class="mb-3 col-6">
                    <label for="fecha_nacimiento" class="form-label">Fecha_Nacimiento</label>
                    <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" disabled value="<?php echo $datos['usuario']->Fecha_Nacimiento?>">   
                  </div>
                
                    <?php if (!$datos['usuario']->Tutor_Legal=='' || !$datos['usuario']->Curso_Actual=='' ||  !$datos['usuario']->Imagen=='' ):?>

                    <div class="mb-3 col-6">
                        <label for="tutor_legal" class="form-label">Tutor_Legal</label>
                        <input type="text" class="form-control" id="tutor_legal" name="tutor_legal"  value="<?php echo $datos['usuario']->Tutor_Legal?>">   
                    </div>

                    <div class="mb-3 col-6">
                        <label for="curso_actual" class="form-label">Curso_Actual</label>
                        <input type="text" class="form-control" id="curso_actual" name="curso_actual"  value="<?php echo $datos['usuario']->Curso_Actual?>">   
                    </div>

                    <div class="mb-3 col-6">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="text" class="form-control" id="imagen" name="imagen"  value="<?php echo $datos['usuario']->Imagen?>">   
                    </div>

                    <?php endif?>
                 
                
                  <div class="col-9">
                    <button type="submit" class=" w-100 btn btn-success btn-lg">Modificar</button>
                  </div>
                  <div class="col-3">
                    <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/usuario">Atrás</a>
                  </div>
                </div>  
            </form>
          </div>
      
      
        
    </div>
     
                
</div>


