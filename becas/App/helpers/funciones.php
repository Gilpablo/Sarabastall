<?php

    function redireccionar($pagina){
        header('location:'.RUTA_URL.$pagina);
    }

    function formatoFecha($fechaIngles){
        return date("d/m/Y H:i:s", strtotime($fechaIngles));
    }


    function tienePrivilegios($rol_usuario,$rolesPermitidos){

        if(empty($rolesPermitidos) || in_array($rol_usuario,$rolesPermitidos)){
          
          
            return true;
        
        }

    }

    function obtenerRol($roles){

        $id_rol = 0;
        foreach ($roles as $rol) {
            
            if ($rol->id_departamento==1) {
                if($rol->id_rol==30){
                    $id_rol = 100;
                }
            }elseif($rol->id_departamento==2){
                if($rol->id_rol==20){
                    $id_rol = 200;
                }
                if($rol->id_rol==10){
                    $id_rol = 300;
                }
            }
        }

        return $id_rol;
    }