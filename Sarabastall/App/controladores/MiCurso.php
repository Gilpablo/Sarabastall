<?php

class MiCurso extends Controlador{
    public function __construct(){
        
        Sesion::iniciarSesion($this->datos);
        $this->MiCursoModelo=$this->modelo("MiCursoModelo");
        
        $this->datos["rolesPermitidos"] = [20];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
    }

    public function index(){
        
        $this->datos["cursosProfesor"]=$this->MiCursoModelo->getCursosProfesor($this->datos["usuarioSesion"]->idPersona);

        $this->datos["especialidad"]=$this->MiCursoModelo->getEspecialidad();

        $this->vista("misCursos/index", $this->datos);
        
    }


    public function ver_aprendices($id_curso){

        $this->datos["datosCurso"]=$this->MiCursoModelo->getDatosCurso($id_curso);

        $this->datos["aprendices"] = $this->MiCursoModelo->getAprendicesCurso($id_curso);

        $this->vista("misCursos/ver_aprendices", $this->datos);
    }

    public function modalAprendiz($id_aprendiz){

        print_r($id_aprendiz); exit();

    }

}