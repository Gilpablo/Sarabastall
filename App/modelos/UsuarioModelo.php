<?php

    class UsuarioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getUsuariosActivos(){
            $this->db->query("SELECT * FROM Persona WHERE Persona.Activo=1; ");
            
            return $this->db->registroS();
        }
    }