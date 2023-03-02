<?php

class Usuario extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->usuarioModelo=$this->modelo('UsuarioModelo');
        
        $this->datos["rolesPermitidos"] = [10,20,30];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           //redireccionar('/');
        }
        
    }

    public function index(){

        $this->datos["usuariosActivos"]=$this->usuarioModelo->getUsuariosActivos();
        
        $this->vista("/usuarios/index", $this ->datos);
        
        
    }
}