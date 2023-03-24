<?php

    class CiudadModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getCiudades(){
            $this->db->query("SELECT *  FROM Ciudad");
            
            return $this->db->registros();
        }

        public function getCiudad($id_ciudad){
            $this->db->query("SELECT * FROM Ciudad WHERE Ciudad.idCiudad=:id_ciudad");
            $this->db->bind(':id_ciudad',$id_ciudad);                        
            return $this->db->registro();
        }

        public function addCiudad($datos){
            
            $this->db->query("INSERT INTO Ciudad(Nombre, Cantidad)
                 VALUES(:nombre, :cantidad)");
            //vinculamos los valores
            $this->db->bind(':nombre',trim($datos['nombre']));
            $this->db->bind(':cantidad',trim($datos['cantidad']));

       
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editCiudad($datos,$id_ciudad){
            
            $this->db->query("UPDATE Ciudad SET Nombre=:nombre, Cantidad=:cantidad 
                                    WHERE idCiudad=:id_ciudad");
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':cantidad',$datos['cantidad']);
            $this->db->bind(':id_ciudad',$id_ciudad);  

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        
    }

    public function deleteCiudad($id_ciudad){

        $this->db->query("DELETE FROM Ciudad WHERE idCiudad=:id_ciudad");
        $this->db->bind(':id_ciudad',$id_ciudad);

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }
    }