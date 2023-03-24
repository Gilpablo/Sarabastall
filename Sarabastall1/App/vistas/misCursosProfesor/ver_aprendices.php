<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/MiCursoProfesor">Cursos</a></li>
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

                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3" style="color: blue;">Datos aprendiz</h4> 
                                            <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-2 offset-1">
                                                    <img src="<?php echo RUTA_URL?>/img/alumno.png" width="150" height="150">
                                                </div>

                                                <div class="col-8 offset-1">

                                                    <div class="row">
                                                                                                        
                                                        <div class="col">
                                                            <input type="text" name="nombre_ap" id="nombre_ap" value="<?php echo $aprendiz->Nombre?>" readonly>
                                                            <label for="nombre_ap"><strong>Nombre</strong></label>
                                                        </div>

                                                        <div class="col">                                                            
                                                            <input type="text" name="apellidos_ap" id="apellidos_ap" value="<?php echo $aprendiz->Apellido?>" readonly>
                                                            <label for="apellidos_ap"><strong>Apellidos</strong></label>
                                                        </div>

                                                        <div class="col">                                                            
                                                            <input type="text" name="genero_ap" id="genero_ap" value="<?php echo $aprendiz->Genero?>" readonly>
                                                            <label for="genero_ap"><strong>Género</strong></label>
                                                        </div>

                                                        <div class="col">                                                            
                                                            <input type="text" name="telefono_ap" id="telefono_ap" value="<?php  echo $aprendiz->Telefono?>" readonly>
                                                            <label for="telefono_ap"><strong>Teléfono</strong></label>
                                                        </div>

                                                        <div class="col-12">                                                            
                                                            <input type="text" name="correo_ap" id="correo_ap" value="<?php  echo $aprendiz->Correo?>" readonly>
                                                            <label for="correo_ap"><strong>Correo</strong></label>
                                                        </div>

                                                        <div class="col-12">                                                            
                                                            <input type="text" name="fechaNac_ap" id="fechaNac_ap" value="<?php  echo $aprendiz->Fecha_Nacimiento?>" readonly>
                                                            <label for="fechaNac_ap"><strong>Fecha Nacimiento</strong></label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            
                                        </div>

                                        <!-- Modal Footer -->
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
    <?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
