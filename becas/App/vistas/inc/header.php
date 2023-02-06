<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="<?php echo RUTA_URL?>/imagenes/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/micss.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <title>Sarabastall</title>
</head>
<body style="background-color:rgba(235,236,240,255);">
<nav class="navbar navbar-light bg-light">
    
  <div class="container-fluid me-4 ">
    <div class="bg-light">
  
      <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        <span class="navbar-toggler-icon"></span>
      </button>
      <img src="<?php echo RUTA_URL?>/imagenes/logo-fundacion-sarabastall.jpg" style="width:50%; margin-left:2%;">
  </div>
 
    <form class="d-flex">
  <form class="form-inline">
    <span class="input-group-text d-none d-md-block "><i class="bi bi-search"></i></span>
    <input class="form-control mr-sm-2w-100  d-none d-md-block " type="search" placeholder="Search" aria-label="Search">

  </form>
    </form>

    <li style="list-style:none;"class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-circle mr-3 "></i></a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#scrollspyHeading3">Perfil</a></li>

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesion</a></li>
      </ul>
     
    </li>
   <a><i class="bi bi-universal-access-circle"></i></a>
  
    
  </div>
</nav>  





 <div class="row g-0">
   
  <div style="background-color:rgba(235,236,240,255);" class="col-md-2 col-sm-2 col-lg-2 col-xl-1  vh-100 d-none d-sm-block ">
    
    <div style="width:72px;height:200%;" class="bg-light h-100">
      <ul class="list-group">
        <a href="administrador.php"><li title="INICIO" class="list-group float-left pb-3 "><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/home.png"></li></a>
        <a href=""> <li title="CURSO" class="justify-content-center.  list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/darcurso.png"></li></a>
        <a href=""><li title="USUARIOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/alumno.png"></li></a>
        <a href="becas.php"><li title="BECAS" class="list-group pb-3"><img id="icono"  class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/beca.png"> </li></a>
      
        <a href=""><li title="PRESTAMOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/prestamo.png"></li></a>
       
        <a href=""><li title="DINERO" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/dinero.png"></li></a>
        <a href=""><li title="ARCHIVOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="<?php echo RUTA_URL?>/img/carpeta.png"></li></a>
        <a href=""> <li title="CURSOS REALIZADOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="<?php echo RUTA_URL?>/img/certified.png"></li></a>
      </ul>
    </div>
  
  </div>
  <div style="background-color:rgba(235,236,240,255);" class="col-xl-11 col-sm-10 col-xs-6 col-md-10 col-lg-10 ">
  
  <div class="offcanvas offcanvas-start" id="demo">
  <div style="background-color:rgba(235,236,240,255);" class="offcanvas-header">
  <img src="<?php echo RUTA_URL?>/img/logo.png" style="width:50%; margin-left:2%;">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
 
  <div class="offcanvas-body">
  <a href="administrador.php"> <h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/home.png"> Inicio </h3></a>

<a href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/darcurso.png"> Cursos </h3></a>

<a href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/alumno.png"> Alumnos </h3></a>

<a href="becas.php"><h3> <img id="icono"  class="mb-3" src="<?php echo RUTA_URL?>/img/beca.png"> Becas</h3></a></a>

<a class="nav-link-active" href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/prestamo.png"> Prestamos</h3></a>

<a href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/dinero.png"> Movimientos</h3></a>
<a href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/carpeta.png"> Archivos</h3></a>
<a href=""><h3> <img id="icono" class="mb-3" src="<?php echo RUTA_URL?>/img/certified.png"> Cursos realizados</h3></a>
  </div>
</div>
