<?php

class Usuario extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->usuarioModelo=$this->modelo('UsuarioModelo');
        
        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
        
    }

    public function index(){

        $this->datos["usuariosActivos"]=$this->usuarioModelo->getUsuariosActivos();
        
        $this->vista("/usuarios/index", $this ->datos);
        
        
    }

    public function add_usuario($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $usuario = $_POST;
            
            if ($this->usuarioModelo->addUsuario($usuario)) {
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