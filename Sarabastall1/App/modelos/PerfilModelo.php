<?php

    class PerfilModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function getUsuario($idPersona){
            $this->db->query("SELECT * from Persona WHERE idPersona=:idPersona;");
            $this->db->bind(':idPersona', $idPersona);

            return $this->db->registro();
        }

        public function editPerfil($datos,$clave){
            // print_r($clave);
            // print_r(" ");
            // $a=hash('sha256', $datos['clave']);
            // print_r($a);
            // exit();
            if ($datos['clave']==$clave) {
                $this->db->query("UPDATE Persona 
                set Clave=:clave,Username=:username, Nombre=:nombre, Apellido=:apellido,
                 Telefono=:telefono, Correo=:correo where idPersona=:idPersona");
    
                $this->db->bind(':username', $datos['username']);
                $this->db->bind(':clave', $datos['clave']);
                $this->db->bind(':nombre', $datos['nombre']);
                $this->db->bind(':apellido', $datos['apellido']);
                $this->db->bind(':telefono', $datos['telefono']);
                $this->db->bind(':correo', $datos['correo']);
                $this->db->bind(':idPersona', $datos['idPersona']);
            }else{
            
            $this->db->query("UPDATE Persona 
            set Clave=sha2(:clave,256),Username=:username, Nombre=:nombre, Apellido=:apellido,
             Telefono=:telefono, Correo=:correo where idPersona=:idPersona");

            $this->db->bind(':username', $datos['username']);
            $this->db->bind(':clave', $datos['clave']);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':apellido', $datos['apellido']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':correo', $datos['correo']);
            $this->db->bind(':idPersona', $datos['idPersona']);
            }
          


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }