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

<!-- ++++++++++++++++++ MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ MENU ACCESIBILIDAD ++++++++++++++++++ -->

<div class="navbar justify-content-center bg-light border-bottom border-lg-shadow" id="content" style="display:none; ">
    <div class="container d-flex" id="accesibilidad">
		<div class="fontsize col-6 d-flex justify-content-start">
			<ul style="display:flex; list-style:none;">
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return cambiarTexto('-')" id="disminuir" >A-</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return textoNormal()">A</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return cambiarTexto('+')" id="aumentar">A+</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" onclick="return contrasteNormal()" >R</button>
				</li>
				<li>
					<button class="btn" style="background-color:#000000 ; border: 0; color: #ffff00 ;" onclick="return contrasteNegro()" >A</button>
				</li>
				<li>
					<button  class="btn" style="background-color:#ffffcc ; border: 0; color: #000000;" onclick="return contrasteVainilla()" >A</button>
				</li>
				<li>
					<button  class="btn" style="background-color:#99ccff ; border: 0; color: #000000;" onclick="return contrasteCielo()">A</button>
				</li>
			</ul>
		</div>
    </div>
</div>

<!-- ++++++++++++++++++ FIN MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN MENU ACCESIBILIDAD ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN MENU ACCESIBILIDAD ++++++++++++++++++ -->

<!-- ++++++++++++++++++ INICIO BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ INICIO BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ INICIO BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ INICIO BODY ++++++++++++++++++ -->

<body style="background-color:rgba(235,236,240,255);">
	<div class="row g-0">
		<nav class="navbar navbar-light bg-light"> 
			<div class="container-fluid px-2">
				<div class="bg-light ps-1">
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
						<li>
							<a class="dropdown-item" href="<?php echo RUTA_URL?>/perfil/editar_perfil/<?php echo $datos['usuarioSesion']->idPersona ?>">Perfil</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a>
						</li>
					</ul>
				</li>
				<label class="checkeable">
				<input type="checkbox" class="form-check-input d-none" id="check" name="check" value="1" onchange="javascript:showContent()">
				<i style="cursor:pointer;" class="bi bi-universal-access-circle"></i>
			</div>
		</nav>
	</div>  
	<div class="row g-0">
		<div class="d-flex col-1  d-none">
			<div class="bg-light vh-100" style="width: 70px;">
				<ul class="list-group">
					<a href="<?php echo RUTA_URL?>/inicio"><li title="INICIO" class="list-group float-left pb-3 "><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/home.png"></li></a>
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
					<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20])):?>
						<a href="<?php echo RUTA_URL?>/MiCursoProfesor"> <li title="MIS CURSOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="<?php echo RUTA_URL?>/img/certified.png"></li></a>
					<?php endif ?>
					<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [30])):?>
						<a href="<?php echo RUTA_URL?>/MiCursoAprendiz"> <li title="MIS CURSOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="<?php echo RUTA_URL?>/img/certified.png"></li></a>
					<?php endif ?>
				</ul>
			</div>
		</div>

		<!-- ++++++++++++++++++ MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ MODAL ++++++++++++++++++ -->

		<div class="offcanvas offcanvas-start" id="demo">
			<div style="background-color:rgba(235,236,240,255);" class="offcanvas-header">
				<img src="<?php echo RUTA_URL?>/img/logo.png" style="width:50%; margin-left:2%;">
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
			</div>
			<div class="offcanvas-body">
				<a href="<?php echo RUTA_URL?>/inicio"> <h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/home.png"> Inicio </h3></a>
				<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [10])):?>
					<a href="<?php echo RUTA_URL?>/curso"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/darcurso.png"> Cursos </h3></a>				
					<a href="<?php echo RUTA_URL?>/usuario"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/alumno.png"> Usuarios </h3></a>
					<a href="<?php echo RUTA_URL?>/beca"><h3> <img id="icono"  class="mb-3" src="<?php echo RUTA_URL?>/img/beca.png"> Becas</h3></a></a>		
					<a href="<?php echo RUTA_URL?>/prestamo"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/prestamo.png"> Prestamos</h3></a>
					<a href="<?php echo RUTA_URL?>/movimiento"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/dinero.png"> Movimientos</h3></a>
					<a href="<?php echo RUTA_URL?>/ciudad"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/edificios.png"> Ciudades</h3></a>
					<a href="<?php echo RUTA_URL?>/centro"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/colegio.png"> Centros Escolares</h3></a>
				<?php endif?>
				<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20])):?>
					<a href="<?php echo RUTA_URL?>/archivo"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/carpeta.png"> Archivos</h3></a>
				<?php endif ?>
				<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [20])):?>
					<a href="<?php echo RUTA_URL?>/MiCursoProfesor"><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/certified.png"> Mis Cursos</h3></a>
				<?php endif ?>
				<?php  if (tienePrivilegios($datos['usuarioSesion']->idRol, [30])):?>
					<a href="<?php echo RUTA_URL?>/MiCursoAprendiz"> <h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/certified.png">Mis Cursos</h3></a>
				<?php endif ?>
			</div>
		</div>

		<!-- ++++++++++++++++++ FIN MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ FIN MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ FIN MODAL ++++++++++++++++++ -->
		<!-- ++++++++++++++++++ FIN MODAL ++++++++++++++++++ -->

		<div style="background-color:rgba(235,236,240,255);" class="container col-xl-11 col-sm-10 col-xs-6 col-md-10 col-lg-10">


