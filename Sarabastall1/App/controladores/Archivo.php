<?php

class Archivo extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->archivoModelo=$this->modelo('ArchivoModelo');

        // $this->datos["usuarioSesion"]->id_rol=obtenerRol($this->datos["usuarioSesion"]->roles);

        $this->datos["rolesPermitidos"] = [20];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           //redireccionar('/');
        }
        
    }

    public function index(){

        $this->datos["materiales"]=$this->archivoModelo->getMateriales();
        
        $this->vista("materiales/archivos", $this->datos);

    }

    public function add_archivos() {

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            // $verificado = 1;
            //                             //Tamaño de mediumblob
            // if ($_FILES["material"]["size"] > 16000000) {
            //     echo "Archivo demasiado grande";
            //     $verificado = 0;
            // }

            $renombre = $_POST['mat_renombre'];
            $material = $_FILES['material'];
            
            

            // si TIENE renombre
            if($renombre!="") {
                // Si tiene un punto en el renombre
                if (strpos($renombre, '.') !== false) {

                    //quitamos la extension añadida por el usuario
                    $renombre = substr($renombre, 0, strrpos($renombre, '.'));
                    //recogemos la extension del archivo
                    $tipo = $material['type'];
                    // juntamos la extension del archivo con el renombre
                    $tipo = $renombre.'.'.substr($tipo, strrpos($tipo, '/') + 1);
                    // material-name ahora tiene el string combinado
                    $material['name'] = $tipo;

                } else {

                    //recogemos la extension del archivo
                    $tipo = $material['type'];
                    // juntamos la extension del archivo con el renombre
                    $tipo = $renombre.'.'.substr($tipo, strrpos($tipo, '/') + 1);
                    // material-name ahora tiene el string combinado
                    $material['name'] = $tipo;

                }
                
            // si NO TIENE renombre
            } else {

                $renombre = $material['name'];

            }

            // transforma el tmp_name para que se pueda subir a un BLOB
            // print_r(RUTA_URL."/uploads");
            // echo "<br>";
            // print_r(RUTA_URL."/archivos/get_archivo");
            
            echo '<pre>';
                print_r($material);
            echo '</pre>';

            $material['tmp_name'] = addslashes(file_get_contents($material['tmp_name']));

            // Si la consulta devuelve true te redirige SINO te da error
            if ($this->archivoModelo->addArchivos($material)) {

                redireccionar("/archivo");

            } else {

                echo "error";

            }

        }else {

            $this->vista("archivo/add_archivos",$this->datos);

        }

    }

    public function get_archivo() {

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $idMaterial = $_POST['id_Material'];

            $material = $this->archivoModelo->getMaterial($idMaterial);

            print_r($material);

            $material = ($material);

            header("Content-type: ".$material['Tipo']);


        }

        if ($this->archivoModelo->getMaterial($idMaterial)) {

            echo "succesful";
            print_r($material);

        } else {

            echo "error";

        }

    }



    public function del_archivo(){

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $archivo = $_POST["id_Material"];

            // Si la consulta devuelve true te redirige SINO te da error
            if ($this->archivoModelo->delArchivo($archivo)) {

                redireccionar("/archivo");

            } else {

                echo "error";

            }

        }else {

            $this->vista("archivo/del_archivo",$this->datos);

        }

    }

    public function mod_archivo(){

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $idMaterial = $_POST['id_Material'];
            $renombre = $_POST['mod_nombre'];
            $original = $_POST['mod_nombre_original'];

            print_r($_POST);

            if($renombre!="") {
                // Si tiene un punto en el renombre
                if (strpos($renombre, '.') !== false) {

                    //quitamos la extension añadida por el usuario
                    $renombre = substr($renombre, 0, strrpos($renombre, '.'));
                    //recogemos la extension del archivo
                    $tipo = $original;
                    //juntamos el renombre del con la extension del archivo original
                    $tipo = $renombre.'.'.substr($tipo, strrpos($tipo, '.') + 1);
                    // material-name ahora tiene el string combinado
                    $renombre = $tipo;

                } else {

                    //recogemos la extension del archivo
                    $tipo = $original;
                    // juntamos la extension del archivo con el renombre
                    $tipo = $renombre.'.'.substr($tipo, strrpos($tipo, '.') + 1);
                    // material-name ahora tiene el string combinado
                    $renombre = $tipo;

                    echo "<br>";
                    print_r("Nombre modificado si NO tiene punto: ".$renombre);

                }
                
            // si NO TIENE renombre
            } else {

                $renombre = $original;

            }

        }

        if($this->archivoModelo->modArchivo($renombre, $idMaterial)){

            redireccionar("/archivo");

        } else {

            echo "error";

        }

    }
}