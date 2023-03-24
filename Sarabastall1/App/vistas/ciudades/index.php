<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Ciudades</li>
    </ol>
  </nav>
  <div class="container">

  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12 mb-2">
          <h1>CIUDADES</h1>
      </div>
  </div>
  <a class="btn btn-primary mt-3 mb-3"  href="<?php echo RUTA_URL?>/ciudad/add_ciudad">Añadir Ciudad</a>
    <ul class="list-group list-group-flush" id="ciudades">

    
    <!-- <?php foreach ($datos['ciudadesActivas'] as $ciudades) {?>
        <li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/edificios.png"> <label for="" class="nombre"></label>
        
            <div class="mt-1 mb-1">
                <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/ciudad/ver_ciudad/<?php echo $ciudades->idCiudad?>">
                  <i class="bi-eye"></i>
                </a>
                <a class="btn btn-outline-danger btn-sm" href="<?php echo RUTA_URL?>/ciudad/borrar_ciudad/<?php echo $ciudades->idCiudad?>" >
                  <i class="bi-trash" ></i>
                </a>
            </div>
        </li>
        <?php } ?> -->

    </ul> 
    
    </div>
    
   


</body>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
</html>

<script>
//script para sacar los datos del nombre de la ciudad con fetch llamamos al controlador alli le pasamos los datos a una funcion llamada vistaApi que coje los datos y hace un encode
//despues recorremos el objeto de array de objetos y escribimos con create element
fetch("<?php echo RUTA_URL ?>/ciudad/get_ciudades", {
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
})
.then(response => response.json())
.then(responseData => 
  
Object.entries(responseData).forEach(([key, value]) => {
  value.forEach(e => {
    var ul = document.getElementById("ciudades");
    var li = document.createElement('li');
    li.className= "shadow list-group-item mb-2";
                                
    var img = document.createElement('img');
    img.src="img/edificios.png";
    img.className="rounded";
    img.style="width:30px;";       
    
    var txt= document.createTextNode(" " +e.Nombre);

    var div=document.createElement("div");
    div.className="mt-1 mb-1";

    var a=document.createElement("a");
    a.className="btn btn-outline-success btn-sm";
    a.setAttribute("href", "<?php echo RUTA_URL?>/ciudad/ver_ciudad/"+e.idCiudad+"");

    var i = document.createElement("i");
    i.className="bi-eye";

    var a1=document.createElement("button");
    a1.className="btn btn-outline-danger btn-sm";
    a1.onclick=function(){
      confirmar(event);
    }
    a1.setAttribute("href", "<?php echo RUTA_URL?>/ciudad/borrar_ciudad/"+e.idCiudad+"");
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
  
})
);   

function confirmar(e){
      var res = confirm('¿Estas seguro de que quieres borrar esta ciudad?');
      if(res == false){
          e.preventDefault();
    }
  }
</script>