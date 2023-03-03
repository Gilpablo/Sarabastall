<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="<?php echo RUTA_URL?>/imagenes/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <!-- <link rel="stylesheet" href="<?php echo RUTA_URL?>/js/main.js"> -->
    
    <title>Sarabastall</title>
</head>
<div  class="navbar w-100 justify-content-center  bg-light  border-bottom border-lg-shadow" id="content" style="display:none;">

    <div class="container w-75 d-flex" id="accesibilidad">
      <div class="fontsize col-6 d-flex justify-content-start">
        <ul style="display:flex; list-style:none;">
         
          <li>
            <button class="btn btn-outline-ligth" id="disminuir" >A-</button>
          </li>
          <li>
            <button class="btn btn-outline-ligth" onclick="return cambiarTexto('.')">A</button>
          </li>
          <li>
            <button class="btn btn-outline-ligth" id="aumentar">A+</button>
          </li>
        </ul>
      </div>
      <div class="fontsize col-6 d-flex justify-content-start">
        <ul style="display:flex; list-style:none;">
        
          <li>
            <button class="btn btn-outline-ligth" onclick="return cambiarFondoBlanco()" >R</button>
          </li>
          <li>
            <button class="btn" style="background-color:#000000 ; border: 0; color: #ffff00 ;" onclick="return cambiarFondoNegro()" >A</button>
          </li>
          <li>
            <button  class="btn" style="background-color:#ffffcc ; border: 0; color: #000000;" onclick="return cambiarFondoVainilla()" >A</button>
          </li>
          <li>
            <button  class="btn" style="background-color:#99ccff ; border: 0; color: #000000;" onclick="return cambiarFondoCian()">A</button>
          </li>
        </ul>
      </div>
    </div>
</div>
<body style="background-color:rgba(235,236,240,255);">
<nav class="navbar navbar-light bg-light">
    
  <div class="container-fluid me-4 ">
    <div class="bg-light">
  
      <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        <span class="navbar-toggler-icon"></span>
      </button>
      <img src="<?php echo RUTA_URL?>/img/logo.png" style="width:50%; margin-left:2%;">
  </div>

  

    <li style="list-style:none;" class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-circle mr-3 "></i>
      <label for="" id="usu">
        <script>
          const datos=<?php echo json_encode($datos['usuarioSesion'])?>;
            localStorage.setItem("name", datos.Nombre);
            if (localStorage.getItem("name")) {
              let name = localStorage.getItem("name");
              document.getElementById('usu').innerHTML=name;
            }
            //si queremos borrar algo que hayamos guardado en local
            //localStorage.removeItem("titulo");
        </script>
      </label>
      </a>
      <ul class="dropdown-menu">
    
        <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/perfil/editar_perfil/<?php echo $datos['usuarioSesion']->idPersona ?>">Perfil</a></li>

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a></li>
      </ul>
     
    </li>
    <label class="checkeable">
    <input type="checkbox" class="form-check-input d-none" id="check" name="check" value="1" onchange="javascript:showContent()">
    <i class="bi bi-universal-access-circle"></i>
    </label>
  
    
  </div>
</nav>  


 <div class="row g-0">
   
  <div style="background-color:rgba(235,236,240,255);" class="col-md-2 col-sm-2 col-lg-2 col-xl-1  vh-100 d-none d-sm-block ">
    
    <div style="width:72px;height:200%;" class="bg-light h-100">
      <ul class="list-group">
        <a href="<?php echo RUTA_URL?>/"><li title="INICIO" class="list-group float-left pb-3 "><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/home.png"></li></a>
        <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [10])):?>
        <a href="<?php echo RUTA_URL?>/curso"> <li title="CURSO" class="justify-content-center.  list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/darcurso.png"></li></a>
        <a href="<?php echo RUTA_URL?>/usuario"><li title="USUARIOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/alumno.png"></li></a>
        <a href="<?php echo RUTA_URL?>/beca"><li title="BECAS" class="list-group pb-3"><img id="icono"  class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/beca.png"> </li></a>
        <a href="<?php echo RUTA_URL?>/prestamo"><li title="PRESTAMOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/prestamo.png"></li></a>
        <a href="<?php echo RUTA_URL?>/movimiento"><li title="MOVIMIENTOS" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/dinero.png"></li></a>
        <a href="<?php echo RUTA_URL?>/ciudad"><li title="CIUDADES" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/edificios.png"></li></a>
        <a href="<?php echo RUTA_URL?>/centro"><li title="CENTROS_ESCOLARES" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/colegio.png"></li></a>
        <?php endif?>
        <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20])):?>
        <a href="<?php echo RUTA_URL?>/archivo"><li title="ARCHIVOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/carpeta.png"></li></a>
        <?php endif?>
        <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20,30])):?>
        <a href="<?php echo RUTA_URL?>/MiCursoProfesor"> <li title="MIS CURSOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="<?php echo RUTA_URL?>/img/certified.png"></li></a>
        <?php endif ?>
      </ul>
    </div>
  
  </div>
  <div style="background-color:rgba(235,236,240,255);" class="container col-xl-11 col-sm-10 col-xs-6 col-md-10 col-lg-10 ">
  
  <div class="offcanvas offcanvas-start" id="demo">
  <div style="background-color:rgba(235,236,240,255);" class="offcanvas-header">
  <img src="<?php echo RUTA_URL?>/img/logo.png" style="width:50%; margin-left:2%;">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
 
  <div class="offcanvas-body">
  
  <a href="administrador.php"> <h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/home.png"> Inicio </h3></a>
  <?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [10])):?>
<a href="<?php echo RUTA_URL?>/curso"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/darcurso.png"> Cursos </h3></a>

<a href="<?php echo RUTA_URL?>/usuario"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/alumno.png"> Usuarios </h3></a>

<a href="<?php echo RUTA_URL?>/beca"><h3> <img id="icono"  class="mb-3" src="<?php echo RUTA_URL?>/img/beca.png"> Becas</h3></a></a>

<a href="<?php echo RUTA_URL?>/prestamo"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/prestamo.png"> Prestamos</h3></a>

<a href="<?php echo RUTA_URL?>/movimiento"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/dinero.png"> Movimientos</h3></a>

<a href="<?php echo RUTA_URL?>/ciudad"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/edificios.png"> Ciudades</h3></a>

<a href="<?php echo RUTA_URL?>/centro"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/colegio.png"> Centros_Escolares</h3></a>
<?php endif?>
<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20])):?>
<a href="<?php echo RUTA_URL?>/archivo"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/carpeta.png"> Archivos</h3></a>
<?php endif ?>
<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20,30])):?>
<a href="<?php echo RUTA_URL?>/MiCursoProfesor"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/certified.png"> Mis Cursos</h3></a>
<?php endif ?>
  </div>
</div>
<script>
  function search(){
			var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
			num_cols = 5;
			input = document.getElementById("q");
			filter = input.value.toUpperCase();
			table_body = document.getElementById("tbody");
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

  <script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style ="z-index:995";
            element.style.position = 'fixed';
            element.style.display = 'flex';
            element.style = "box-shadow: 0 1rem 3rem rgba(black, 0.175) ";


        }
        else {
            element.style.display='none';
        }
    }

      if (localStorage.clickcount) {
          localStorage.clickcount = Number(localStorage.clickcount) + 1;
      } else {
          localStorage.clickcount = 1;
      }
  </script>  