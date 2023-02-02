<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">


    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>CONTACTO</h1>
      </div>
  </div> 

  <form method="post">
    <div class="row">
      <div class="mb-3 col-6">
        <input type="text" class="form-control bg-light"  id="nombre" name="nombre" placeholder="Nombre">   
      </div>


      <div class="mb-3 col-6">
        <input type="email" class="form-control bg-light" id="email" name="email" placeholder="Email">
      </div>


      <div class="mb-3 col-12">
        <textarea class="form-control  mb-5 h-75 bg-light" id="mensaje" name="mensaje" placeholder="Mensaje"></textarea>   
      </div>
    
      <div class="row d-flex justify-content-center text-center mx-0 ">
        <div class="col-3 ">
          <button type="submit" class=" w-100 btn btn-light btn-lg border border-dark">Enviar</button>
        </div> 
      </div>
      
    </div>  
  </form>
</div>
    
</body>
</html>