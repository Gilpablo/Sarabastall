<?php

class Inicio extends Controlador{
    public function __construct(){
       
        
    }

    public function index(){
        /*if (Sesion::sesionCreada($this->datos)){
            
            switch ($this->datos['usuarioSesion']->idRol) {
                case 10:
                    redireccionar('/inicio');
                    break;
                case 20:
                    redireccionar('/entrenador');
                    break;
                case 30:
                    redireccionar('/socio');
                    break;
                case 40:
                    redireccionar('/no_socio');
                    break;
            }

        } else {
            redireccionar('/login');
        }*/
        $this->vista("inicio", $this ->datos);
    }
}