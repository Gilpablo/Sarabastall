<?php

    class CursoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function getCursos(){

            $this->db->query("SELECT * FROM Curso");
            
            return $this->db->registros();
        }


        public function getNombreInstructores(){


            $this->db->query("SELECT Persona.idPersona, Persona.Nombre , Persona.Apellido FROM Persona NATURAL JOIN Instructor ;");
            
            return $this->db->registros();

        }


        public function getEspecialidad(){

            $this->db->query("SELECT * FROM Especialidad; ");
            
            return $this->db->registros();

        }


        public function addCurso($datos){

        
            //print_r($datos); exit();

            $this->db->query("INSERT INTO Curso(Nombre, Importe, Fecha_Inicio, Fecha_Fin, idMovimiento, Instructor_idPersona, idEspecialidad)
                VALUES(:Nombre, :Importe, :Fecha_Inicio, :Fecha_Fin, 1, :Instructor_idPersona, :idEspecialidad)");    

            //vinculamos los valores
            $this->db->bind(':Nombre',trim($datos['nombre_cu']));
            $this->db->bind(':Importe',trim($datos['importe_cu']));
            $this->db->bind(':Fecha_Inicio',trim($datos['fechaIni_cu']));
            $this->db->bind(':Fecha_Fin',trim($datos['fechaFin_cu']));
            //$this->db->bind(':idMovimiento',trim(1));
            $this->db->bind(':Instructor_idPersona',trim($datos['instructor_cu']));
            $this->db->bind(':idEspecialidad',trim($datos['especialidad_cu']));


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }

        }


        public function verCursos($idCurso){

            $this->db->query("SELECT * FROM Curso WHERE idCurso = :idCurso");
            
            $this->db->bind(':idCurso', $idCurso);  

            return $this->db->registro();

        }


        public function editCurso($datos,$id_curso){

            $this->db->query("UPDATE Curso SET Nombre=:Nombre, Importe=:Importe, Fecha_Inicio=:Fecha_Inicio, Fecha_Fin=:Fecha_Fin, 
                                idMovimiento=1, Instructor_idPersona=:Instructor_idPersona, idEspecialidad=:idEspecialidad
                                    WHERE idCurso=:idCurso");
            $this->db->bind(':Nombre',$datos['nombre_cu']);
            $this->db->bind(':Importe',$datos['importe_cu']);
            $this->db->bind(':Fecha_Inicio',$datos['fechaIni_cu']);
            $this->db->bind(':Fecha_Fin',$datos['fechaFin_cu']);
            $this->db->bind(':Instructor_idPersona',$datos['instructor_cu']);
            $this->db->bind(':idEspecialidad',$datos['especialidad_cu']);
            $this->db->bind(':idCurso',$id_curso);  
            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }



        public function eliminarCurso($id_curso){

            $this->db->query("DELETE FROM Curso WHERE idCurso = :idCurso;");

            $this->db->bind(':idCurso',$id_curso);  

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }


        public function getNombreAprendices($id_curso){

            $this->db->query("SELECT Persona.idPersona, Persona.Nombre , Persona.Apellido 
                                FROM Persona NATURAL JOIN Aprendiz 
                                WHERE Aprendiz.idPersona NOT IN ( SELECT Recibir.Aprendiz_idPersona FROM Recibir WHERE Recibir.idCurso = :idCurso )");

            $this->db->bind(':idCurso',$id_curso);

            return $this->db->registros();
        }


        public function getAprendicesCurso($id_curso){

            $this->db->query("SELECT Persona.idPersona, Persona.Nombre , Persona.Apellido FROM Persona 
                                LEFT JOIN Recibir ON Recibir.Aprendiz_idPersona=Persona.idPersona
                                LEFT JOIN Aprendiz ON Aprendiz.idPersona= Recibir.Aprendiz_idPersona
                                    WHERE Recibir.idCurso = :idCurso;");

            $this->db->bind(':idCurso',$id_curso); 

            return $this->db->registros();

        }


        public function addAprendicesCurso($id_Persona, $id_curso){
                       
           
            for ($i=0; $i < count($id_Persona); $i++) { 
                    
                $this->db->query("INSERT INTO Recibir (Aprendiz_idPersona, idCurso, Fecha_RecibirCurso) VALUES (:idPersona, :idCurso, NOW());");

                $this->db->bind(':idPersona',$id_Persona[$i]);
                $this->db->bind(':idCurso',$id_curso);  

                if ($this->db->execute()) {
                        
                }else{
                    return false;
                }

            }
               
            return true;
                       
        }


        public function eliminarAprendicesCurso($id_Persona, $id_curso){
            
            
            for ($i=0; $i < count($id_Persona); $i++) { 
                    
                $this->db->query("DELETE FROM Recibir WHERE Aprendiz_idPersona = :idPersona AND idCurso = :idCurso");

                $this->db->bind(':idPersona',$id_Persona[$i]);
                $this->db->bind(':idCurso',$id_curso);  


                if ($this->db->execute()) {
                        
                }else{
                    return false;
                }
            }

            return true;
                       
        }


        


        

} 