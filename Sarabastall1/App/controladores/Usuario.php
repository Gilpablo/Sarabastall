<?php

class Usuario extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->usuarioModelo=$this->modelo('UsuarioModelo');
        
        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }
        
    }

    public function index(){

        $this->datos["usuariosActivos"]=$this->usuarioModelo->getUsuariosActivos();
        
        $this->vista("/usuarios/index", $this ->datos);
        
        
    }

    public function add_usuario($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $usuario = $_POST;
            $foto = $_FILES['imagen']['name'];
         
            $tipo = $_FILES['imagen']['type'];
            
            $temp = $_FILES['imagen']['tmp_name'];
          
            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
               - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            } else {
                //If the image is correct in size and type
                //Trying to upload to the server
                if (move_uploaded_file($temp, '/var/www/html/sarabastal_prueba/Sarabastall1/App/vistas/usuarios/imagenes/'.$foto)) {
                    //Change the permissions of the file to 777 to be able to modify it later
                    chmod('/var/www/html/sarabastal_prueba/Sarabastall1/App/vistas/usuarios/imagenes/'.$foto, 0777);
                }
            }
            if ($this->usuarioModelo->addUsuario($usuario,$foto)) {
                redireccionar("/usuario");
            }else{
                echo "error";
            }
            
            
        }else {
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("usuarios/add_usuario",$this->datos);
        }    
    }

    public function ver_usuario($id_usuario){
        
        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
         
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                $usuario = $_POST;
                $idRol=$this->usuarioModelo->getUsuario($id_usuario)->idRol;
                if ($this->usuarioModelo->editUsuario($usuario,$id_usuario,$idRol)) {
                redireccionar("/usuario");
                }else{
                    echo "error";
                }
            
            }else{
                $this->datos["usuario"]=$this->usuarioModelo->getUsuario($id_usuario);
                
                
                $this->vista("usuarios/ver_usuario",$this->datos);
            }
        
    }

    public function borrar_usuario($id_usuario){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
        if ($this->usuarioModelo->deleteUsuario($id_usuario)) {
            redireccionar("/usuario");
        }else{
            echo "error";
        }
        
    }
}