<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cursos</li>

    </ol>
  </nav>

  <div class="container">

    <h5 class="text-center">CURSOS</h5>
    <a class="btn btn-primary me-md-3"  href="<?php echo RUTA_URL?>/curso/add_curso">AÑADIR CURSO</a>

    <div class="row justify-content-center">
      <?php foreach ($datos["cursos"] as $curso): ?>

          <div class="col-12 p-2">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo $curso->Nombre;?></h5>
                <p class="card-text"></p>
                
                <!-- Button trigger modal -->
                <a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver<?php echo $curso->idCurso; ?>">
                  <i class="bi-eye"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="ver<?php echo $curso->idCurso?>">

                    <div class="modal-dialog modal-dialog-centered modal-xl">

                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title ms-3" style="color: blue;">Curso: <?php echo $curso->Nombre?></h4> 
                                <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
                            </div>

                            <form method="post">

                              <!-- Modal Body -->
                              <div class="modal-body">

                                <div class="row">
                                  
                                  <div class="mb-3 col-6">
                                    <label for="nombre_cu" class="form-label">Nombre</label>
                                    <input  type="text" class="form-control" id="nombre_cu" name="nombre_cu" value="<?php echo $curso->Nombre?>">   
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="importe_cu" class="form-label">Importe</label>
                                    <input  type="text" class="form-control" id="importe_cu" name="importe_cu" value="<?php echo $curso->Importe?>">   
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="fechaIni_cu" class="form-label">Fecha Inicio</label>
                                    <input type="date" class="form-control" id="fechaIni_cu" name="fechaIni_cu" value="<?php echo $curso->Fecha_Inicio?>">   
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="fechaFin_cu" class="form-label">Fecha Fin</label>
                                    <input type="date" class="form-control" id="fechaFin_cu" name="fechaFin_cu" value="<?php echo $curso->Fecha_Fin?>">   
                                  </div>

                                  <div class="mb-3 col-6">
                                    <label for="instructor_cu" class="form-label">Instructor</label>
                                    <select class="form-control"name="instructor_cu" id="instructor_cu">
                                        <option value="0" disabled>Seleccione un instructor...</option>
                                        <?php foreach ($datos["instructores"] as $instructor): ?>
                                                                
                                          <?php if($curso->Instructor_idPersona == $instructor->idPersona): ?>
                                          
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
                                          
                                          <?php if($curso->idEspecialidad == $especialidad->idEspecialidad): ?>
                                          
                                            <option selected value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->Nombre;?></option>
                                        
                                        <?php else: ?>
                                          
                                          <option value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->Nombre;?></option>

                                        <?php endif ?>
                              
                                        <?php endforeach?>
                                    </select>  
                                  </div>
                                
                                  <input type="hidden" name="id_cu" value="<?php echo $curso->idCurso?>">
                                  
                                </div> 
                              </div> 
                              <div class="modal-footer">
                                  
                                <button type="submit" class=" btn btn-success btn-lg" >Modificar</button>

                                <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Cerrar</button>

                              </div> 
                          </form>
                          
                            

                        </div>
                    </div>

                </div>


                <a class="btn btn-outline-warning btn-sm" href="<?php echo RUTA_URL?>/curso/add_aprendices/<?php echo $curso->idCurso?>">
                  <i class="bi bi-people"></i>
                </a>

                <a class="btn btn-outline-dark btn-sm" href="<?php echo RUTA_URL?>/curso/certificadoCurso/<?php echo $curso->idCurso?>">
                  <i class="bi bi-people"></i>
                </a>

                <a class="btn btn-outline-danger btn-sm" href="<?php echo RUTA_URL?>/curso/eliminar_curso/<?php echo $curso->idCurso?>" onclick="confirmar(event)">
                  <i class="bi-trash"></i>
                </a>
              </div>
          </div>
      </div>
    <?php endforeach?>
    </div>
  
  </div>

  <script>
    function confirmar(e){
      var res = confirm('¿Estas seguro de que quieres borrar ese usuario?');
      if(res == false){
          e.preventDefault();
      }
    }
  </script>
</div>

   