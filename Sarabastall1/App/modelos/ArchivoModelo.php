<?php

    class ArchivoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function addArchivos($material) {


            $this->db->query("INSERT INTO Material(Nombre, Size, Fecha_Subida, Tipo,Archivo)
                                    VALUES (:renombre, :size, NOW(), :tipo, :archivo)");

            $this->db->bind(':renombre',$material['name']);
            $this->db->bind(':size',$material['size']);
            $this->db->bind(':tipo',$material['type']);
            $this->db->bind(':archivo',$material['tmp_name']);
        
            // Esto sirve para que en el modelo no sepa si darte error o redirigirte correctamente
            if($this->db->execute()) {

                return true;

            } else {

                return false;

            }
            
        }

        public function getMateriales() {

            $this->db->query("SELECT * FROM Material");
        
            return $this->db->registros();
        }

        public function getMaterial($idMaterial) {

            $this->db->query("SELECT * FROM Material where idMaterial = :idMaterial");
            $this->db->bind(':idMaterial', $idMaterial);

            //print_r($this->db->registro());

            return $this->db->registro();

        }

        public function delArchivo($idMaterial) {

            $this->db->query("DELETE FROM Material where idMaterial = :idMaterial");

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
    }