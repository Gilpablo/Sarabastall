<?php

class Beca extends Controlador{
    public function __construct(){

        Sesion::iniciarSesion($this->datos);
           
        $this->becaModelo = $this->modelo('BecaModelo');

        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }

    }


    public function index(){
        $this->datos["becas"]=$this->becaModelo->getTipoBeca();
      
        $this->vista("becas/index",$this->datos);
     
        
    }

    
    public function add_becas($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $beca = $_POST;
            // print_r($beca);
            if (!$_POST['alumno_be'] && !$_POST['importe_be'] && !$_POST['centro_be']&& !$_POST['tipo_be']&& !$_POST['obs_be']&& !$_POST['fechaInicio_be']&& !$_POST['fechaFin_be']&& !$_POST['notaMedia']) {
                redireccionar("/becas/add_becas/1");
            }else if($_POST['madrina_be']){
                if ($this->becaModelo->addBecaMadrina($beca)) {
                    redireccionar("/becas");
                }else{
                    echo "error";
                }
            }else{
                if ($this->becaModelo->addBeca($beca)) {
                    redireccionar("/beca");
                }else{
                    echo "error";
                }
            }
            
            
        }else{           
            $this->datos["madrinas"]=$this->becaModelo->getMadrinas();
            $this->datos["centros"]=$this->becaModelo->getCentros();
            $this->datos["tipoBeca"]=$this->becaModelo->getTipoBeca();
            $this->datos["alumno"]=$this->becaModelo->getPersonas();
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("becas/add_becas",$this->datos);
        }    
    }


   

    public function ver_becas($idTipoBeca){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }



        $this->datos["beca"]=$this->becaModelo->getBecas($idTipoBeca);
        $this->datos["tipoBeca"]=$this->becaModelo->getTipoBeca2($idTipoBeca);
        //print_r($this->datos["beca"][0]->Madrina_idPersona);
        $idMadrina=$this->datos["beca"][0]->Madrina_idPersona;
        $this->datos["madrina"]=$this->becaModelo->getMadrina($idMadrina);

          //$this->datos["cant"]=$this->becaModelo->getCantidadBecas();
        //    echo '<pre>';
        // print_r($this->datos["beca"]);exit();
            $this->vista("becas/ver_becas",$this->datos);
            

    
        // if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //     // $prestamo=$_POST;
        //     // $idPrestamo=$idPrestamo;
        //     // if($this->prestamoModelo->editPrestamo($prestamo,$idPrestamo)){
              
        //     //     redireccionar("/prestamos/ver_prestamo/$idPrestamo");
        //     // } else{
        //     //     echo "se ha producido un error!!!!";
        //     // }

        // }else{
        //     $this->datos["becas"]=$this->becaModelo->getBecas($idTipoBeca);
        //     // $this->datos["prestamo"]->acciones = $this->prestamoModelo->getAccionesPrestamo($idPrestamo);
        //     $this->datos["beca"]=$this->becaModelo->getTipoBeca();
            
           
        //     $this->vista("becas/ver_becas",$this->datos);

          
        // }
    
}


public function ver_beca($idBeca){
  
    $this->datos["rolesPermitidos"] = [10];
        
    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
        echo "No tienes privilegios!!!";
        exit();
       
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $idTipoBeca=$_POST["tipoBeca"];
        $beca=$_POST;
        $idBeca=$idBeca;
        if($this->becaModelo->editBeca($beca,$idBeca)){
          
            redireccionar("/becas/ver_beca/$idBeca");
        } else{
            echo "se ha producido un error!!!!";
        }

    }else{
        $this->datos["becas"]=$this->becaModelo->getBecas2($idBeca);
        // $this->datos["prestamo"]->acciones = $this->prestamoModelo->getAccionesPrestamo($idPrestamo);
        // $this->datos["beca"]=$this->becaModelo->getTipoBeca();
        $this->datos["centros"]=$this->becaModelo->getCentros();
        $this->vista("becas/ver_beca",$this->datos);

      
    }

}




    public function eliminar_beca($idBeca){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
                
           $idBeca=$_POST['idBeca'];
           $idTipoBeca=$_POST['tipoBeca'];
            if($this->becaModelo->delBeca($idBeca)){
                redireccionar("/beca");
                
            } else{
                echo "se ha producido un error!!!!";
            }

       
        
    }


}