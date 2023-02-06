<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container col-12 mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Becas</li>
    </ol>
  </nav>

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
          <h1>Becas</h1>
      </div>
  </div>        
  <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary bg-primary"  id="abrirModal"   href="<?php echo RUTA_URL?>/becas/add_becas">Añadir Beca</a>
  </div>

  <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary bg-primary"  id="abrirModal"   href="<?php echo RUTA_URL?>/prestamos/add_prestamo">Añadir Prestamo</a>
  </div> -->
  
  
  
  <?php foreach ($datos["becas"] as $tipobeca): ?>
    
  
  
    <div class="row bg-light mt-3 border border-dark">
  <div class="col-10 mt-3 mb-3">
    <h5 class="card-title">Becas <?php echo $tipobeca->NombreBeca?></h5> 
   <a href="<?php echo RUTA_URL?>/becas/ver_becas/<?php echo $tipobeca->idTipoBeca?>" class="btn btn-primary">Ver becas</a>
  
  </div>

  <div class="container col-1 d-flex justify-content-center align-items-center">

  </div>

</div>
<?php endforeach ?>
  




















<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>