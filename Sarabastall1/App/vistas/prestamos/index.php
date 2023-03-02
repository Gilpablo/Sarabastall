<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">MicroCreditos</li>
    </ol>
</nav>

<div class="container col-12 mt-3">

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
          <h1>MicroCreditos</h1>
      </div>
  </div>        
  <div class="d-grid gap-2 d-md-flex justify-content-md-start p-2 mb-2">
    <a class="btn btn-primary bg-primary"  id="abrirModal"   href="<?php echo RUTA_URL?>/prestamo/add_prestamo">Añadir MicroCreditos</a>
  </div>
  
  <div class="col-8">
    <form class="d-flex mb-2 col-8">
      <form class="form-inline">
      
      <div class="input-wrapper">
      <input id="q" class="btn btn border border-secondary" type="search"  placeholder="Buscar" onkeyup="search()">
      <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
      </svg>

      </form>
    </form>
  </div>
</div>
  <table class="table table-hover">
    
  <thead>
      <tr>
   
        <th scope="col">Titulo</th>
        <th scope="col">Importe</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Pedido</th>
        <th scope="col">Fecha Vencimiento</th>
        <th scope="col">Persona</th>
        <th scope="col">Acciones</th>
      
      </tr>
    </thead>
    <tbody id="tbody">
      <?php foreach ($datos["prestamos"] as $prestamo): ?>
        
      <tr>
          
            <td><?php echo $prestamo->Titulo?></td>
            <td><?php 
                  
                  echo ($prestamo->Importe);
                  // echo ($prestamo->Estado)? "Estado:".$prestamo->Estado."<br>":"";
                  // echo ($prestamo->Fecha_PedirPrestamo)? "Fecha:".$prestamo->Fecha_PedirPrestamo."<br>":"";
                ?>€</td>

                <td>
                  <?php if($prestamo->id_estado==1):?>
                    <strong class="text-success"><?php echo "PAGADO"?></strong>
                    
                    <?php elseif($prestamo->id_estado==2):?>
                      <strong class="text-danger"><?php echo "SIN PAGAR"?></strong>
                      <?php elseif($prestamo->id_estado==3):?>
                      <strong class="text-warning"><?php echo "PAGANDO"?></strong>
                </td>
                <?php endif ?>
                <td><?php echo $prestamo->Fecha_PedirPrestamo?></td>
                <td><?php echo $prestamo->Fecha_fin?></td>
        <td>
        <?php  echo ($prestamo->Persona)?>
        </td>
           <td class="w-25">
                  
           <a class="w-25 btn btn-outline-success btn-lg"  href="<?php echo RUTA_URL?>/prestamo/ver_prestamo/<?php echo $prestamo->idPrestamo ?>"><i class="bi-eye"></i>
       
                      </a>
              <!-- <a class="p-3" href="<?php echo RUTA_URL?>/prestamos/ver_prestamo/<?php echo $prestamo->idPrestamo ?>">
                  <i class="bi-eye"></i>
              </a>
                 -->
              <!-- <a class="btn btn-outline-warning btn-sm" href="">
                  <i class="bi-pencil-square"></i>
              </a> -->
               
              <!-- <a class="btn btn-outline-danger btn-sm" href="<?php echo RUTA_URL?>/prestamos/eliminar_prestamo/<?php echo $prestamo->idPrestamo ?>">
                  <i class="bi-trash"></i>
              </a> -->
           
              <button type="button" onclick="validar_borrar(<?php echo $prestamo->idPrestamo ?>)" 
        data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-25 btn btn-outline-danger btn-lg"><i class="bi-trash"></i>
       
      </button>
      <!-- <?php if($prestamo->id_estado==2||$prestamo->id_estado==3):?>
              <button type="button" onclick="validar_cerrar(<?php echo $prestamo->idPrestamo ?>)" 
        data-bs-toggle="modal" data-bs-target="#modalCerrarPrestamo" class="w-25 btn btn-outline-success btn-lg"><i class="bi bi-door-closed"></i>
       
      </button> -->
               <?php endif?>
            </td>
            <tr>
            
            <!-- <td colspan="6">
           
            <?php foreach($prestamo->acciones as $accion): ?>   
                       
                    <strong>Fecha: </strong><?php echo formatoFecha($accion->Fecha_Abonado) ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Cantidad pagada: </strong><?php echo $accion->Cantidad   ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                <?php endforeach ?>
            </td> -->
      </tr>
            <?php endforeach?>
      </tr>
    
  
    </tbody>


  </table>

</div>
<div class="modal face" id="modalCerrarAccion" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCerrarAccionLabel">
         ¿Seguro que quieres eliminar el prestamo?
        
        </h5>
      </div>
      <div class="modal-footer">
      
        <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/prestamo/eliminar_prestamo/<?php echo $prestamo->idPrestamo ?>">
          <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <input type="hidden" id="idPrestamo" name="idPrestamo">
        </form>
      </div>
    </div>
  </div>
</div>







<script>
  function validar_borrar(idPrestamo){

    document.getElementById("idPrestamo").value= idPrestamo;
  }
  function validar_cerrar(idPrestamo){

    document.getElementById("prestamo").value= idPrestamo;
  }


  const d=<?php echo json_encode($datos['prestamos'])?>;



var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;
var year = today.getFullYear();
var hoy=`${year}/${month}/${day}`;
console.log(d);

  d.forEach(e => {
    
    if (e.id_estado!=1 && new Date(e.Fecha_fin).getTime()<new Date(hoy).getTime()) {
      alert("El prestamo para "+e.Persona+" ha vencido la fecha limite de devolucion");
    }

    // if (e.Fecha_fin<hoy) {
    //     console.log(e.Fecha_fin);
    // }else{
    //     console.log(hoy);
    // }
  });
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>