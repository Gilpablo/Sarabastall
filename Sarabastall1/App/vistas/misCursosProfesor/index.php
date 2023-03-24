<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cursos</li>

    </ol>
  </nav>

  <div class="container">

    <h5 class="text-center">CURSOS DE <?php echo $this->datos["usuarioSesion"]->Nombre?></h5>

    <div class="row justify-content-center">
      <?php foreach ($datos["cursosProfesor"] as $curso): ?>
        
        <div class="col-6 p-2">
          
          <form action="" method="post">

            <div class="card text-center">

              <div class="card-body">

                <h5 class="card-title"><?php echo $curso->Nombre;?></h5>

                <div class="row">

                  <div class="col-4">
                      <p class="card-text"><?php echo $curso->Fecha_Inicio?></p>
                  </div>

                  <div class="col-4">
                      <p class="card-text"><?php echo $curso->Fecha_Fin?></p>
                  </div>

                  <div class="col-4">
                      <p class="card-text"><?php foreach ($this->datos["especialidad"] as $especialidad) {
                        if ($curso->idEspecialidad == $especialidad->idEspecialidad) {
                          echo $especialidad->Nombre;
                        }
                      }?></p>
                  </div>

                  
                  
                </div>

                <div class="row"> 
                  <div class="col-6 mt-3">
                    <a class="btn btn-primary me-md-3"  href="<?php echo RUTA_URL?>/miCursoProfesor/ver_aprendices/<?php echo $curso->idCurso;?>">Ver Alumnos</a>
                  </div>
                  <div class="col-6 mt-3">
                    <a class="btn btn-primary me-md-3"  href="<?php echo RUTA_URL?>/miCursoProfesor/ver_curso/<?php echo $curso->idCurso;?>">Ver Curso</a>
                  </div>
                </div>

              </div>

            </div>
            
          </form>  

        </div>

      <?php endforeach?>
    </div>
  
  </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>