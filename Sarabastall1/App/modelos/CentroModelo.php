<?php

    class CentroModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getCentros(){
            $this->db->query("SELECT Centro.*, Ciudad.Nombre as NombreCiudad  FROM Centro, Ciudad WHERE Centro.idCiudad=Ciudad.idCiudad");
            
            return $this->db->registros();
        }

        public function getCentro($id_centro){
            $this->db->query("SELECT Centro.*, Ciudad.Nombre as NombreCiudad  FROM Centro, Ciudad WHERE Centro.idCiudad=Ciudad.idCiudad and Centro.idCentro=:id_centro");
            $this->db->bind(':id_centro',$id_centro);                        
            return $this->db->registro();
        }

        public function getNombreCiudades(){
            $this->db->query("SELECT * FROM Ciudad");
            
            return $this->db->registros();
        }

        public function addCentro($datos){
            print_r($datos);
            $this->db->query("INSERT INTO Centro(NombreCentro, Distancia, idCiudad)
                 VALUES(:nombre, :distancia, :id_ciudad)");
            //vinculamos los valores
            $this->db->bind(':nombre',trim($datos['nombre']));
            $this->db->bind(':distancia',trim($datos['distancia']));
            $this->db->bind(':id_ciudad',trim($datos['ciudad']));

       
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editCentro($datos,$id_centro){
            
            $this->db->query("UPDATE Centro SET NombreCentro=:nombre, Distancia=:distancia, idCiudad=:id_ciudad 
                                    WHERE idCentro=:id_centro");
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':distancia',$datos['distancia']);
            $this->db->bind(':id_ciudad',$datos['ciudad']);
            $this->db->bind(':id_centro',$id_centro);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        
    }

    public function deleteCentro($id_centro){

        $this->db->query("DELETE FROM Centro WHERE idCentro=:id_centro");
        $this->db->bind(':id_centro',$id_centro);

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }
    }