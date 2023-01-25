<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title> Mis Archivos </title>
</head>
<body>
    
    <nav class="navbar navbar-light bg-light">
    
        <div class="container-fluid me-4 ">
            <div class="bg-light">
                <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <span class="navbar-toggler-icon"></span>
                </button>
                <img src="logo.png" style="width:50%; margin-left:2%;">
            </div>
            <form class="d-flex">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 rounded-pill w-100  d-none d-md-block" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0 rounded-pill d-none d-md-block" type="submit">Search</button>
                </form>
            </form>
            <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                <i class="bi bi-person-circle mr-3 "></i><i class="bi bi-caret-down-fill"></i>
            </button>
        </div>
    </nav>  
    
    <!-- aqui la barra lateral fija<----> 
        <div class="row ">
            <div style="background-color:rgba(235,236,240,255);" class="col-md-2 col-sm-2 col-lg-2 col-xl-1  vh-100 d-none d-sm-block">
                <div style="width:72px;" class="bg-light vh-100">
                    <ul class="list-group">
                        <a href="administrador.php"><li title="INICIO" class="list-group float-left pb-3 "><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/home.png"></li></a>
                        <a href=""> <li title="CURSO" class="justify-content-center.  list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/darcurso.png"></li></a>
                        <a href=""><li title="USUARIOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/alumno.png"></li></a>
                        <a href=""><li title="BECAS" class="list-group pb-3"><img id="icono"  class="mx-auto d-block mb-2 mt-3" src="img/beca.png"> </li></a>
                        <a href=""><li title="PRESTAMOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/prestamo.png"></li></a>
                        <a href=""><li title="DINERO" class="list-group pb-3"> <img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/dinero.png"></li></a>
                        <a href=""><li title="ARCHIVOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-2 mt-3" src="img/carpeta.png"></li></a>
                        <a href=""> <li title="CURSOS REALIZADOS" class="list-group pb-3"><img id="icono" class="mx-auto d-block mb-3 mt-3" src="img/certified.png"></li></a>
                    </ul>
                </div>
            </div>

            <div style="background-color:rgba(235,236,240,255);" class="col-xl-11 col-12 col-sm-10 col-xs-6 col-md-10 col-lg-10"    >
                <div class="container  ">
                    <div class="col-10">
                        <div class="col-12 d-flex mt-5">
                            <div class="col-6 d-flex justify-content-start mt-5" >
                                <h5 class="text-center p-2 ps-0"> Mis Archivos </h5>
                            </div>
                            <div class="col-1 offset-4 mt-2 d-flex justify-content-end mt-5">
                                <a href="#" class="text-reset"> <img src="img/nuevo-documento.png"> </a>
                            </div>
                            <div class="col-1 mt-2 d-flex justify-content-end mt-5">
                                <a href="#" class="text-reset"> <img src="img/agregar-carpeta.png"> </a>
                            </div>
                        </div>
                        <div class="upload-container col-12 bg-light ">
                            <div class="border-container border border-1 border-secondary">
                                <!-- CAMBIAR URGENTE LOS BR PERO NO SE COMO SE HACE XD -->
                                <br> <br> <br> <br> <br> <br>
                                <div class="d-flex justify-content-center">
                                    <p class=""> Arrastra un archivo AQUI </p>
                                </div>
                                <br> <br> <br> <br> <br> <br> 
                            </div>
                        </div>

                        <div class="col-12 d-flex">
                            <div class="col-4 col-xl-9 col-md-7 col-sm-6 mt-2 d-flex justify-content-end" >
                                <button type="button" class="btn btn-danger"> Cancelar </button>
                            </div>
                            <div class="col-8 col-xl-3 col-md-5 col-sm-6 mt-2 d-flex justify-content-end">

                                <button type="button" class="btn btn-success"> Guardar Cambios </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    <div class="offcanvas offcanvas-start" id="demo">
        <div style="background-color:rgba(235,236,240,255);" class="offcanvas-header">
            <img src="logo.png" style="width:50%; margin-left:2%;">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <hr></hr>
        <div class="offcanvas-body">
            <a href="administrador.php"> <h3> <img id="icono" class="mb-3" src="img/home.png"> Inicio </h3></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/darcurso.png"> Cursos </h3></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/alumno.png"> Alumnos </h3></a>
            <a href=""><h3> <img id="icono"  class="mb-3" src="img/beca.png"> Becas</h3></a></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/prestamo.png"> Prestamos</h3></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/dinero.png"> Movimientos</h3></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/carpeta.png"> Archivos</h3></a>
            <a href=""><h3> <img id="icono" class="mb-3" src="img/certified.png"> Cursos realizados</h3></a>
        </div>
    </div>

</body>
</html>