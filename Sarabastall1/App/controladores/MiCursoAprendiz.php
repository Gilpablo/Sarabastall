<?php

class MiCursoAprendiz extends Controlador{
    public function __construct(){
        
        Sesion::iniciarSesion($this->datos);
        $this->MiCursoAprendizModelo=$this->modelo("MiCursoAprendizModelo");
        
        $this->datos["rolesPermitidos"] = [30];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            // echo "No tienes privilegios!!!";
            // exit();
        redireccionar("/inicio");
        }
    }

    public function index(){

        $this->datos["cursosAprendiz"]=$this->MiCursoAprendizModelo->getCursosAprendiz($this->datos["usuarioSesion"]->idPersona);

        $this->datos["especialidad"]=$this->MiCursoAprendizModelo->getEspecialidad();

        $this->vista("misCursosAprendiz/index", $this->datos);
        
    }

    public function ver_curso($id_curso){
        
        $this->datos["cursoAprendiz"]=$this->MiCursoAprendizModelo->getRecibirCursos($this->datos["usuarioSesion"]->idPersona);

        // Roles de curso
        if (!estarMatriculado($id_curso, $this->datos["cursoAprendiz"])) {
            redireccionar("/miCursoAprendiz");
        }

        $this->datos["material"] = $this->MiCursoAprendizModelo->getMaterial($id_curso);
        $this->datos["id_Curso"]=$id_curso;
        $this->vista("misCursosAprendiz/ver_curso", $this->datos);
    }

}