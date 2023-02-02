<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Ciudades</li>
    </ol>
  </nav>
  <div class="container">

  <h5 class="text-center">CIUDADES </h5>
  <a class="btn btn-primary mt-3 mb-3"  href="<?php echo RUTA_URL?>/ciudad/add_ciudad">AÑADIR</a>
    <ul class="list-group list-group-flush" id="ciudades">

    <?php foreach ($datos['ciudadesActivas'] as $ciudades) {?>
      
        <li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/edificios.png"> <?php echo $ciudades->Nombre?> 
            <div class="mt-1 mb-1">
                <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/ciudad/ver_ciudad/<?php echo $ciudades->idCiudad?>">
                  <i class="bi-eye"></i>
                </a>
                <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/ciudad/borrar_ciudad/<?php echo $ciudades->idCiudad?>">
                  <i class="bi-trash" ></i>
                </a>
            </div>
        </li>
        <?php } ?>

    </ul> 
    
    </div>
    
  


</body>

</html>

<script>
function confirmar(e){
      var res = confirm('¿Estas seguro de que quieres borrar ese usuario?');
      if(res == false){
          e.preventDefault();
    }
  }
               
</script>