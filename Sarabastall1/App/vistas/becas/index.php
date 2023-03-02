<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Becas</li>
    </ol>
  </nav>

  <div class="container col-12 mt-3">
    <div class="row d-flex justify-content-center text-center mx-0 mt-3">
        <div class="col-12">
            <h1>Becas</h1>
        </div>
  
    </div>        
    <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
    <input class="btn btn-primary col-12 col-sm-8 col-md-8 col-lg-2 col-xl-1" type="button"  data-bs-toggle="modal" href="#exampleModalToggle" role="button"  value="Buscar">
      <a class="btn btn-primary bg-primary"  id="abrirModal"   href="<?php echo RUTA_URL?>/beca/add_becas">Añadir Beca</a>
      
    </div>
   
    <?php foreach ($datos["becas"] as $tipobeca): ?>
      
      <div class="shadow row bg-light mt-3">
        <div class="col-10 mt-3 mb-3">
          <h5 class="card-title">Becas <?php echo $tipobeca->NombreBeca?></h5> 
          <a href="<?php echo RUTA_URL?>/beca/ver_becas/<?php echo $tipobeca->idTipoBeca?>" class="btn btn-primary">Ver becas</a>
        </div>

        <div class="container col-1 d-flex justify-content-center align-items-center">

      </div>

      </div>
    <?php endforeach ?>
  </div>  
  














  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Busca becados entre dos años</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        
      <form class="" method="POST" action="<?php echo RUTA_URL?>/beca/ver_becados">
        <label>Año Inicio:</label>
        <select name="fechaini" class="form-select" size="1">
       
          <?php for($i=2017;$i<=3000;$i++){
            ?>
          
            <option value="<?php echo $i?>"><?php echo $i?></option>
          <?php
          }
        ?>
        </select>
        <label>Año Fin:</label>
    
        <select name="fechafin" size="1" class="form-select">
       
          <?php for($i=2017;$i<=3000;$i++){
            ?>
          
            <option value="<?php echo $i?>"><?php echo $i?></option>
          <?php
          }
        ?>
        </select>
        

      </div>
      <div class="modal-footer">
      <input class="btn btn-primary col-4" type="submit"  value="Buscar">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
    </div>
    </form>
  </div>
</div>

        </div>





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>