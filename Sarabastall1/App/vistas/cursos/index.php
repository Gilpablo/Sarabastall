<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';


  //print_r($datos["cursos"]);
?>
  


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
                <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/curso/ver_curso/<?php echo $curso->idCurso?>">
                  <i class="bi-eye"></i>
                </a>

                <a class="btn btn-outline-warning btn-sm" href="<?php echo RUTA_URL?>/curso/add_aprendices/<?php echo $curso->idCurso?>">
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

   