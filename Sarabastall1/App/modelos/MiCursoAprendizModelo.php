<?php

    class MiCursoAprendizModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getCursosAprendiz($idAprendiz){

            $this->db->query("SELECT * FROM Curso, Recibir 
                            WHERE Recibir.Aprendiz_idPersona = :idAprendiz AND Recibir.idCurso = Curso.idCurso;");

            $this->db->bind(':idAprendiz', $idAprendiz);
                
            return $this->db->registros();

        }

        public function getRecibirCursos($idAprendiz){

            $this->db->query("SELECT idCurso FROM Recibir 
                            WHERE Aprendiz_idPersona = :idAprendiz");

            $this->db->bind(':idAprendiz', $idAprendiz);
                
            return $this->db->registros();

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

    }