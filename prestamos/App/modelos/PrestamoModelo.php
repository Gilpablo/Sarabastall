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

            $this->db->query("INSERT INTO Prestamo (Titulo, Importe, idMovimiento, idTipoPrestamo ,Persona, fecha_PedirPrestamo, id_estado) 
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

            $this->db->query("SELECT * FROM Prestamo pr, estado e where  e.id_estado=pr.id_estado order by pr.Fecha_PedirPrestamo desc");
            
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








        function getProfesor($id_profesor){

            $this->db->query("SELECT * FROM profesores 
                                WHERE id_profesor=:id_profesor");
            
            $this->db->bind(':id_profesor', $id_profesor);

            return $this->db->registro();
        }


        function getRolesProfesor($id_profesor){

            $this->db->query("SELECT * FROM profesores_departamento
                                NATURAL JOIN rol
                                NATURAL JOIN departamento
                            WHERE id_profesor=:id_profesor");
            
            $this->db->bind(':id_profesor', $id_profesor);

            return $this->db->registros();
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

        // function cerrarAsesoria($datos){
           
        //     $this->db->query("UPDATE asesoria SET id_estado = 3, fecha_fin= NOW()  WHERE id_asesoria=:id_asesoria");

        //     $this->db->bind(':id_asesoria' ,$datos['id_asesoria']);

        //     $this->db->execute();
           

        //     $this->db->query("INSERT INTO reg_acciones (fecha_reg, accion, automatica, id_asesoria, id_profesor) 
        //                 VALUES (NOW(),'Cierra', 1, :id_asesoria, :id_profesor)");
            
        //     $this->db->bind(':id_asesoria' ,$datos['id_asesoria']);
        //     $this->db->bind(':id_profesor' ,$datos['id_profesor']);
           

        //     if ($this->db->execute()) {
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }

        function asesoriaCerrada($id_asesoria){

            $this->db->query("SELECT * FROM asesoria 
                                WHERE id_asesoria = $id_asesoria and id_estado=3");
            
        
            return $this->db->rowCount();
        }

    }