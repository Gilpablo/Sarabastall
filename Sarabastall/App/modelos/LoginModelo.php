<?php

    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginUsuario($datos){
            $this->db->query("SELECT * 
                                    FROM Persona 
                                    WHERE Username=:user and Clave=sha2(:password,256)");
            $this->db->bind(':user',$datos['usuario']);
            $this->db->bind(':password',$datos['pass']);
            
            return $this->db->registro();
        }
    }