<?php

class Centro extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        
        $this->centroModelo=$this->modelo('CentroModelo');

        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }
    }

    public function index(){
       
        $this->datos["centrosActivos"]=$this->centroModelo->getCentros();

        $this->vista("/centros/index", $this ->datos);
    }

    public function add_centro($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $centro = $_POST;
            
            if ($this->centroModelo->addCentro($centro)) {
                redireccionar("/centro");
            }else{
                echo "error";
            }
            
            
        }else {
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->datos["nombreCiudad"]=$this->centroModelo->getNombreCiudades();
            $this->vista("centros/add_centro",$this->datos);
        }    
    }

    public function ver_centro($id_centro){
        
        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
         
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                $centro = $_POST;

                if ($this->centroModelo->editCentro($centro,$id_centro)) {
                redireccionar("/centro");
                }else{
                    echo "error";
                }
            
            }else{
                $this->datos["centro"]=$this->centroModelo->getCentro($id_centro);
                $this->datos["nombreCiudad"]=$this->centroModelo->getNombreCiudades();
                
                $this->vista("centros/ver_centro",$this->datos);
            }
        
    }

    public function borrar_centro($id_centro){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
        if ($this->centroModelo->deleteCentro($id_centro)) {
            redireccionar("/centro");
        }else{
            echo "error";
        }
        
    }
}