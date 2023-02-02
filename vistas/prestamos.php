
  <?php require_once 'header_sesioniniciada.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Prestamos</li>
    </ol>
  </nav>
  <h5 class="text-center p-2">PRESTAMOS</h5>
  
  <div class="container">

  <button class="btn btn-primary mt-3 mb-3">AÑADIR</button>
  <table class="table table-hover">
    
  <thead>
      <tr>
        
        <th scope="col">Titulo</th>
        <th scope="col">Importe</th>
        <th scope="col">Estado</th>
        <th scope="col">Tipo de Prestamo</th>
        <th scope="col">Persona</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i=1;$i<=5;$i++){
        ?>
      
     <tr>
       
            
        <td>Prestamo ejemplo</td>
        <td>56€</td>
        <td>Sin Devolver</td>
        <td>X</td>
        <td>Persona 1</td>
        <td>10/06/2022</td>
        <td> <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-eye"></i></button>
        <button type="button" class="btn btn-outline-warning" ><i class="bi bi-pencil-square"></i></button>
        <button type="button" class="btn btn-outline-danger" ><i class="bi bi-trash"></i></button>
     </td>
     <?php   } ?>
     </tr>
   
           

  </table>
  </div>
    
</body>

</html>