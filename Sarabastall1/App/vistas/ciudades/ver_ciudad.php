<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/ciudad">Ciudades</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Ciudad</li>
    </ol>
  </nav>
  
  <h5 class="text-center">Ciudad: <?php echo $datos['ciudad']->Nombre?></h5>

    <div class="row p-2">
        <div class="card shadow">
          <div class="card-body">
            <form method="post" class="mb-5">
                <div class="row">
                  
                  <div class="mb-3 col-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['ciudad']->Nombre?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input  type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $datos['ciudad']->Cantidad?>">   
                  </div>            
                
                  <div class="col-9">
                    <button type="submit" class=" w-100 btn btn-success btn-lg">Modificar</button>
                  </div>
                  <div class="col-3">
                    <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/ciudad">Atrás</a>
                  </div>
                </div>  
            </form>
          </div>
      
      
        
    </div>
     
                
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>