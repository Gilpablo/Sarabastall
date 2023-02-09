<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>

<div class="container mt-3">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
    <li class="breadcrumb-item">Editar Perfil</a></li>



  </nav>

  <h1 class="text-center">Editar Perfil<br>
  <i class="bi bi-person-circle"></I></h1>

      <div class='row'>
       
        <div class="shadow-lg container card col-12">

            <form class="my-3" method='post' class='mb-5'>
                <div class="row">
                 
                <input type="hidden" name="idPersona" value="<?php echo $datos['usuario']->idPersona?>">

                 <div class="mb-3 col-4">
                    <label for="nombre_as" class="form-label">Username</label>
                    <input  type="text"  class="form-control" id="username" name="username" value="<?php echo $datos['usuario']->Username?>" required>   
                </div>
                <div class="mb-3 col-4">
                    <label for="nombre_as" class="form-label">Contraseña</label>
                    <input  type="password"  class="form-control" id="clave" name="clave" value="<?php echo $datos['usuario']->Clave?>" required>   
                </div>
       
            
                             <div class="mb-3 col-4">
                                <label for="nombre_as" class="form-label">Nombre</label>
                                <input  type="text"  class="form-control" id="username" name="nombre" value="<?php echo $datos['usuario']->Nombre?>" requied>   
                            </div>
                            <div class="mb-3 col-4">
                                <label for="nombre_as" class="form-label">Apellido</label>
                                <input  type="text"  class="form-control" id="username" name="apellido" value="<?php echo $datos['usuario']->Apellido?>" required>   
                            </div>
                            <div class="mb-3 col-4">
                                <label for="nombre_as" class="form-label">Telefono</label>
                                <input  type="text"  class="form-control" id="username" name="telefono" value="<?php echo $datos['usuario']->Telefono?>" onkeyup="validarTelefono(this)" required>   
                            </div>
                            <div class="mb-3 col-4">
                                <label for="nombre_as" class="form-label">Correo</label>
                                <input  type="email"  class="form-control" id="username" name="correo" value="<?php echo $datos['usuario']->Correo?>" onkeyup="validarCorreo(this)" required>   
                            </div>
                            <div class="mb-3 col-8">
                            <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button> 
                            </div>
                            <div class="mb-3 col-4">
                            <a class=" w-100 btn btn-primary btn-lg" href="<?php echo RUTA_URL ?>">Volver</a> 
                            </div>
               

            
            </form>
        </div>
    </div>
        
        
                
                  
  
</div>
<script>
function validarTelefono(telefono) {
    var t = telefono.value;
    if (!(/^([0-9]{9})+$/.test(t))) {
        telefono.style = "border: 1px solid red;";
        return false;
    } else {
        telefono.style = "border: 1px solid green";
        return true;
    }
  }

function validarCorreo(correo) {

var c = correo.value;

if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(c))) {
    correo.style = "border: 1px solid red";
    return false;
} else {
    correo.style = "border: 1px solid green";
    return true;
}
}


function validarFormulario() {
    event.preventDefault();
    
    var telefono = document.getElementById('telefono_us');
    var tel = validarTelefono(telefono);
    var correo = document.getElementById('email_us');
    var c = validarCorreo(correo);
    
    if (tel && c) {
        document.formulario.submit();
    }else{
      alert("Alguno de los datos introducidos no es correcto");
    }
}
</script>
