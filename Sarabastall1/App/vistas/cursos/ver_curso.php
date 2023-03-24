<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/curso">Curso</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Curso</li>
    </ol>
  </nav>
  <h5 class="text-center">Curso: <?php echo $datos["datosCurso"]->Nombre?></h5>
    <div class="row">
      <div class="col-md-12"> 
        <div class="card">
          <div class="card-body">
            <form method="post" class="mb-5"  name="formulario" onsubmit="return validarFormulario()">
                <div class="row">
                  
                  <div class="mb-3 col-6">
                    <label for="nombre_cu" class="form-label">Nombre</label>
                    <input  type="text" class="form-control" id="nombre_cu" name="nombre_cu" value="<?php echo $datos["datosCurso"]->Nombre?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="importe_cu" class="form-label">Importe</label>
                    <input  type="text" class="form-control" id="importe_cu" name="importe_cu" value="<?php echo $datos["datosCurso"]->Importe?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="fechaIni_cu" class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fechaIni_cu" name="fechaIni_cu" value="<?php echo $datos["datosCurso"]->Fecha_Inicio?>">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="fechaFin_cu" class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" id="fechaFin_cu" name="fechaFin_cu" value="<?php echo $datos["datosCurso"]->Fecha_Fin?>" onblur="validarFecha(this)">   
                  </div>

                  <div class="mb-3 col-6">
                    <label for="instructor_cu" class="form-label">Instructor</label>
                    <select class="form-control"name="instructor_cu" id="instructor_cu">
                        <option value="0" disabled>Seleccione un instructor...</option>
                        <?php foreach ($datos["instructores"] as $instructor): ?>
                                                 
                          <?php if($datos["datosCurso"]->Instructor_idPersona == $instructor->idPersona): ?>
                          
                            <option selected value="<?php echo $instructor->idPersona;?>"><?php echo $instructor->Nombre . " " . $instructor->Apellido;?></option>
                          
                          <?php else: ?>
                            
                            <option value="<?php echo $instructor->idPersona;?>"><?php echo $instructor->Nombre . " " . $instructor->Apellido;?></option>
                          <?php endif ?>
                                                    
                        <?php endforeach?>
                    </select>
                  </div>

                  <div class="mb-3 col-6">
                    <label for="especialidad_cu" class="form-label">Especialidad</label>
                    <select class="form-control"name="especialidad_cu" id="especialidad_cu">
                        <option value="0" disabled>Seleccione una especialidad...</option>
                        <?php foreach ($datos["especialidad"] as $especialidad): ?>
                          
                          <?php if($datos["datosCurso"]->idEspecialidad == $especialidad->idEspecialidad): ?>
                          
                            <option selected value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->Nombre;?></option>
                        
                        <?php else: ?>
                          
                          <option value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->Nombre;?></option>

                        <?php endif ?>
              
                        <?php endforeach?>
                    </select>  
                  </div>
                
                  <div class="col-9">
                    <button type="submit" class=" w-100 btn btn-success btn-lg" >Modificar</button>
                  </div>
                  <div class="col-3">
                    <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/curso">Atrás</a>
                  </div>
                </div>  
            </form>
          </div>      
        </div>
      </div>
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