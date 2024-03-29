<?php

    class BecaModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function getBecas($idTipoBeca){
                //juntar con alumno y personas para mostrar el nombre de persona
            $this->db->query("SELECT Beca.*, Centro.NombreCentro as NombreCentro, Persona.Nombre, TipoBeca.NombreBeca  
            FROM Beca,Centro,Persona,Alumno,TipoBeca 
            WHERE Beca.idTipoBeca = :idTipoBeca and Beca.idCentro=Centro.idCentro and Persona.idPersona=Alumno.idPersona and Beca.idTipoBeca=TipoBeca.idTipoBeca and Beca.Alumno_idPersona=Persona.idPersona");
          $this->db->bind(':idTipoBeca', $idTipoBeca);
         
            return $this->db->registros();
        }

        public function getBeca($idBeca){
            $this->db->query("SELECT * FROM Beca
                                NATURAL JOIN TipoBeca 
                                where idBeca = :idTipoBeca");
            $this->db->bind(':idTipoBeca', $idBeca);

            return $this->db->registros();
        }
        public function getBecas2($idBeca){

            $this->db->query("SELECT *
            FROM Beca,Centro,Persona,Alumno,TipoBeca 
            WHERE Beca.idBeca=:idBeca and Beca.idCentro=Centro.idCentro and Persona.idPersona=Alumno.idPersona and Beca.idTipoBeca=TipoBeca.idTipoBeca and Beca.Alumno_idPersona=Persona.idPersona");
            $this->db->bind(':idBeca', $idBeca);
            
            return $this->db->registro();
            
                    }

        public function addBeca($datos,$nombre){


            // print_r($datos);
            // exit();

            $this->db->query("INSERT INTO Beca (Importe, Fecha_Fin, Fecha_Inicio, Observaciones, Alumno_idPersona, idCentro, Fecha_AlumnoBeca, NotaMedia_Alumno, idTipoBeca) 
                                VALUES (:importe_be, :fechaFin_be, :fechaInicio_be, :obs_be,:alumno_be, :centro_be, NOW(), :notaMedia, :tipo_be)");

            $this->db->bind(':alumno_be' ,trim($datos['alumno_be']));
            $this->db->bind(':importe_be' ,trim($datos['importe_be'])); 
            $this->db->bind(':centro_be' ,trim($datos['centro_be'])); 
            $this->db->bind(':tipo_be' ,trim($datos['tipo_be'])); 
            $this->db->bind(':obs_be' ,trim($datos['obs_be'])); 
            $this->db->bind(':fechaInicio_be' ,trim($datos['fechaInicio_be'])); 
            $this->db->bind(':fechaFin_be' ,trim($datos['fechaFin_be'])); 
            $this->db->bind(':notaMedia' ,trim($datos['notaMedia'])); 
            
            $idBeca = $this->db->executeLastId();

            $this->db->query("INSERT INTO Movimiento (Procedencia, Accion, Fecha_Movimiento, Cantidad, idTipoMovimiento, idBeca) 
                                    VALUES (:alumno_be, 'Dar una Beca', NOW(), :importe_be, 2, :idBeca)");

            

            $this->db->bind(':idBeca' ,$idBeca);
            $this->db->bind(':alumno_be' ,"Pagar la beca al alumno ".$nombre);
            $this->db->bind(':importe_be' ,trim($datos['importe_be'])); 

            if ($this->db->execute()) {
               
                return true;
            }else{
                return false;
            }

            

        }

        public function addBecaMadrina($datos){

            $this->db->query("INSERT INTO Beca (Importe, Fecha_Fin, Fecha_Inicio, Observaciones, Alumno_idPersona, Madrina_idPersona,idCentro, Fecha_AlumnoBeca, NotaMedia_Alumno, idTipoBeca) 
                                VALUES (:importe_be, :fechaFin_be, :fechaInicio_be, :obs_be,:alumno_be, :madrina_be ,:centro_be, NOW(), :notaMedia, :tipo_be)");

            $this->db->bind(':alumno_be' ,trim($datos['alumno_be']));
            $this->db->bind(':importe_be' ,trim($datos['importe_be'])); 
            $this->db->bind(':centro_be' ,trim($datos['centro_be'])); 
            $this->db->bind(':tipo_be' ,trim($datos['tipo_be'])); 
            $this->db->bind(':obs_be' ,trim($datos['obs_be'])); 
            $this->db->bind(':fechaInicio_be' ,trim($datos['fechaInicio_be'])); 
            $this->db->bind(':fechaFin_be' ,trim($datos['fechaFin_be'])); 
            $this->db->bind(':notaMedia' ,trim($datos['notaMedia'])); 
            $this->db->bind(':madrina_be' ,trim($datos['madrina_be'])); 
            
            $idBeca = $this->db->executeLastId();
            $this->db->query("INSERT INTO Movimiento (Procedencia, Accion, Fecha_Movimento, Cantidad, idTipoMovimento, idBeca) 
                                VALUES ('Alcañiz', 'Beca', NOW(), :importe_be, '2', :idBeca)");

            $this->db->bind(':idBeca' ,$idBeca);
            $this->db->bind(':importe_be' ,trim($datos['importe_be'])); 

            if ($this->db->execute()) {
               
                return true;
            }else{
                return false;
            }


        }

        function getTipoBeca2($idTipoBeca){

            $this->db->query("SELECT * FROM TipoBeca where idTipoBeca = :idTipoBeca");
            
            $this->db->bind(':idTipoBeca', $idTipoBeca);


            return $this->db->registro();
        }


        function getPersonas(){

            $this->db->query("SELECT * FROM Persona where idPersona in (Select idPersona from Alumno)
                              ");
             return $this->db->registros();
        }

        function getCentros(){
            $this->db->query("SELECT * FROM Centro 
            ");
return $this->db->registros();
        }

        function getTipoBeca(){

            $this->db->query("SELECT * FROM TipoBeca
            ");
            
         

            return $this->db->registros();
        }


        function delBeca($idBeca){


            $this->db->query("DELETE FROM Movimiento where idBeca=:idBeca");
            $this->db->bind(':idBeca', $idBeca);
            
            $this->db->execute();

            $this->db->query("DELETE FROM Beca where idBeca=:idBeca");
            $this->db->bind(':idBeca', $idBeca);

        

         


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }



        public function getCantidadBecas($beca){
            //print_r($beca);
            $this->db->query("SELECT TipoBeca.NombreBeca, count(idBeca) as NumerodeBecas FROM Beca , TipoBeca
             WHERE Beca.idTipoBeca=TipoBeca.idTipoBeca and Beca.idTipoBeca=:idTipoBeca");

            $this->db->bind(':idTipoBeca', $beca);
            return $this->db->registros();
        }


        function editBeca($datos,$idBeca){

            print_r($datos);
         
            $this->db->query("UPDATE Beca 
            SET Importe=:importe, NotaMedia_Alumno=:notamedia, idCentro=:centro, Observaciones=:obs 
            WHERE idBeca=:idBeca");


            $this->db->bind(':importe', $datos['importe_be']);
            $this->db->bind(':notamedia', $datos['notaMedia']);
            $this->db->bind(':centro', $datos['centro_be']);
            $this->db->bind(':obs', $datos['obs_be']);
            $this->db->bind(':idBeca', $idBeca);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        function getMadrinas(){
            $this->db->query("SELECT * FROM Persona where idPersona in (select idPersona from Madrina)");
            
            return $this->db->registros();
        }

        function getMadrina($idMadrina){
            $this->db->query("SELECT Persona.Nombre FROM Persona,Madrina WHERE Persona.idPersona=:idMadrina;");
            $this->db->bind(':idMadrina', $idMadrina);

            return $this->db->registro();
        }

        function getGenero(){

        }
     

    }