<!-- ++++++++++++++++++ FIN BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN BODY ++++++++++++++++++ -->
<!-- ++++++++++++++++++ FIN BODY ++++++++++++++++++ -->

<!-- ++++++++++++++++++ SCRIPTS ++++++++++++++++++ -->
<!-- ++++++++++++++++++ SCRIPTS ++++++++++++++++++ -->
<!-- ++++++++++++++++++ SCRIPTS ++++++++++++++++++ -->
<!-- ++++++++++++++++++ SCRIPTS ++++++++++++++++++ -->

<script>
	//funcion que busca automaticamente 
function search(){
			var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
			num_cols = 6;
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
//nos cuenta en local storege el numero de veces que clickamos el menu
	if (localStorage.clickcount) {
		localStorage.clickcount = Number(localStorage.clickcount) + 1;
	} else {
		localStorage.clickcount = 1;
	}
</script>  

<script>
// funciones para la accesibilidad de la pagina
//Todos los elementos a los que les vamos a cambiar el fontSize
const elementsList = document.getElementsByTagName('html');

function getElementFontSize(element){
//getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
return parseFloat(elementFontSize);  //Devolvemos el total de pixeles
}

function cambiarTexto(operador) {
for(let element of elementsList) {
   //Obtener el total de pixel de cada párrafo.
  const currentSize = getElementFontSize(element);

   //Restar o sumar, dependiendo del operador.
  const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
   //Aplicarle al parrafo actual el nuevo tamaño.
  element.style.fontSize = newFontSize
}

}
function textoNormal(){
for(let element of elementsList) {
   //Obtener el total de pixel de cada párrafo.
  const currentSize = 1;

   //Restar o sumar, dependiendo del operador.
  const newFontSize =  (currentSize) + 'rem';
   //Aplicarle al parrafo actual el nuevo tamaño.
  element.style.fontSize = newFontSize
}

}

function contrasteNegro() {

backgroundColor = "#000000";
color = "#ffff00";

document.body.setAttribute('style', 'background: '+color+' !important;')


var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+color+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+color+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}
}
function contrasteNormal() {
location.reload()
}

function contrasteVainilla(){
backgroundColor="#ffffcc"
color="black"

document.body.setAttribute('style', 'background: '+backgroundColor+' !important;')


var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+backgroundColor+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

}

function contrasteCielo(){
backgroundColor="#99ccff"
color="black"

document.body.setAttribute('style', 'background: '+backgroundColor+' !important;')


var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+backgroundColor+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important; ');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;','width:3px;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

}

</script>