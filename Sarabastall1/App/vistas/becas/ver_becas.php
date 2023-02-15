<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<div class="container col-12 mt-3">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/beca">Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Becas</li>
    </ol>
  </nav>

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">

          <h1><?php echo $datos['tipoBeca']->NombreBeca?></h1>
      </div>
  </div>        
  <form class="d-flex mb-2">
  <form class="form-inline">
   
  <div class="input-wrapper">
  <input id="q" class="btn btn border border-secondary" type="search"  placeholder="Buscar" onkeyup="search()">

  <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
  </svg>
</div>
    
  </form>
    </form>
  <table class="table table-hover">
    
  <thead>
      <tr class="text-light bg-dark">
   
        <th scope="col">Alumno</th>
        <th scope="col">Importe</th>
        <th scope="col">Fecha Inicio</th>
        <th scope="col">Fecha Fin</th>
        
        <th scope="col">Centro</th>
        <th scope="col">Nota Media</th>
        <?php if($datos['tipoBeca']->NombreBeca=="Carrera"):?>
        <th scope="col">Madrina</th>
        <?php endif?>
        <th scope="col">Acciones</th>
      
      </tr>
  
    <tbody id="the_table_body">
      <?php foreach ($datos['beca']as $beca): ?>
        <tr class="bg-light">
        <td><?php echo $beca->Nombre ?></td>
        <td><?php echo $beca->Importe ?>€</td>
        <td><?php echo $beca->Fecha_Inicio ?></td>
        <td><?php echo $beca->Fecha_Fin ?></td>
        <td><?php echo $beca->NombreCentro ?></td>
        <td><?php echo $beca->NotaMedia_Alumno ?></td>
        <?php if($datos['tipoBeca']->NombreBeca=="Carrera"):?>
        <?php foreach ($datos['madrina']as $madrina): ?>
          <td><?php echo $madrina?></td>
          <?php endforeach?>
          <?php endif?>
        <td class="">
        <a class="w-sm-100 btn btn-outline-success btn-lg" href="<?php echo RUTA_URL?>/beca/ver_beca/<?php echo $beca->idBeca ?>"><i class="bi bi-pencil-square"></i></a>

       
        
          
        <button type="button" onclick="validar_borrar(<?php echo $beca->idBeca ?>,<?php echo $datos['tipoBeca']->idTipoBeca?>)" 
        data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-sm-100  btn btn-outline-danger btn-lg"><i class="bi-trash"></i>
       
      </button>
      
        </td>
     

        <tr class="bg-light ">
            
            <td colspan="12">
            <span class="text-dark bagde-info rounded-pill fw-bold">Observaciones:</span><p><?php echo $beca->Observaciones?></p>
            </td>
      </tr>

    <?php endforeach?>
    </tbody>
  </table>

</div>
<div class="modal face" id="modalCerrarAccion" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCerrarAccionLabel">
          ¿Seguro que quieres eliminar la beca?
        
        </h5>
      </div>
      <div class="modal-footer">
      
        <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/beca/eliminar_beca/<?php echo $beca->idBeca ?>">
          <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <input type="hidden" id="idBeca" name="idBeca">
          <input type="hidden" id="tipoBeca" name="tipoBeca">
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function validar_borrar(idBeca,idTipoBeca){

    document.getElementById("idBeca").value= idBeca;
    document.getElementById("tipoBeca").value= idTipoBeca;
  }
  function buscar(){
    let num_cols, display, input, mayusculas, tablaBody, tr, td, i, txtValue;   num_cols = 8;
     //Numero de fila en la que busca, la primera columna es la 0
    input = document.getElementById("buscador");
    //hace referencia al id del input del buscador 
    mayusculas = input.value.toUpperCase();
    //convierte a mayusculas
    tablaBody = document.getElementById("tbody"); 
    //Hace referencia al id del tbody
    tr = tablaBody.getElementsByTagName("tr");
    for(i=0; i< tr.length; i++){ 
        //recorre todos los tr
        display = "none";
        for(j=0; j < num_cols; j++){ 
            //recorre las columnas hasta num_cols
            td = tr[i].getElementsByTagName("td")[j]; 
            //devuelve la lista de elementos td
            if(td){ txtValue = td.textContent || td.innerText; 
                //Puede ser textContent(Representa el contenido de texto) o innerText (tiene en cuenta el estilo y cambia el estilo de la página)
                if(txtValue.toUpperCase().indexOf(mayusculas) > -1){
                    //Si el texto en mayusculas concuerda, lo muestra
                    display = "";
                }
            }
        }
        tr[i].style.display = display;
    }
}
function search(){
			var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
			num_cols = 10;
			input = document.getElementById("q");
			filter = input.value.toUpperCase();
			table_body = document.getElementById("the_table_body");
			tr = table_body.getElementsByTagName("tr");

			for(i=0; i< tr.length; i++){				
				display = "none";
				for(j=0; j < num_cols; j++){
					td = tr[i].getElementsByTagName("td")[j];
					if(td){
						txtValue = td.textContent || td.innerText;
						if(txtValue.toUpperCase().indexOf(filter) > -1){
							display = "";
						}
					}
				}
				tr[i].style.display = display;
			}
		}	
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>