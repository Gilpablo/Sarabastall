<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<div class="container col-12 mt-3">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/beca">Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Becas</li>
    </ol>
  </nav>

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">

          <h1><?php echo $datos['tipoBeca']->NombreBeca?></h1>
      </div>
  </div>        

  <table class="table table-hover">
    
  <thead>
      <tr class="text-light bg-dark">
   
        <th scope="col">Alumno</th>
        <th scope="col">Importe</th>
        <th scope="col">Fecha Inicio</th>
        <th scope="col">Fecha Fin</th>
        
        <th scope="col">Centro</th>
        <th scope="col">Nota Media</th>
        <?php if($datos['tipoBeca']->NombreBeca=="Carrera"):?>
        <th scope="col">Madrina</th>
        <?php endif?>
        <th scope="col">Acciones</th>
      
      </tr>
  
    <tbody>
      <?php foreach ($datos['beca']as $beca): ?>
        <tr class="bg-light">
        <td><?php echo $beca->Nombre ?></td>
        <td><?php echo $beca->Importe ?>€</td>
        <td><?php echo $beca->Fecha_Inicio ?></td>
        <td><?php echo $beca->Fecha_Fin ?></td>
        <td><?php echo $beca->NombreCentro ?></td>
        <td><?php echo $beca->NotaMedia_Alumno ?></td>
        <?php if($datos['tipoBeca']->NombreBeca=="Carrera"):?>
        <?php foreach ($datos['madrina']as $madrina): ?>
          <td><?php echo $madrina?></td>
          <?php endforeach?>
          <?php endif?>
        <td class="">
        <a class="w-sm-100 btn btn-outline-success btn-lg" href="<?php echo RUTA_URL?>/beca/ver_beca/<?php echo $beca->idBeca ?>"><i class="bi bi-pencil-square"></i></a>

       
        
          
        <button type="button" onclick="validar_borrar(<?php echo $beca->idBeca ?>,<?php echo $datos['tipoBeca']->idTipoBeca?>)" 
        data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-sm-100  btn btn-outline-danger btn-lg"><i class="bi-trash"></i>
       
      </button>
      
        </td>
     

        <tr class="bg-light ">
            
            <td colspan="12">
            <span class="text-dark bagde-info rounded-pill fw-bold">Observaciones:</span><p><?php echo $beca->Observaciones?></p>
            </td>
      </tr>

    <?php endforeach?>
    </tbody>
  </table>

</div>
<div class="modal face" id="modalCerrarAccion" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCerrarAccionLabel">
          ¿Seguro que quieres eliminar la beca?
        
        </h5>
      </div>
      <div class="modal-footer">
      
        <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/beca/eliminar_beca/<?php echo $beca->idBeca ?>">
          <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <input type="hidden" id="idBeca" name="idBeca">
          <input type="hidden" id="tipoBeca" name="tipoBeca">
        </form>
      </div>
    </div>
  </div>
</div>







<script>
  function validar_borrar(idBeca,idTipoBeca){

    document.getElementById("idBeca").value= idBeca;
    document.getElementById("tipoBeca").value= idTipoBeca;
  }

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>