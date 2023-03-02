
  <?php require_once 'header_sesioniniciada.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Alumnos</li>
    </ol>
  </nav>
  <div class="container">
 
  <h5 class="text-center">ALUMNOS </h5>
  <button class="btn btn-primary mt-3 mb-3">AÑADIR</button>
    <ul class="list-group list-group-flush">

    <?php for ($i=1; $i <= 10 ; $i++) { ?>
    

        <li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/usuario.png">   Alumno <?php echo $i?> 
       
        <div class="mt-1 mb-1">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-eye"></i></button>
        <button type="button" class="btn btn-outline-warning" ><i class="bi bi-pencil-square"></i></button>
        <button type="button" class="btn btn-outline-danger" ><i class="bi bi-trash"></i></button>
      </div>
         </li>
        <?php } ?>

</ul> 
    
    </div>




</body>

</html>

<div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ALUMNO 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p>sagkjjgjdgksajgjkgjgjfdsak asgfjsdakfjdfjfsdjfkdsfjsdj asfjsdklfjdsklfjdskfjdfdsafs</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>