<?php

class MiCursoProfesor extends Controlador{
    public function __construct(){
        
        Sesion::iniciarSesion($this->datos);
        $this->MiCursoProfesorModelo=$this->modelo("MiCursoProfesorModelo");
        
        $this->datos["rolesPermitidos"] = [20];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
    }

    public function index(){
        
        $this->datos["cursosProfesor"]=$this->MiCursoProfesorModelo->getCursosProfesor($this->datos["usuarioSesion"]->idPersona);

        $this->datos["especialidad"]=$this->MiCursoProfesorModelo->getEspecialidad();

        $this->vista("misCursosProfesor/index", $this->datos);
        
    }


    public function ver_aprendices($id_curso){

        $this->datos["datosCurso"]=$this->MiCursoProfesorModelo->getDatosCurso($id_curso);

        $this->datos["aprendices"] = $this->MiCursoProfesorModelo->getAprendicesCurso($id_curso);

        $this->vista("misCursosProfesor/ver_aprendices", $this->datos);
    }

    

    public function modalAprendiz($id_aprendiz){

        print_r($id_aprendiz); exit();

    }
   

}