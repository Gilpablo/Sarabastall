<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/ciudad">Ciudades</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Ciudad</li>
    </ol>
  </nav>
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Ciudad</h1>
      </div>
  </div> 
<div class="shadow card1 p-4">
  <?php if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div> 
  <?php endif?>
  <form method="post" name="formulario"> 
    <div class="row">
      <div class="mb-3 col-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>   
      </div>
      <div class="col-8 col-sm-8 col-md-8 col-lg-10 col-xl-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/ciudad">Cancelar</a>
      </div>
    </div>  
  </form>
</div>    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>