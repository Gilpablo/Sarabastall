<?php

//**Desarrollo */
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//**Desarrollo */

//Ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));

//Ruta url, Ejemplo: http://localhost/atletismo
define('RUTA_URL', 'http://localhost/becas');

define('NOMBRE_SITIO', 'Web de Sarabastall');

//configuracio de la base de datos

define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSWORD','root');
define('DB_NOMBRE','infoargo');