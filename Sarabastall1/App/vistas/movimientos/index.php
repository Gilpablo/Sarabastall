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
          <h1>MOVIMIENTOS</h1>
      </div>
  </div>
  <div class="row col-12">
  <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end col-8">
   
      <label for="fil_mov" class="form-label">Filtrar por Tipo de Movimiento</label>
      <select name="tipomov" id="tipomov" class="form-select">
        <option value="" selected disabled >Seleccione un tipo de movimiento...</option>
        <option value="1">Todos</option>
        <option value="2">Ingresos</option>
        <option value="3">Gastos</option>
      </select>
  </div>         


  <div class="col-4">
    <form class="form-inline">
    
      <div class="input-wrapper">
        <input id="q" class="btn btn border border-secondary" type="search"  placeholder="Buscar" onkeyup="search()">

        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
      </div>
    </form>
  </div>

</div>

  <table class="table table-hover shadow">
    
  <thead>
      <tr class="bg-primary text-light">
    
        <th scope="col">Procedencia</th>
        <th scope="col">Accion</th>
        <th scope="col">Fecha_Movimiento</th>
        <th scope="col">Cantidad</th>
        <th scope="col">TipoMovimiento</th>
      </tr>
    </thead>
    <tbody id="tbody" class="bg-light">
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
    <!-- <tbody id="hola"></tbody> -->

  </table>
</div>  


<script>
  //script para filtrar por tipo de movimiento
  const movimiento=<?php echo json_encode($datos['movimientos'])?>;
  let t = document.getElementById("tipomov");
  t.addEventListener("change", function() {
  console.log(t.value);
  document.getElementById("tbody").innerHTML="";
  if (t.value==1) {
   
    const tbody = document.getElementById("tbody");
    
 

    //recorremos el array con todos los datos y llenamos la tabla
     movimiento.forEach((e) => {

     // tbody.appendChild(tr);
 
      tr = document.createElement("tr");
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Procedencia);
      td.appendChild(tdText);
      tr.appendChild(td);
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Accion);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Fecha_Movimiento);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Cantidad);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
     
      if (e.idTipoMovimiento==1) {
        tdText = document.createTextNode("Ingreso");
        td.appendChild(tdText);
        td.style.color="green";
      }else{
        tdText = document.createTextNode("Gasto");
        td.appendChild(tdText);
        td.style.color="red";
      };
      
      
      tr.appendChild(td);
 
      tbody.appendChild(tr);
 
      
    });
 
    //document.getElementById("cuerpo").appendChild(tbody);
  }
 // document.getElementById("cuerpo").innerHTML="";
  if (t.value==2) {
    
    const tbody = document.getElementById("tbody");
    
 
    let o=movimiento.filter(elemento=>elemento.idTipoMovimiento ==1);
    
    //recorremos el array con todos los datos y llenamos la tabla
     o.forEach((e) => {


 
      tr = document.createElement("tr");
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Procedencia);
      td.appendChild(tdText);
      tr.appendChild(td);
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Accion);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Fecha_Movimiento);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Cantidad);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");

        tdText = document.createTextNode("Ingreso");
        td.appendChild(tdText);
        td.style.color="green";
     
      
      
      tr.appendChild(td);
 
      tbody.appendChild(tr);
 
      
    });
 
    //document.getElementById("hola").appendChild(tbody);
  }

  if (t.value==3) {
    
    const tbody = document.getElementById("tbody");
    
 
    let o=movimiento.filter(elemento=>elemento.idTipoMovimiento ==2);
    
    //recorremos el array con todos los datos y llenamos la tabla
     o.forEach((e) => {


 
      tr = document.createElement("tr");
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Procedencia);
      td.appendChild(tdText);
      tr.appendChild(td);
 
      td = document.createElement("td");
      tdText = document.createTextNode(e.Accion);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Fecha_Movimiento);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");
      tdText = document.createTextNode(e.Cantidad);
      td.appendChild(tdText);
      tr.appendChild(td);

      td = document.createElement("td");

        tdText = document.createTextNode("Gasto");
        td.appendChild(tdText);
        td.style.color="red";
     
      
      
      tr.appendChild(td);
 
      tbody.appendChild(tr);
 
      
    });
 
    //document.getElementById("hola").appendChild(tbody);
  }

  });   
  

</script>
