	<?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>


	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Cursos</li>
		</ol>
	</nav>

	<div class="container">

		<h5 class="text-center"> Cursos de <?php echo $datos['usuarioSesion']->Nombre;?> </h5>

		<div class="row">
			<?php foreach($datos['cursosAprendiz'] as $curso) :?>
				<div class="col-6 ">
					<form action="" method="post">
						<div class="card text-center">
							<div class="card-body shadow">
								<h5 class="card-title"><?php echo $curso->Nombre;?></h5>
								<div class="row">
									<div class="col-4">
										<p class="card-text"><strong> Fecha Inicio: </strong></p>
									</div>
									<div class="col-4">
										<p class="card-text"><strong> Fecha Fin: </strong></p>
									</div>
									<div class="col-4">
										<p class="card-text "><strong> Especialidad: </strong></p>
									</div>
								</div>
								<div class="row">
									<div class="col-4">
										<p class="card-text"><?php echo $curso->Fecha_Inicio?></p>
									</div>
									<div class="col-4">
										<p class="card-text"><?php echo $curso->Fecha_Fin?></p>
									</div>
									<div class="col-4">
										<p class="card-text"> 
											<?php foreach ($this->datos["especialidad"] as $especialidad): ?>
												<?php if ($curso->idEspecialidad == $especialidad->idEspecialidad): ?>
													<?php echo $especialidad->Nombre; ?>
												<?php endif ?>
											<?php endforeach ?>
										</p>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-12">
										<a class="btn btn-primary me-md-3 col-6"  href="<?php echo RUTA_URL?>/miCursoAprendiz/ver_curso/<?php echo $curso->idCurso;?>">Ver Archivos</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>