<!--<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    
    <title>Document</title>
</head>
<body style="background-color:rgba(235,236,240,255);">
  <nav class="navbar navbar-light bg-light">
    
    <div class="container-fluid me-4 ">
      <div class="bg-light">
    
        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="img/logo.png" style="width:50%; margin-left:2%;">
      </div>

      <form class="d-flex">
      <form class="form-inline">
      <input class="form-control mr-sm-2 rounded-pill w-100  d-none d-md-block " type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0 rounded-pill  d-none d-md-block" type="submit">Search</button>
      </form>
      </form>

      <li style="list-style:none;" class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-circle mr-3 "></i></a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#scrollspyHeading3">Perfil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#scrollspyHeading5">Cerrar Sesion</a></li>
        </ul>
      </li>
  
    </div>
  </nav>  




 <div class="row">
  <div style="background-color:rgba(235,236,240,255);" class="col-md-2 col-sm-2 col-lg-2 col-xl-1  vh-100 d-none d-sm-block">
    
    <div style="width:72px;" class="bg-light vh-100">
      <ul class="list-group">
        <a href=""><li title="INICIO" class="list-group float-left pb-3 "><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/home.png"></li></a>
        <a href=""> <li title="CURSO" class="justify-content-center.  list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/darcurso.png"></li></a>
        <a href="alumnos.php"><li title="USUARIOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/alumno.png"></li></a>
        <a href="becas.php"><li title="BECAS" class="list-group pb-3"><img id="icono"  class="mx-auto d-block mb-2 mt-3" src="img/beca.png"> </li></a>
        <a href=""><li title="PRESTAMOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/prestamo.png"></li></a>
        <a href=""><li title="DINERO" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/dinero.png"></li></a>
        <a href=""><li title="ARCHIVOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/carpeta.png"></li></a>
        <a href=""> <li title="CURSOS REALIZADOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="img/certified.png"></li></a>
      </ul>
    </div>
  
  </div>
  <div style="background-color:rgba(235,236,240,255);" class="container col-xl-11 col-12 col-sm-10 col-xs-6 col-md-10 col-lg-10 ">-->
    <?php include 'inc/header_inicio_sesion.php'?>
  <br>
  <div class="container col-12">
  <h5 class="text-center">Quien Somos</h5>
  <p class="text-center col-md-12 ">
    Somos una peque??a ONG espa??ola, que nace y trabaja en la provincia de Zaragoza, en Caspe y su Comarca, y desarrollamos proyectos de cooperaci??n en Asia.

    Nuestros or??genes se remontan al a??o 1983, cuando un grupo de j??venes empezamos a realizar campamentos de verano para ni??os y ni??as de la zona, en el Pirineo aragon??s.<br> Pronto se ampliaron los proyectos y, adem??s de los campamentos, comenzamos a realizar actividades medioambientales, solidarias y culturales, convirtiendo a la Asociaci??n Sarabastall en un referente de participaci??n social y voluntariado.

    Fruto de la evoluci??n, y cuando nuestros proyectos de cooperaci??n comienzan a crecer, con el ??nimo de mejorar el funcionamiento, Sarabastall se organiza en dos entidades:<br>

    ASOCIACI??N SARABASTALL. Se encarga de desarrollar actividades culturales, de animaci??n y campamentos de verano.<br>

    FUNDACI??N SARABASTALL. ONG, inscrita en el Registro de la DGA con n?? 319(I) seg??n Orden publicada en el BOA del 16 de agosto de 2011, y cuyo objeto es desarrollar proyectos de cooperaci??n en pa??ses en v??as de desarrollo, y realizar actividades de captaci??n de fondos.
  </p>

    <h5 class="text-center">Nuestros Proyectos</h5>
    <div class="row d-flex justify-content-center text-center mx-0 mt-2">
      
      <div class="card col-sm-4  col-6 p-2" style="width: 25rem;">
        <img src="imagenes/Becas-estudios.jpg" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">Becas</h5>
          <p class="card-text">
            De los programas de cooperaci??n que la Fundaci??n Sarabastall ha puesto en marcha y est?? desarrollando en el Valle de Hush??, tal vez el m??s importante y uno de los que m??s nos satisface, es el programa de becas, destinado a que los ni??os/as puedan completar sus estudios elementales y secundarios, de tal forma que tengan una mayor preparaci??n para la vida,
            y que en el futuro los mejor preparados puedan continuar sus estudios universitarios, y todos se conviertan en motor de desarrollo de su sociedad.
          </p>
        </div>
      </div>

      <div class="card col-sm-4 col-6 p-2" style="width: 25rem;" >
        <img src="imagenes/Formacion-maestros.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Formacion de Profesores y Sanitarios</h5>
          <p class="card-text">
            El proyecto de formaci??n a maestros se plantea tras el estudio y valoraci??n de las escuelas del valle, y del an??lisis del nivel de formaci??n de sus profesionales. Adem??s, siempre ha estado ligado con la mejora de la sanidad, la higiene y la calidad de vida en la zona. Y no hay mejor camino para conseguirlo que mejorar la salud de todos los habitantes.
          </p>
        </div>
      </div>

      <div class="card col-sm-4  p-2" style="width: 25rem;">
        <img src="imagenes/Invernaderos.jpg" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">Invernaderos</h5>
          <p class="card-text">
            Los proyectos de agricultura siempre han sido otro de los objetivos prioritarios de los proyectos desarrollados en Hush??, por la Fundaci??n Sarabastall, convencidos que la mejora de la agricultura, permit??a mejorar la alimentaci??n, y por tanto la salud de los habitantes del valle. Y adem??s el incremento de producci??n serv??a para apoyar los ingresos m??nimos que las familias tienen.
          </p>
        </div>
      </div>
    </div> 
  
<!--
<div class="offcanvas offcanvas-start" id="demo">
  <div style="background-color:rgba(235,236,240,255);" class="offcanvas-header">
  <img src="img/logo.png" style="width:50%; margin-left:2%;">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
  <a href=""> <h3> <img id="icono" class="mb-3" src="img/home.png"> Inicio </h3></a>

<a href=""><h3> <img id="icono" class="mb-3" src="img/darcurso.png"> Cursos </h3></a>

<a href="alumnos.php"><h3> <img id="icono" class="mb-3" src="img/alumno.png"> Alumnos </h3></a>

<a href="becas.php"><h3> <img id="icono"  class="mb-3" src="img/beca.png"> Becas</h3></a></a>

<a href=""><h3> <img id="icono" class="mb-3" src="img/prestamo.png"> Prestamos</h3></a>

<a href=""><h3> <img id="icono" class="mb-3" src="img/dinero.png"> Movimientos</h3></a>
<a href=""><h3> <img id="icono" class="mb-3" src="img/carpeta.png"> Archivos</h3></a>
<a href=""><h3> <img id="icono" class="mb-3" src="img/certified.png"> Cursos realizados</h3></a>
  </div>
</div>-->




</body>

</html>