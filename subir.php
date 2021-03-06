<?php 

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location:admin/index.php');
}
else { 

include_once('Model/procesarDatosModel.php');
$Objeto = new procesarDatos();


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar pagina Argenis Contreras</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="View/css/bootstrap.min.css" />
	<link rel="stylesheet" href="View/css/estilos_editar_pagina.css">

	<script>
		
	</script>
</head>
<body>
<section class="bloque_administracion">
	
		
	<section class="menu">
		<h5 class="items-menu">Bienvenido <?php echo $_SESSION['usuario']; ?></h5>

		<div class="items-menu btn-salir">
		<a href="admin/cerrar_sesion.php">
		
			<span class="glyphicon glyphicon-log-out"></span>
			Salir
		</a>
			
		</div>

	</section>

</section>
<!-- SECCION PANEL-CONTROL -->
<section class="row panel-control">
			
	<nav class="menu-panel-control">

		<ul>
			<a href="editar_pagina.php"><li><span class="glyphicon glyphicon-home"></span> Principal</li></a>
			<a href="editar-galeria.php"><li><span class="glyphicon glyphicon-picture"></span> Galerìa</li></a>
			<a href="subir_imagen_secciones.php"><li><span class="glyphicon glyphicon-picture"></span> Imagenes de fondos</li></a>
		</ul>
	</nav>

</section>

<section class="row contenido_principal">

<?php error_reporting(E_ALL ^ E_NOTICE);

	  $id = $_GET['id'];
 ?>
	<section class="col-md-10 panel-edicion">

<?php 

if ($id == 1) {	echo "<h3 style='text-align:center'>Principal</h3>";}
elseif ($id == 2) { echo "<h3 style='text-align:center'>Cinco Musicos</h3>";}
elseif ($id == 3) { echo "<h3 style='text-align:center'>Grupo Completo</h3>";}
elseif ($id == 4) { echo "<h3 style='text-align:center'>Vallenato Con Guitarra</h3>";}
elseif ($id == 5) { echo "<h3 style='text-align:center'>Mas Temas</h3>";}
elseif ($id == 6) { echo "<h3 style='text-align:center'>@ArgenisContreraz</h3>";}
elseif ($id == 7) { echo "<h3 style='text-align:center'>Argenis Contreras</h3>";}
elseif ($id == 8) { echo "<h3 style='text-align:center'>@ArgenisContrer6</h3>";}
elseif ($id == 9) { echo "<h3 style='text-align:center'>Argenis Contreras</h3>";}


?>

		<form action="Controller/subirImagenController.php" method="post" enctype="multipart/form-data">
			
			<section class="row seccion_subir_imagen text-center">
					
				<img class="item_subir_imagen logo_subir" src="View/img/logo_subir.png" width="100" alt="">

				<input type="file" name="imagen" class="item_subir_imagen input-imagen form-control">
				
				<!-- Input que manda un id oculto -->
				<input type="hidden" name="tabla" value="imagenes_cargadas">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<input type="submit" value="Subir" class="item_subir_imagen boton_enviar btn btn-primary">

			</section>

		</form>

	</section>
	<section class="imagenes_subidas">
		<div class="texto-subidas">
		
			<h1 class="item_texto">Imagen subida</h1>
			<hr>
			
		</div>
		<div class="imagenes">
			

		<?php  
		// Mando null, para que me reciba un valor nulo y me mande todas las imagenes, por defecto no es null.
		$imagenes = $Objeto->seleccionarImagen('imagenes_cargadas',$id);
		foreach ($imagenes as $imagen) { ?>

		<img class="item_imagen" src="View/img/<?php echo $imagen['nombre_imagen'] ?>">

		<?php }	?>
		</div>
			
	</section>

	

	<footer>

		<section class="col-xs-12 col-md-10"><h4>Argenis Contreras | Derechos reserados 2016</h4></section>
		<section class="col-xs-12 col-md-10"><h4>Diseño y Desarrollo por Odannys De La Cruz</h4></section>

	</footer>

	
</section>
	

</body>
</html>

<?php } ?>