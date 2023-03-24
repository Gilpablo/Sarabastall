<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php'; ?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/curso">Curso</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Curso</li>
    </ol>
  </nav>
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Curso</h1>
      </div>
  </div> 

  <?php 

  if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div>
  <?php endif?>
  <div class="shadow card1 p-3">
  <form method="post" name="formulario" onsubmit="return validarFormulario()">
    <div class="row">
      <div class="mb-3 col-6">
        <label for="nombre_cu" class="form-label">Nombre Curso</label>
        <input type="text" class="form-control" id="nombre_cu" name="nombre_cu" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="importe_cu" class="form-label">Importe</label>
        <input type="number" class="form-control" id="importe_cu" name="importe_cu" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="fechaIni_cu" class="form-label">Fecha Inicio</label>
        <input type="date" class="form-control" id="fechaIni_cu" name="fechaIni_cu" min="" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="fechaFin_cu" class="form-label">Fecha Fin</label>
        <input type="date" class="form-control" id="fechaFin_cu" name="fechaFin_cu" onblur="validarFecha(this)" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="instructor_cu" class="form-label">Instructor</label>
        <select class="form-control"name="instructor_cu" id="instructor_cu" required>
            <option value="0">Seleccione un instructor...</option>
            <?php foreach ($datos["instructores"] as $instructor): ?>

            <option value="<?php echo $instructor->idPersona;?>"><?php echo $instructor->Nombre . " " . $instructor->Apellido;?></option>

            <?php endforeach?>
        </select>
      </div>

      <div class="mb-3 col-6">
        <label for="especialidad_cu" class="form-label">Especialidad</label>
        <select class="form-control"name="especialidad_cu" id="especialidad_cu" required>
            <option value="0">Seleccione una especialidad...</option>
            <?php foreach ($datos["especialidad"] as $especialidad): ?>

              <option value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->Nombre;?></option>

            <?php endforeach?>
        </select>  
      </div>
    
      <div class="col-8 col-sm-8 col-md-8 col-lg-10 col-xl-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL?>/curso">Cancelar</a>
      </div>
    </div>  
  </form>
</div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<script>
function validarFecha(fecha) {
    var fechaIni=document.getElementById('fechaIni_cu').value;
    var fechafinal=fecha.value;

    if (fechafinal>=fechaIni) {
        fecha.style = "border: 1px solid green;";
        return true;
    } else {
        fecha.style = "border: 1px solid red;";
        return false;
    }
}
function validarFormulario() {
    event.preventDefault();

    var fecha = document.getElementById('fechaFin_cu');
    var f = validarFecha(fecha);

    if (f) {
        document.formulario.submit();
    }else{
      alert("Formato Incorrecto");
    }
}
</script>