<?php

    class MiCursoProfesorModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function getCursosProfesor($idInstructor){

            $this->db->query("SELECT * FROM Curso WHERE Instructor_idPersona = :idInstructor");

            $this->db->bind(':idInstructor', $idInstructor);

            return $this->db->registros();

        }

        public function getImpartirCursos($idInstructor){

            $this->db->query("SELECT idCurso FROM Curso 
                            WHERE Instructor_idPersona = :idInstructor");

            $this->db->bind(':idInstructor', $idInstructor);
                
            return $this->db->registros();

        }


        public function getDatosCurso($id_Curso){

            $this->db->query("SELECT * FROM Curso WHERE idCurso = :idCurso");

            $this->db->bind(':idCurso', $id_Curso);

            return $this->db->registro();

        }


        public function getEspecialidad(){
            

            $this->db->query("SELECT * FROM Especialidad");
            
            return $this->db->registros();
            
        }

        public function getMaterial($id_Curso){
            
            $this->db->query("SELECT * FROM Curso, Poseer, Material 
                            WHERE Curso.idCurso = :idCurso and Curso.idCurso = Poseer.idCurso and Poseer.idMaterial = Material.idMaterial; ");

            $this->db->bind(':idCurso', $id_Curso);
            
            return $this->db->registros();
            
        }

        public function getAprendicesCurso($id_Curso){
            

            $this->db->query("SELECT * FROM Persona, Recibir 
                                WHERE Recibir.idCurso = :idCurso AND Recibir.Aprendiz_idPersona = Persona.idPersona; ");

            $this->db->bind(':idCurso', $id_Curso);
                
            return $this->db->registros();
            
        }

        public function addArchivoCurso($idCurso, $material) {
            print_r($material['material']['name']);
            $this->db->query("INSERT INTO Material(Nombre, Size, Tipo)
                                    VALUES (:renombre, :size, :tipo)");

            $this->db->bind(':renombre',$material['material']['name']);
            $this->db->bind(':size',$material['material']['size']);
            $this->db->bind(':tipo',$material['material']['type']);
           
            
        
            $idMaterial = $this->db->executeLastId();

            $this->db->query("INSERT INTO Poseer(idCurso, idMaterial)
                            VALUES (:idCurso, :idMaterial)");

            $this->db->bind(':idCurso',$idCurso);
            $this->db->bind(':idMaterial',$idMaterial);


            // Esto sirve para que en el modelo no sepa si darte error o redirigirte correctamente
            if($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }

        public function delArchivo($idCurso, $idMaterial) {

            $this->db->query("DELETE FROM Material where idMaterial = :idMaterial");

            $this->db->query("DELETE FROM Poseer where idMaterial = :idMaterial");

            $this->db->bind(':idMaterial', $idMaterial);    

            if ($this->db->execute()) {

                return true;

            }else{

                return false;
                
            }

        }

        public function modArchivo($newNombre, $idMaterial) {

            $this->db->query("UPDATE Material SET Nombre = :newNombre where idMaterial = :idMaterial");

            $this->db->bind(':newNombre', $newNombre);
            $this->db->bind(':idMaterial', $idMaterial);    

            if ($this->db->execute()) {

                return true;

            }else{

                return false;
                
            }

        }

        public function getArchivo($idMaterial) {

            $this->db->query("SELECT * FROM Material where idMaterial = :idMaterial");

            $this->db->bind(':idMaterial', $idMaterial);   

            return $this->db->registros();
            
        }


    }