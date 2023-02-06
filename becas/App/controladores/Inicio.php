<?php

class Inicio extends Controlador{
    public function __construct(){

     

        
        $this->datos["menuActivo"]="becas";

        $this->becaModelo=$this->Modelo('BecaModelo');


        

    }

    public function index(){
        $this->datos["becas"]=$this->becaModelo->getTipoBeca();

        
       // $this->datos["cant"]=$this->becaModelo->getCantidadBecas($this->datos["becas"]->idTipoBeca);
        //print_r( $this->datos["becas"]);
        
         /*foreach($this->datos["becas"] as $beca){
          // print_r( $beca); 
            $this->datos["cant"]=$this->becaModelo->getCantidadBecas($beca->idTipoBeca);
          print_r( $this->datos["cant"]);
           // $this->vista("index", $this ->datos);
         }*/
         
        $this->vista("index", $this ->datos);
        
    }
}
