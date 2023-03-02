<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/usuario">Usuarios</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Usuario</li>
    </ol>
  </nav>
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>Añadir Usuario</h1>
      </div>
  </div> 

  <?php if($datos["error"]==1): ?>
    <div class="alert alert-danger" role="alert">
      Se ha de rellenar un campo obligatoriamente!
    </div>
  <?php endif?>
  <form method="post" name="formulario" ENCTYPE="multipart/form-data"   onsubmit="return validarFormulario()"> 
    <div class="row">
      <div class="mb-3 col-6">
        <label for="nombre_us" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_us" name="nombre_us" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="apellido_us" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido_us" name="apellido_us" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="genero_us" class="form-label">Genero</label>
        <select name="genero_us" id="genero_us" class="form-control" required>
            <option value="">Selecione el genero...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>   
      </div>

      <div class="mb-3 col-6">
        <label for="telefono_us" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="telefono_us" name="telefono_us" onkeyup="validarTelefono(this)" required>   
      </div>

      <div class="mb-3 col-6">
        <label for="email_us" class="form-label">Email</label>
        <input type="email" class="form-control" id="email_us" name="email_us" onkeyup="validarCorreo(this)" required>
      </div>

      <div class="mb-3 col-6">
        <label for="fechanac_us" class="form-label">Fecha_Nacimento</label>
        <input type="date" class="form-control" id="fechanac_us" name="fechanac_us" required>   
      </div>

      <div class="mb-3 col-12">
        <label for="tipo_us" class="form-label">Tipo</label>
        <select name="tipo_us" id="tipo_us" class="form-control" required>
            <option value="">Selecione el tipo...</option>
            <option value="admin">Admin</option>
            <option value="profesor">Profesor</option>
            <option value="aprendiz">Aprendiz</option>
            <option value="alumno">Alumno</option>
            <option value="madrina">Madrina</option>
        </select>
      </div>

      <div class="mb-3 col-12 " id="opciones">

      </div>

      <script>

         //declaramos p y le decimos que tome el valor que hay en id="Departamento"
        let p=document.getElementById("tipo_us");
        
        //con el addEventListener le decimos que cambie el valor cuando selecciones en el select de departamentos
        p.addEventListener("change", function() {
        
        //vaciamos los checkbox cada vez que cambiemos de departamento en el select
        document.getElementById("opciones").innerHTML="";
       
        if (p.value=="alumno") {
            
            var myDiv = document.getElementById("opciones");

            var tutor_legal = document.createElement('input');
            tutor_legal.type = "text";
            tutor_legal.name = "tutor_legal";
            tutor_legal.id = "tutor_legal";
            tutor_legal.className= "form-control mb-3 col-6";
                                        
            var label = document.createElement('label');
            label.className="form-label"                            
            var txt= document.createTextNode("Padre");
            var br = document.createElement('br');        
            label.appendChild(txt);
            myDiv.appendChild(label);
            myDiv.appendChild(br);    
            myDiv.appendChild(tutor_legal);
            

            var curso_actual = document.createElement('input');
            curso_actual.type = "text";
            curso_actual.name = "curso_actual";
            curso_actual.id = "curso_actual";
            curso_actual.className= "form-control mb-3 col-6";
                                        
            var label = document.createElement('label');
            label.className="form-label"                            
            var txt= document.createTextNode("Curso_Actual");
            var br = document.createElement('br');        
            label.appendChild(txt);
            myDiv.appendChild(label);
            myDiv.appendChild(br);    
            myDiv.appendChild(curso_actual);

            var imagen = document.createElement('input');
            imagen.type = "file";
            imagen.name = "imagen";
            imagen.id = "imagen";
            imagen.accept= ".jpg , .png , .gif";
            imagen.className= "form-control mb-3 col-6";
                                        
            var label = document.createElement('label');
            label.className="form-label"                            
            var txt= document.createTextNode("Imagen");
            var br = document.createElement('br');        
            label.appendChild(txt);
            myDiv.appendChild(label);
            myDiv.appendChild(br);    
            myDiv.appendChild(imagen);

        }
        
        if(p.value==="admin" || p.value==="profesor" || p.value==="aprendiz"){

            var myDiv = document.getElementById("opciones");

            var username = document.createElement('input');
            username.type = "text";
            username.name = "username";
            username.id = "username";
            username.className= "form-control mb-3 col-6";
                                        
            var label = document.createElement('label');
            label.className="form-label"                            
            var txt= document.createTextNode("Username");
            var br = document.createElement('br');        
            label.appendChild(txt);
            myDiv.appendChild(label);
            myDiv.appendChild(br);    
            myDiv.appendChild(username);

            var password = document.createElement('input');
            password.type = "password";
            password.name = "clave";
            password.id = "clave";
            password.className= "form-control mb-3 col-6";
                                        
            var label = document.createElement('label');
            label.className="form-label"                            
            var txt= document.createTextNode("Password");
            var br = document.createElement('br');        
            label.appendChild(txt);
            myDiv.appendChild(label);
            myDiv.appendChild(br);    
            myDiv.appendChild(password);

        }

         
        });
                    
                    
        </script>
    
      <div class="col-8 col-sm-8 col-md-8 col-lg-10 col-xl-10">
        <button type="submit" class=" w-100 btn btn-success btn-lg">Guardar</button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL ?>/usuario">Cancelar</a>
      </div>
    </div>  
  </form>
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