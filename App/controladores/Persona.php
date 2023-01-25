<?php

class Persona extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->personaModelo=$this->modelo('PersonaModelo');

        

        //$this->datos["usuarioSesion"]->id_rol=obtenerRol($this->datos["usuarioSesion"]->roles);

        $this->datos["rolesPermitidos"] = [10,20,30];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           //redireccionar('/');
        }
    }

    public function index(){
       
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos=$_POST;
            print_r($datos);
        }else {
            $this->vista("persona", $this ->datos);
        }
    }
}