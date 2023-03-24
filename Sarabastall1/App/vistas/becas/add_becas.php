<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/beca">Becas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Beca</li>
    </ol>
  </nav>
   
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Beca</h1>
      </div>
  </div> 
<div class="shadow card1 p-3">
  <!-- <?php if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div>
  <?php endif?> -->
  <form method="post">
    <div class="row">
      <div class="mb-3 col-4">
        <label for="nombre_as" class="form-label">Alumno</label>
        <select class="form-select" name="alumno_be" id="alumno" aria-label="Default select example">
        <option value="" disabled selected >Seleccione un alumno...</option>
        <?php foreach ($datos['alumno']as $alumno): ?>
  <option id="alum<?php echo $alumno->idPersona?>" value="<?php echo $alumno->idPersona?>"><?php echo $alumno->Nombre?></option>

  <?php endforeach?>
</select>  
      </div>
      <div class="mb-3 col-4">
        <label for="dni_as" class="form-label">Nota media</label>
        <input type="number" class="form-control" id="importe_pr" name="notaMedia" max="10" required pattern="[0-9]+">   
      </div>

      <div class="mb-3 col-4">
        <label for="dni_as" class="form-label">Importe</label>
        <input type="number" class="form-control" id="importe_pr" name="importe_be" required pattern="[0-9]+">   
      </div>

      <div class="mb-3 col-6">
        <label for="titulo_as" class="form-label">Centro</label>
        <select class="form-select" name="centro_be" aria-label="Default select example" required>
        <option value="" disabled selected >Seleccione un centro...</option>
        <?php foreach ($datos['centros']as $centro): ?>
  <option value="<?php echo $centro->idCentro?>"><?php echo $centro->NombreCentro?></option>
  
  <?php endforeach?>
</select>   
      </div>
      <div class="mb-3 col-6">
        <label for="titulo_as" class="form-label">Tipo de beca</label>
    
        <select class="form-select" id="tipoBeca" name="tipo_be" aria-label="Default select example">
        <option value="" disabled selected >Seleccione un tipo de beca...</option>
        <?php foreach ($datos['tipoBeca']as $beca): ?>
          <option id="option<?php echo $beca->idTipoBeca?>" value="<?php echo $beca->idTipoBeca?>"><?php echo $beca->NombreBeca?></option>
        <?php endforeach?>
</select>
   

      </div>
      <div class="cedula mb-3 col-12  d-none" id="miinput">
        <label for="madrina_be" class="form-label">Madrina:</label>
        <select class="form-select" id="madrina_be" name="madrina_be" aria-label="Default select example">
          <option value="" disabled selected >Seleccione madrina...</option>
          <?php foreach ($datos['madrinas']as $madrina): ?>
            <option value="<?php echo $madrina->idPersona?>"><?php echo $madrina->Nombre?></option>
          <?php endforeach?>
        </select>
      </div>
      <div class="mb-3 col-12">
        <label for="dni_as" class="form-label">Observaciones</label>
        <textarea class="form-control" name="obs_be"></textarea>
      </div>
      <div class="mb-3 col-6">
        <label for="dni_as" class="form-label">Fecha inicio</label>
        <input type="date" class="form-control" id="importe_pr" name="fechaInicio_be" value="<?php echo date('Y-m-d') ?>">   
      </div>
      <div class="mb-3 col-6">
        <label for="dni_as" class="form-label">Fecha Fin</label>
        <input type="date" class="form-control" id="importe_pr" name="fechaFin_be" required>   
      </div>
      <div class="col-8 col-sm-8 col-md-8 col-lg-10 col-xl-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <a class="w-100 btn btn-danger btn-lg " href="<?php echo RUTA_URL ?>/beca">Cancelar</a>
      </div>
    </div>  

  </form>
</div>
          </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"
  ></script>
  <script>
//script para que aparezca el select con la madrina cuando selecciones la beca carrera    
$('#tipoBeca').on('change',function(){
	var selectValor = $(this).val();
	if (selectValor == '2') {
			$('.cedula').removeClass('d-none');
	}else {
		$('#miinput').addClass('d-none');
	}
});
//script para en caso de seleccionar un usuario masculino la beca carrera se ponga en display none
const alumno=<?php echo json_encode($datos['alumno'])?>;
let t=document.getElementById("tipoBeca");

let p=document.getElementById("alumno");
let a=document.getElementById("option2");

   p.addEventListener("change", function() {
    
    let o=alumno.find(elemento=>elemento.idPersona ==p.value);
   
    if (o.Genero=="Masculino") {

      a.style="display:none";

    }else{

      a.style="display:block" 

    }
    
 });
//script para controlar que los usuarios que pueden obtener becas no tengan una ya y que si ha pasado mas de un año pueda volver a obtener una beca
var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;
var year = today.getFullYear();
var hoy=`${year}/${month}/${day}`;
  
 const fechas=<?php echo json_encode($datos['fechas'])?>;
var data=[];
fechas.forEach(e => {
  data.push(e.Alumno_idPersona);
});

var data1=[];
alumno.forEach(e => {
  data1.push(e.idPersona);
});

const diferenciaDeArreglos = (arr1, arr2) => {
	return arr1.filter(elemento => arr2.indexOf(elemento) == -1);
}
const ex = diferenciaDeArreglos(data1, data);
for (let i = 0; i < data.length; i++) {
  let id =document.getElementById("alum"+data[i]);

fechas.forEach(el => {

    
if (new Date(el.Fecha_Fin).getTime()>new Date(hoy).getTime()) {
  id.style="display:none";
  
}else{
  id.style="display:block";
  
}

});
  
}

  </script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
