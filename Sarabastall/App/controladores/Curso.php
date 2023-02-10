<?php

class Curso extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->cursoModelo=$this->modelo("CursoModelo");
        
        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }
    }

    public function index(){
        
        $this->datos["cursos"]=$this->cursoModelo->getCursos();

        $this->datos["instructores"]=$this->cursoModelo->getNombreInstructores();

        $this->datos["especialidad"]=$this->cursoModelo->getEspecialidad();

        //print_r($this->datos["cursos"]);

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $cursoModificado = $_POST;

            //print_r($cursoModificado); exit();

            if ($this->cursoModelo->editCurso($cursoModificado)) {
                redireccionar("/curso");
             }else{
                 echo "error";
             }
        
        }

        $this->vista("cursos/index", $this->datos);
        
    }

    public function add_curso($error=''){

        $this->datos["instructores"]=$this->cursoModelo->getNombreInstructores();

        $this->datos["especialidad"]=$this->cursoModelo->getEspecialidad();

              
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            
            $curso = $_POST;

            if (!$_POST['nombre_cu'] || !$_POST['importe_cu'] || !$_POST['fechaIni_cu'] || !$_POST['fechaFin_cu'] || !$_POST['instructor_cu'] || !$_POST['especialidad_cu']) {
                redireccionar("/curso/add_curso/1");
            }else{

                $this->datos["datosCurso"]=$this->cursoModelo->addCurso($curso);

                redireccionar("/curso");
            }

            
            
        }else {

            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("cursos/add_curso",$this->datos);
        }  
    }


    public function ver_curso($id_curso){

        $this->datos["instructores"]=$this->cursoModelo->getNombreInstructores();

        $this->datos["especialidad"]=$this->cursoModelo->getEspecialidad();
       
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $cursoModificado = $_POST;

            //print_r($cursoModificado);

            if ($this->cursoModelo->editCurso($cursoModificado,$id_curso)) {
                redireccionar("/curso/ver_curso/$id_curso");
             }else{
                 echo "error";
             }
        
        }else{

            $this->datos["datosCurso"]=$this->cursoModelo->verCursos($id_curso);

            $this->vista("cursos/ver_curso",$this->datos);

        }

    }



    public function eliminar_curso($id_curso){
       
        if ($this->cursoModelo->eliminarCurso($id_curso)) {
            redireccionar("/curso");
        }else{
            echo "error";
        }
    
    }


    
    public function add_aprendices($id_curso){

        $this->datos["datosCurso"]=$this->cursoModelo->verCursos($id_curso);

        $this->datos["aprendices"]=$this->cursoModelo->getNombreAprendices($id_curso);

        $this->datos["aprendicesCurso"]=$this->cursoModelo->getAprendicesCurso($id_curso);

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $idPersona = $_POST;


            if ($idPersona['boton']=="Añadir") {
                
                if ($this->cursoModelo->addAprendicesCurso($idPersona['idPersona'] ,$id_curso)) {
            
                    redireccionar("/curso/add_aprendices/$id_curso");
                    
                }else{

                    echo "error46";
                }

            }elseif ($idPersona['boton']=="Eliminar") {
                
                if ($this->cursoModelo->eliminarAprendicesCurso($idPersona['idPersona'] ,$id_curso)) {
            
                    redireccionar("/curso/add_aprendices/$id_curso");
                    
                }else{

                    echo "error";
                }

            }else{

                echo "error";
            }
            
        }else{

            $this->vista("cursos/add_aprendices",$this->datos);

        }

    }

}