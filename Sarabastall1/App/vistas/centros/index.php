<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Centros</li>
    </ol>
  </nav>
  <div class="container">
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12 mb-2">
          <h1>CENTROS</h1>
      </div>
  </div>
  <a class="btn btn-primary mt-3 mb-3"  href="<?php echo RUTA_URL?>/centro/add_centro">Añadir Centro</a>
  <a class="btn btn-primary mt-3 mb-3"  onclick="ordenarTipo()">Ordenar por Nombre</a>
    <ul class="list-group list-group-flush" id="centros">

    <?php foreach ($datos['centrosActivos'] as $centros) {?>
      
        <li class="shadow list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/colegio.png"> <?php echo $centros->NombreCentro?> 
            <div class="mt-1 mb-1">
                <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/centro/ver_centro/<?php echo $centros->idCentro?>">
                  <i class="bi-eye"></i>
                </a>
                <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/centro/borrar_centro/<?php echo $centros->idCentro?>">
                  <i class="bi-trash" ></i>
                </a>
            </div>
        </li>
        <?php } ?>

    </ul> 
    
    </div>
    
  


</body>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
</html>

<script>
//funcion ordena los centros por nombre con la funcion sort y toUpperCase despues los escribimos con createElement
function ordenarTipo(){

  var datosTabla=<?php echo json_encode($datos['centrosActivos'])?>;

  const ordenT=datosTabla.sort((a,b) => a.NombreCentro.toUpperCase() > b.NombreCentro.toUpperCase());
 
  console.log(ordenT);
  document.getElementById("centros").innerHTML="";

  ordenT.forEach(e => {


      var ul = document.getElementById("centros");

      var li = document.createElement('li');
      li.className= "list-group-item mb-2 shadow";
                                  
      var img = document.createElement('img');
      img.src="img/colegio.png";
      img.className="rounded";
      img.style="width:30px;";       
      
      var txt= document.createTextNode(" "+e.NombreCentro);

      var div=document.createElement("div");
      div.className="mt-1 mb-1";

      var a=document.createElement("a");
      a.className="btn btn-outline-success btn-sm";
      a.setAttribute("href", "<?php echo RUTA_URL?>/centro/ver_centro/"+e.idCentro+"");

      var i = document.createElement("i");
      i.className="bi-eye";

      var a1=document.createElement("a");
      a1.className="btn btn-outline-danger btn-sm";
      a1.onclick=function(){
      confirmar(event);
      }
      a1.setAttribute("href", "<?php echo RUTA_URL?>/centro/borrar_centro/"+e.idCentro+"");
      var txt1= document.createTextNode(" ");
      var i1 = document.createElement("i");
      i1.className="bi-trash";

      a1.appendChild(i1);

      a.appendChild(i);
      div.appendChild(a);
      div.appendChild(txt1);
      div.appendChild(a1);       
      li.appendChild(img);
      li.appendChild(txt);
      li.appendChild(div);
      ul.appendChild(li);
      
  });


}

function confirmar(e){
      var res = confirm('¿Estas seguro de que quieres borrar este centro?');
      if(res == false){
          e.preventDefault();
    }
  }
               
</script>