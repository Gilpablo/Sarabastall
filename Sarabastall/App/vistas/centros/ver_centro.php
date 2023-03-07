<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/centro">Centros</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Centro</li>
    </ol>
  </nav>
  
  <h5 class="text-center">Centro: <?php echo $datos['centro']->NombreCentro?></h5>

    <div class="row p-2">
        <div class="card">
          <div class="card-body">
            <form method="post" class="mb-5">
                <div class="row">
                  
                  <div class="mb-3 col-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['centro']->NombreCentro?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="distancia" class="form-label">Distancia</label>
                    <input  type="text" class="form-control" id="distancia" name="distancia" value="<?php echo $datos['centro']->Distancia?>">   
                  </div>  
                  
                  <div class="mb-3 col-6">
                    <label for="ciudad" class="form-label">Ciudad</label>
                      <select name="ciudad" id="ciudad" class="form-control">
                        <option value="<?php echo $datos['centro']->idCiudad?>"><?php echo $datos['centro']->NombreCiudad?></option>
                        <?php foreach ($datos["nombreCiudad"] as $ciudad): ?>

                            <?php if($datos["centro"]->idCiudad == $ciudad->idCiudad): ?>

                            
                            <?php else: ?>

                            <option value="<?php echo $ciudad->idCiudad;?>"><?php echo $ciudad->Nombre?></option>
                            <?php endif ?>

                        <?php endforeach?>
                      </select>    
                  </div>
                
                  <div class="col-9">
                    <button type="submit" class=" w-100 btn btn-success btn-lg">Modificar</button>
                  </div>
                  <div class="col-3">
                    <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/centro">Atrás</a>
                  </div>
                </div>  
            </form>
          </div>
      
      
        
    </div>
     
                
</div>