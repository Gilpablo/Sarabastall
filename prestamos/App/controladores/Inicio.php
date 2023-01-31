<?php

class Inicio extends Controlador{
    public function __construct(){

     

        
        $this->datos["menuActivo"]="prestamos";

        $this->prestamoModelo=$this->Modelo('PrestamoModelo');


        

    }

    public function index(){
        $this->datos["prestamos"]=$this->prestamoModelo->getPrestamos();

        foreach($this->datos["prestamos"] as $prestamo){

            $prestamo->acciones = $this->prestamoModelo->getPrestamos($prestamo->idPrestamo);
        }

        $this->vista("index", $this ->datos);
    }
}
