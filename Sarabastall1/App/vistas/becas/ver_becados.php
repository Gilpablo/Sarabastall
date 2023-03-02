<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<div class="container mt-3">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/beca">Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Becados</li>
    </ol>
  </nav>
  <div class="row d-flex justify-content-center text-center mx-0 mt-3 col-12">
    <h1 class="mb-3">Alumnos becados</h1>
   
</div>
  <table class="table table-hover">
    
    <thead>
        <tr class="text-light bg-dark">
     
          <th scope="col">TUTOR</th>
          <th scope="col">Alumno</th>
          <th scope="col">Genero</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Fin</th>
          <th scope="col">Primer Pago</th>
          <th scope="col">Segundo Pago</th>
        
        
        </tr>
    
      <tbody id="the_table_body">
        <?php foreach ($datos['becados']as $becado): ?>
          <tr class="bg-light">
          <td><?php echo $becado->Tutor_Legal ?></td>
          <td><?php echo $becado->Nombre?></td>
          <td><?php echo $becado->Genero?></td>
          <td><?php echo $becado->Fecha_Inicio ?></td>
          <td><?php echo $becado->Fecha_Fin ?></td>
          <td><?php echo $becado->primerPago ?></td>
          <td><?php echo $becado->segundoPago ?></td>
         
        </tr>
  
      <?php endforeach?>
      </tbody>
    </table>


        </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
