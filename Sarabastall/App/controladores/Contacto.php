<?php

class Contacto extends Controlador{
    public function __construct(){
        
        $this->contactoModelo=$this->modelo('ContactoModelo');
    }

    public function index(){
       
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos=$_POST;
            print_r($datos);
        }else {
            $this->vista("contacto", $this ->datos);
        }
    }
}
