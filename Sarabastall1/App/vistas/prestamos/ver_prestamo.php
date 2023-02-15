<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<?php
  $estadoFormulario="";
  if($datos['prestamo']->id_estado ==1){
    $estadoFormulario="disabled";
  }
?>
<div class="container mt-3">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/prestamo">Prestamos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Prestamo</li>
    </ol>
  </nav>
   
  <h1 class="text-center">Prestamo: <?php echo $datos['prestamo']->Titulo?></h1>

      <div class='row'>
        
        <div class='col-md-7'>
          <div class="card">
            <div class="card-body">
              <form method="post" action="<?php echo RUTA_URL?>/prestamo/add_accion">
              <input type="hidden" name="idPrestamo" value="<?php echo $datos['prestamo']->idPrestamo?>">

                  <div class="mb-3 col-12">
                    <label for="accion" class="form-label">Añadir nuevo pago</label>
                    <input type="text" class="form-control mb-3"  required pattern="[0-9]+" <?php echo $estadoFormulario?> id="titulo_pr" name="Importe">  
                    <div class="col-6 col-md-6 col-xl-2 col-sm-6">
                      <button type="submit" <?php echo $estadoFormulario?> class=" w-100 btn btn-success btn-lg ">Añadir</button>
                    </div>  
                  </div>
                
              </form>


              <form method='post'  class='mb-5'>
              <div class="row">
                <div class="mb-3 col-6">
                  <label for="nombre_as" class="form-label">Titulo Prestamo</label>
                  
                  <?php //print_r($datos["prestamo"]->idMovimiento)?>
                  <input  type="text" <?php echo $estadoFormulario?> class="form-control" id="nombre_as" name="Titulo" value="<?php echo $datos['prestamo']->Titulo ?>">   
                </div>

                <div class="mb-3 col-6">
                  <label for="dni_as" class="form-label">Importe</label>
                  <input type="number" class="form-control" <?php echo $estadoFormulario?> required pattern="[0-9]+" id="dni_as" name="Importe" value="<?php echo $datos['prestamo']->Importe ?>">   
                </div>

                <div class="col-7 col-sm-4mb-3">
                  <button type="submit" <?php echo $estadoFormulario?> class=" w-100 btn btn-success btn-lg">Modificar</button>
                </div>
                
                <div class="col-5">
                  <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/prestamo">Atrás</a>
                </div>
                <div class="col-12">
                <?php if($datos['prestamo']->id_estado !=1):?>
                  <button type="button" onclick="validar_cerrar(<?php echo $datos['prestamo']->idPrestamo ?>)" 
                    data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-100 btn btn-warning btn-lg mt-3">Cerrar Prestamo
                  </button>
                <?php endif?>  
                </div>
            
              </div> 
              </form>
          </div>
      </div>
  </div>
    <div class='col-md-5 bg-light'>
      <h2>Pagos realizados:</h2>
        
        <?php foreach ($datos["prestamo"]->acciones as $accion): ?> 
          
          <div class="card-header"> <?php echo $accion->Fecha_Abonado?></div>
          <div class="card-body">
            <h5 class="card-title">  <?php echo $accion->Cantidad?>€</h5>
          </div>
        <?php endforeach ?>
    </div> 
                
                  
  
</div>
<div class="modal face" id="modalCerrarAccion" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCerrarAccionLabel">
          ¿Estas seguro que quieres cerrar la Asesoria?
        </h5>
      </div>
      <div class="modal-footer">
        <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/prestamo/cerrar_prestamo">
      
          <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cancelar</button>
         
           
          <button type="submit" class="btn btn-warning">Cerrar Prestamo</button>
           
          <input type="hidden" id="idPrestamo" name="idPrestamo">
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function validar_cerrar(idPrestamo){
    document.getElementById("idPrestamo").value= idPrestamo;
  }
</script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>