<?php

class Movimiento extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->movimientoModelo=$this->modelo('MovimientoModelo');

        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
    }

    public function index(){
       
        $this->datos["movimientos"]=$this->movimientoModelo->getMovimientos();
        
        $this->vista("/movimientos/index", $this ->datos);
    
    }
}
