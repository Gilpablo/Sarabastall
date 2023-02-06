<?php

    class MovimientoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        function getMovimientos(){

            $this->db->query("SELECT * FROM Movimiento");
            
            return $this->db->registros();
        }
    }