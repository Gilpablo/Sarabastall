<?php

class Inicio extends Controlador{
    public function __construct(){
        //Sesion::iniciarSesion($this->datos);
        
    }

    public function index(){
        /*if (Sesion::sesionCreada($this->datos)){
            
            switch ($this->datos['usuarioSesion']->idRol) {
                case 10:
                    redireccionar('/admin');
                    break;
                case 20:
                    redireccionar('/profesor');
                    break;
                case 30:
                    redireccionar('/aprendiz');
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