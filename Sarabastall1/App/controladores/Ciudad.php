<?php

class Ciudad extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        
        $this->ciudadModelo=$this->modelo('CiudadModelo');

        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
    }

    public function index(){
       
        $this->datos["ciudadesActivas"]=$this->ciudadModelo->getCiudades();

        $this->vista("/ciudades/index", $this ->datos);
    }

    public function add_ciudad($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $ciudad = $_POST;
            
            if ($this->ciudadModelo->addCiudad($ciudad)) {
                redireccionar("/ciudad");
            }else{
                echo "error";
            }
            
            
        }else {
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("ciudades/add_ciudad",$this->datos);
        }    
    }

    public function ver_ciudad($id_ciudad){
        
        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
         
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                $ciudad = $_POST;

                if ($this->ciudadModelo->editCiudad($ciudad,$id_ciudad)) {
                redireccionar("/ciudad");
                }else{
                    echo "error";
                }
            
            }else{
                $this->datos["ciudad"]=$this->ciudadModelo->getCiudad($id_ciudad);
                
                
                $this->vista("ciudades/ver_ciudad",$this->datos);
            }
        
    }

    public function borrar_ciudad($id_ciudad){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
        if ($this->ciudadModelo->deleteCiudad($id_ciudad)) {
            redireccionar("/ciudad");
        }else{
            echo "error";
        }
        
    }
}
