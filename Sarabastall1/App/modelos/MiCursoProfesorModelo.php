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


        public function getDatosCurso($id_Curso){

            $this->db->query("SELECT * FROM Curso WHERE idCurso = :idCurso");

            $this->db->bind(':idCurso', $id_Curso);

            return $this->db->registro();

        }


        public function getEspecialidad(){
            

            $this->db->query("SELECT * FROM Especialidad");
            
            return $this->db->registros();
            
        }


        public function getAprendicesCurso($id_Curso){
            

            $this->db->query("SELECT * FROM Persona, Recibir 
                                WHERE Recibir.idCurso = :idCurso AND Recibir.Aprendiz_idPersona = Persona.idPersona; ");

            $this->db->bind(':idCurso', $id_Curso);
                
            return $this->db->registros();
            
        }

      


    }