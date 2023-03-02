<?php

class Entrenadores extends Controlador{
    
    public function __construct(){
        $this->entrenadorModelo = $this->modelo('Entrenador');
    }

    public function index(){
        
        echo 'Index creado';

        $atletas = $this->entrenadorModelo->obtenerAtletas();
        $datos["atletas"] = $atletas;
        $this->vista("paginas/index",$datos);
    }
    public function add(){
        
        $datos = [
            'rojo'=>'red',
            'azul'=>'blue'
        ];

        $this->vista("paginas/index",$datos);
    }
}