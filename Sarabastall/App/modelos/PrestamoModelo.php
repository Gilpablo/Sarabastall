<?php

    class PrestamoModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function getPrestamo($idPrestamo){
            $this->db->query("SELECT * FROM Prestamo where idPrestamo = :idPrestamo   ");
          $this->db->bind(':idPrestamo', $idPrestamo);
            return $this->db->registro();
        }


        public function addPrestamo($datos){

            $this->db->query("INSERT INTO Prestamo (Titulo, Importe, idMovimiento, idTipoPrestamo ,Persona, Fecha_PedirPrestamo, id_estado) 
                        VALUES (:titulo_pr, :importe_pr, 1, 1, :persona_pr, NOW(), 2)");


            $this->db->bind(':titulo_pr' ,trim($datos['titulo_pr']));
            $this->db->bind(':importe_pr' ,trim($datos['importe_pr'])); 
            $this->db->bind(':persona_pr' ,trim($datos['persona_pr'])); 

            


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }

            

        }


        function getPrestamos(){

            $this->db->query("SELECT * FROM Prestamo pr, Estado e where  e.id_estado=pr.id_estado order by pr.Fecha_PedirPrestamo desc");
            
            return $this->db->registros();
        }


        function delPrestamo($idPrestamo){

            
            $this->db->query("DELETE FROM Prestamo where idPrestamo=:idPrestamo");
            $this->db->bind(':idPrestamo', $idPrestamo);

            print_r($idPrestamo);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }


        function cerrarPrestamo($idPrestamo){
        
            $this->db->query("UPDATE Prestamo set id_estado = 1 where idPrestamo=:idPrestamo");

            $this->db->bind(':idPrestamo', $idPrestamo);


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }


        function getAccionesPrestamo($id_asesoria){

            $this->db->query("SELECT * FROM Abonar 
                                WHERE Prestamo_idPrestamo=:idPrestamo
                               order by Fecha_Abonado desc");
            

            $this->db->bind(':idPrestamo', $id_asesoria);
            return $this->db->registros();
        }

        function editPrestamo($datos,$idPrestamo){

         
            $this->db->query("UPDATE Prestamo SET Titulo=:Titulo, Importe=:Importe WHERE idPrestamo=:idPrestamo");


            $this->db->bind(':Titulo', $datos['Titulo']);
            $this->db->bind(':Importe', $datos['Importe']);
            $this->db->bind(':idPrestamo', $idPrestamo);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        function addAccion($datos){
           
            $this->db->query("UPDATE Prestamo SET id_estado = 3 WHERE idPrestamo=:idPrestamo");

            $this->db->bind(':idPrestamo' ,$datos['idPrestamo']);

            $this->db->execute();
           

            $this->db->query("INSERT INTO Abonar (Fecha_Abonado, cantidad, Prestamo_idPrestamo, idMovimiento) 
                        VALUES (NOW(),:cantidad,:idPrestamo,1)");
            
            $this->db->bind(':idPrestamo' ,$datos['idPrestamo']);
   
            $this->db->bind(':cantidad',$datos['Importe']);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }



    }