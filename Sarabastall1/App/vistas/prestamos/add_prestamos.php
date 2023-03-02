<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/prestamo">Prestamos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir prestamo</li>
    </ol>
  </nav>
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Prestamo</h1>
      </div>
  </div> 

  <?php if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div>
  <?php endif?>
  <form method="post">
    <div class="row">
      <div class="mb-3 col-12">
        <label for="nombre_as" class="form-label">Titulo Prestamo</label>
        <input type="text" class="form-control" id="titulo_pr" name="titulo_pr" required>   
      </div>

      <div class="mb-3 col-12">
        <label for="dni_as" class="form-label">Importe</label>
        <input type="text" class="form-control" id="importe_pr" name="importe_pr" required pattern="[0-9]+">   
      </div>

      <div class="mb-3 col-12">
        <label for="titulo_as" class="form-label">Para persona</label>
        <input type="text" class="form-control" id="persona_pr" name="persona_pr" >   
      </div>

      <div class="mb-3 col-12">
        <label for="titulo_as" class="form-label">Fecha Vencimiento</label>
        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" >   
      </div>

      <div class="col-8 col-sm-8 col-md-8 col-lg-10 col-xl-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <a class="w-100 btn btn-danger btn-lg " href="<?php echo RUTA_URL ?>/prestamo">Cancelar</a>
      </div>
    </div>  
  </form>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
