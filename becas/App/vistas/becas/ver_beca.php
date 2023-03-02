<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container mt-3">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php ECHO RUTA_URL ?>/becas/ver_becas/<?php echo $datos["becas"]->idTipoBeca?>">Ver Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar Beca</li>
    </ol>
  </nav>
 
  
  <h1 class="text-center">Beca <?php echo $datos['becas']->NombreBeca?>: <?php echo $datos['becas']->Nombre?>  </h1>

      <div class='row'>
       
        <div class="container card col-12">

              <form class="my-3" method='post'  class='mb-5'>
              <div class="row">
      <div class="mb-3 col-4">
        <label for="nombre_as" class="form-label">Importe beca</label>
        <input  type="number"  class="form-control" id="importe_be" name="importe_be" value="<?php echo $datos['becas']->Importe ?>">   
      </div>

      <div class="mb-3 col-4">
        <label for="dni_as" class="form-label">Nota media</label>
        <input type="number" class="form-control"  required pattern="[0-9]+" max="10" id="dni_as" name="notaMedia" value="<?php echo $datos['becas']->NotaMedia_Alumno ?>">   
      </div>

      <div class="mb-3 col-4">
        <label for="titulo_as" class="form-label">Centro</label>
        <select class="form-select" name="centro_be" aria-label="Default select example">
        <?php foreach ($datos['centros']as $centro): ?>
  <option value="<?php echo $centro->idCentro?>"><?php echo $centro->NombreCentro?></option>
  
  <?php endforeach?>
</select>   
      </div>
      <div class="mb-3 col-12">
        <label for="dni_as" class="form-label">Observaciones</label>
        <textarea class="form-control" name="obs_be"><?php echo $datos["becas"]->Observaciones?></textarea>
      </div>
      <div class="col-7 col-sm-4mb-3">
        <button type="submit"  class=" w-100 btn btn-success btn-lg">Modificar</button>
      </div>
      
      <div class="col-5">
        <a class="w-100 btn btn-danger btn-lg" href="<?php ECHO RUTA_URL ?>/becas/ver_becas/<?php echo $datos["becas"]->idTipoBeca?>">Cancelar</a>
      </div>
      <input type="hidden" name="tipoBeca" value="<?php echo $datos["becas"]->idTipoBeca?>">
    </div> 
    </form>
        </div>
        </div>
        </div>
        
                
                  
  
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
