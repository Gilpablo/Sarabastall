<?php

class Archivo extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->archivoModelo=$this->modelo('ArchivoModelo');

        // $this->datos["usuarioSesion"]->id_rol=obtenerRol($this->datos["usuarioSesion"]->roles);

        $this->datos["rolesPermitidos"] = [20];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
           //redireccionar('/');
        }
        
    }

    public function index(){

        $this->datos["materiales"]=$this->archivoModelo->getMateriales();
        
        $this->vista("materiales/archivos", $this->datos);

    }

    public function add_archivos() {

        $archivo = $_FILES['material']['name'];
        //print_r($_FILES['material']);
        $target_dir = RUTA_APP.'/../public/archivos_cliente/';
        $file = basename($_FILES["material"]["name"]);
        $target_file = $target_dir . $file;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["material"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["material"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        
       
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["material"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["material"]["name"])). " has been uploaded.";
            chmod(RUTA_APP.'/../public/archivos_cliente/'.$file, 0777);
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        $material=$_FILES;
            // Si la consulta devuelve true te redirige SINO te da error
            if ($this->archivoModelo->addArchivos($material)) {

                redireccionar("/archivo");

            } else {

                echo "error";

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
            $nombre=$_POST["mod_nombre"];

            // Si la consulta devuelve true te redirige SINO te da error
            if ($this->archivoModelo->delArchivo($archivo)) {
                unlink(RUTA_APP.'/../public/archivos_cliente/'.$nombre);
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
            rename(RUTA_APP.'/../public/archivos_cliente/'.$original, RUTA_APP.'/../public/archivos_cliente/'.$renombre );
            redireccionar("/archivo");

        } else {

            echo "error";

        }

    }
}