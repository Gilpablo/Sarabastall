<?php

class Prestamo extends Controlador{
    public function __construct(){

    
        Sesion::iniciarSesion($this->datos);
        //$this->datos["menuActivo"]="asesorias";
    
        $this->prestamoModelo = $this->modelo('PrestamoModelo');


        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
        
    
    }


    public function index(){
        $this->datos["prestamos"]=$this->prestamoModelo->getPrestamos();
   
        $this->vista("prestamos/index",$this->datos);
       // $this->vista("prestamos/add_prestamos",$this->datos);
        
    }

    
    public function add_prestamo($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $prestamo = $_POST;
            //print_r($asesoria);
            if (!$_POST['titulo_pr'] && !$_POST['importe_pr'] && !$_POST['persona_pr']) {
                redireccionar("/prestamo/add_prestamos/1");
            }else{
                if ($this->prestamoModelo->addPrestamo($prestamo)) {
                    redireccionar("/prestamo/add_prestamo");
                }else{
                    echo "error";
                }
            }
            
            
        }else {
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("prestamos/add_prestamos",$this->datos);
        }    
    }


    public function ver_prestamo($idPrestamo){
       

    
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $prestamo=$_POST;
            $idPrestamo=$idPrestamo;
            if($this->prestamoModelo->editPrestamo($prestamo,$idPrestamo)){
              
                redireccionar("/prestamo/ver_prestamo/$idPrestamo");
            } else{
                echo "se ha producido un error!!!!";
            }

        }else{
            $this->datos["prestamo"]=$this->prestamoModelo->getPrestamo($idPrestamo);
            $this->datos["prestamo"]->acciones = $this->prestamoModelo->getAccionesPrestamo($idPrestamo);
            // print_r($this->datos["prestamo"]);exit();
            $this->vista("prestamos/ver_prestamo",$this->datos);
          
        }
    
}



    public function eliminar_prestamo($idPrestamo){
    
           $prestamo=$_POST['idPrestamo'];
           
            if($this->prestamoModelo->delPrestamo($prestamo)){
                redireccionar("/");
                
            } else{
                echo "se ha producido un error!!!!";
            }

       
        
    }


    public function add_accion(){
        if ($_SERVER["REQUEST_METHOD"]=="POST") {

            $accion = $_POST;
           

          

            if($this->prestamoModelo->addAccion($accion)){
                redireccionar("/prestamo/ver_prestamo/".$_POST['idPrestamo']);
            } else{
                echo "se ha producido un error!!!!";
            }
        }

    }
    public function cerrar_prestamo(){
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
         $prestamo=$_POST['idPrestamo'];
          
            // if($this->asesoriaModelo->asesoriaCerrada($accion['id_asesoria'])){
            //     exit();
            // }

            if($this->prestamoModelo->cerrarPrestamo($prestamo)){
                redireccionar("/prestamo");
            } else{
                echo "se ha producido un error!!!!";
            }
        }
    }
    }
