<?php

class Perfil extends Controlador{
    public function __construct(){

        Sesion::iniciarSesion($this->datos);
           
        $this->perfilModelo = $this->modelo('PerfilModelo');

        $this->datos["rolesPermitidos"] = [10,20,30];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
          
        }

    }

    public function editar_perfil($idPersona){
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos=$_POST;
           
            
            if($this->perfilModelo->editPerfil($datos)){
         
                redireccionar("/perfil/editar_perfil/$idPersona");
            } else{
                echo "se ha producido un error!!!!";
            }
        }else{
            $this->datos["usuario"]=$this->perfilModelo->getUsuario($idPersona);
            $this->vista('perfil/editar_perfil',$this ->datos);
        }

        
        

    
}

// public function editar(){
//     if ($_SERVER['REQUEST_METHOD']=='POST') {
//         $datos=$_POST;
//         if($this->perfilModelo->editPerfil($datos)){
          
//             redireccionar("/perfil/editar_perfil/");
//         } else{
//             echo "se ha producido un error!!!!";
//         }
//     }
// }
}