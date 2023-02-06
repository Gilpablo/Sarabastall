<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Beca</li>
    </ol>
  </nav>
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Beca</h1>
      </div>
  </div> 

  <!-- <?php if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div>
  <?php endif?> -->
  <form method="post">
    <div class="row">
      <div class="mb-3 col-4">
        <label for="nombre_as" class="form-label">Alumno</label>
        <select class="form-select" name="alumno_be" aria-label="Default select example">
        <?php foreach ($datos['alumno']as $alumno): ?>
  <option value="<?php echo $alumno->idPersona?>"><?php echo $alumno->Nombre?></option>

  <?php endforeach?>
</select>  
      </div>
      <div class="mb-3 col-4">
        <label for="dni_as" class="form-label">Nota media</label>
        <input type="number" class="form-control" id="importe_pr" name="notaMedia" max="10" required pattern="[0-9]+">   
      </div>

      <div class="mb-3 col-4">
        <label for="dni_as" class="form-label">Importe</label>
        <input type="number" class="form-control" id="importe_pr" name="importe_be" required pattern="[0-9]+">   
      </div>

      <div class="mb-3 col-6">
        <label for="titulo_as" class="form-label">Centro</label>
        <select class="form-select" name="centro_be" aria-label="Default select example">
        <?php foreach ($datos['centros']as $centro): ?>
  <option value="<?php echo $centro->idCentro?>"><?php echo $centro->NombreCentro?></option>
  
  <?php endforeach?>
</select>   
      </div>
      <div class="mb-3 col-6">
        <label for="titulo_as" class="form-label">Tipo de beca</label>
    
        <select class="form-select" id="tipoBeca" name="tipo_be" aria-label="Default select example">
        <?php foreach ($datos['tipoBeca']as $beca): ?>
  <option value="<?php echo $beca->idTipoBeca?>"><?php echo $beca->NombreBeca?></option>
  <?php endforeach?>
</select>
   

      </div>
      <div class="cedula mb-3 col-12  d-none" id="miinput">
      <label for="madrina_be" class="form-label">Madrina:</label>
      <select class="form-select" id="madrina_be" name="madrina_be" aria-label="Default select example">
      <option value="" selected >Seleccione madrina</option>
      <?php foreach ($datos['madrinas']as $madrina): ?>
        <option value="<?php echo $madrina->idPersona?>"><?php echo $madrina->Nombre?></option>
      <?php endforeach?>
      </select>
        </div>
      <div class="mb-3 col-12">
        <label for="dni_as" class="form-label">Observaciones</label>
        <textarea class="form-control" name="obs_be"></textarea>
      </div>
      <div class="mb-3 col-6">
        <label for="dni_as" class="form-label">Fecha inicio</label>
        <input type="date" class="form-control" id="importe_pr" name="fechaInicio_be" value="<?php echo date('Y-m-d') ?>">   
      </div>
      <div class="mb-3 col-6">
        <label for="dni_as" class="form-label">Fecha Fin</label>
        <input type="date" class="form-control" id="importe_pr" name="fechaFin_be" required>   
      </div>
      <div class="col-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-2">
        <a class="w-100 btn btn-danger btn-lg " href="<?php echo RUTA_URL ?>">Cancelar</a>
      </div>
    </div>  

  </form>
</div>

<script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"
  ></script>
  <script>
$('#tipoBeca').on('change',function(){
	var selectValor = $(this).val();
	if (selectValor == '2') {
			$('.cedula').removeClass('d-none');
	}else {
		$('#miinput').addClass('d-none');
	}
});
  </script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
