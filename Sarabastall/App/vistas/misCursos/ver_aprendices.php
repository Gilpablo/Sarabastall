<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/miCurso">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Aprendices</li>

        </ol>
    </nav>

    <div class="container">

        <h5 class="text-center">APRENDICES DEL CURSO: <?php echo $this->datos["datosCurso"]->Nombre?></h5>


        <table class="table">
            
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">FECHA NACIMIENTO</th>
                <th scope="col">VER MÁS</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont=1; foreach ($datos["aprendices"] as $aprendiz): ?>
                    <tr>
                        <th scope="row"><?php echo $cont; ?></th>
                        <td><?php echo $aprendiz->Nombre; ?></td>
                        <td><?php echo $aprendiz->Apellido; ?></td>
                        <td><?php echo $aprendiz->Fecha_Nacimiento; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-success me-md-3"  data-bs-toggle="modal" data-bs-target="#ver<?php echo $aprendiz->idPersona; ?>"><i class="bi-eye"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="ver<?php echo $aprendiz->idPersona?>">

                                <div class="modal-dialog modal-dialog-centered modal-xl">

                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3">Datos aprendiz</h4> 
                                            <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-2 offset-1">
                                                    <img src="<?php echo RUTA_URL?>/img/alumno.png" width="150" height="150">
                                                </div>

                                                <div class="col-8 offset-1">

                                                    <div class="row">

                                                        <div class="col-12">
                                                            <label for="nombre_ap">Nombre: </label>
                                                            <input type="text" name="nombre_ap" id="nombre_ap" value="<?php echo $aprendiz->Nombre?>" readonly>
                                                        </div>
                    
                                                        <div class="col-12">
                                                            <label for="apellidos_ap">Apellidos: </label>
                                                            <input type="text" name="apellidos_ap" id="apellidos_ap" value="<?php echo $aprendiz->Apellido?>" readonly>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="genero_ap">Género: </label>
                                                            <input type="text" name="genero_ap" id="genero_ap" value="<?php echo $aprendiz->Genero?>" readonly>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="telefono_ap">Teléfono: </label>
                                                            <input type="text" name="telefono_ap" id="telefono_ap" value="<?php echo $aprendiz->Telefono?>" readonly>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="correo_ap">Correo: </label>
                                                            <input type="text" name="correo_ap" id="correo_ap" value="<?php echo $aprendiz->Correo?>" readonly>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="fechaNac_ap">Fecha Nacimiento: </label>
                                                            <input type="text" name="fechaNac_ap" id="fechaNac_ap" value="<?php echo $aprendiz->Fecha_Nacimiento?>" readonly>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            
                        </td>
                    </tr>
                <?php $cont++; endforeach ?>
            </tbody>
            
        </table>
        
        

    </div>
