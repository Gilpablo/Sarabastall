<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Movimientos</li>
    </ol>
</nav>

<div class="container col-12 mt-3">

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12 mb-2">
          <h1>Movimientos</h1>
      </div>
  </div>        

  <table class="table ">
    
  <thead>
      <tr>
   
        <th scope="col">Procedencia</th>
        <th scope="col">Accion</th>
        <th scope="col">Fecha_Movimiento</th>
        <th scope="col">Cantidad</th>
        <th scope="col">TipoMovimiento</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datos["movimientos"] as $movimientos): ?>
        
      <tr>
          
        <td><?php echo $movimientos->Procedencia?></td>
        <td><?php echo $movimientos->Accion?></td>
        <td><?php echo $movimientos->Fecha_Movimiento?></td>
        <td><?php echo $movimientos->Cantidad?></td>
        <td><?php if ($movimientos->idTipoMovimiento==1) {
                        echo("<font color=\"green\">Ingreso</font>");
                  }else{
                        echo("<font color=\"red\">Gasto</font>");
                    }
        
        ?></td>
      </tr>
    <?php endforeach ?>
  
    </tbody>


  </table>
</div>  
