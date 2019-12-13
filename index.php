<?php
require_once('src/services/conexion.php');
require_once('src/services/guitarra.php');
require_once('src/services/video.php');

$db = new Conexion();
$mysqli = $db->conexion;

include_once('enviarMensaje.php');
$guitarras = \Services\Guitarra::getGuitarras($mysqli);
$videos = \Services\Video::getVideos($mysqli);
?>

<!DOCTYPE html>
<html>

<head>
	<title>M&S Guitars</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Allerta|Montserrat:400,700" rel="stylesheet" />
</head>

<body>

	<section id="front" class="front background">
		<!-- portada -->
		<header id="header" class="header container">
			<!-- Logo -->
			<figure class="logo">
				<img src="images/logo+(1).png" alt="invie logo" width="186" height="200" />
			</figure>
			<!-- Menu -->
			<nav class="menu">
				<ul>
					<li><a href="index.php" title="">Inicio</a></li>
					<li><a href="index.php#guitars" title="">Guitarras</a></li>
					<li><a href="precios.php" title="">Precios</a></li>

				</ul>
			</nav>
		</header><!-- /header -->
		<div class="container portada">
			<!-- title -->
			<h1 class="title"><span>TheGuitar</span>Home</h1>
			<!-- description -->
			<h3 class="title-a">Se una estrella de rock</h3>
			<!-- button -->
			<a class="button" href="#guitars">Ver más...</a>
		</div>
	</section>

	<section id="guitars" class="guitars container">
		<!-- guitarras -->
    <!-- title -->
    <h2>Nuestras guitarras</h2>
    <?php
      for ($i = 0; $i < count($guitarras); $i++ ) {
        $lado = ($i % 2 == 0) ? 'a' : 'b';
        $container = ($i % 2 == 0) ? 'b' : 'a';
        $ladoImagen = ($i % 2 == 0) ? 'right' : 'left';
        echo '<article class="guitar '.$lado.'">';
        echo '<img src="'.$guitarras[$i]->enlaceImagen.'" alt="Guitarra electroacústica" width="350" class="'.$ladoImagen.'" />';
			  echo '<div class="guitar-text-container-'.$lado.'">';
        echo '<h3 class="title-'.$container.'">'.$guitarras[$i]->nombre.'</h3>';
        echo '<ol>';
        for ($j = 0; $j < count($guitarras[$i]->caracteristicas); $j++) {
          echo '<li>';
          echo $guitarras[$i]->caracteristicas[$j];
          echo '</li>';
        }
        echo '</ol>';
        echo '</div>';
        echo '</article>';
      }
    ?>

	</section>
	<br>
	<br>

	<section class="videos">

  <?php
      for ($i = 0; $i < count($videos); $i++ ) {
        echo '<h1>'.$videos[$i]->titulo.'</h1>';
        echo '<video src="'.$videos[$i]->enlaceVideo.'" controls autoplay muted width="500"></video>';
      }
    ?>
	</section>

	<br>

	<footer class="footer">
		<div class="container">
			<div class="contact">
				<!-- logo -->
				<div class="logo">
					<img src="images/logo+(1).png" width="100" alt="logo" />
				</div>
				<!-- phone number -->
				<div class="datos">
					<a href="tel:+11223444555"><strong>Número de teléfono: </strong> <span>+51 223 444 555</span></a>
					<!-- email -->
					<a href="mailto:contacto@invie.com"><strong>E-mail: </strong>
						<span>contacto@guitarhome.com</span></a>
				</div>
			</div>

			<form class="contactform" action="./" method="post">
				<!-- formulario de contacto	 -->
				<div class="col1">
					<label for="nombre">
						Nombre:
						<input type="text" placeholder="Escribe tu nombre" id="name" name="nombre" />
					</label>

					<label for="email">
						Email:
						<input type="email" required id="email" name="email" />
					</label>

					<div class="gender">
						<label for="radiomujer"><input checked type="radio" id="radiomujer" name="genero"
								value="femenino" />Femenino</label><br>
						<label for="radiohombre"><input type="radio" id="radiohombre" name="genero"
								value="femenino" />Masculino</label>
					</div>

					<div class="topics">
						<label for="quotation"><input checked type="checkbox" id="qutation" name="topics"
								value="qutation" />Cotización</label>
						<label for="claims"><input type="checkbox" id="claims" name="topics"
								value="claims" />Reclamos</label>
						<label for="comments"><input type="checkbox" id="comments" name="topics"
								value="comments" />Comentarios</label>
						<label for="others"><input type="checkbox" id="others" name="topics"
								value="others" />Otros</label>
					</div>

				</div>

				<div class="col2">


					<label for="mensaje">
						Mensaje:
						<textarea id="textspace" name="mensaje" cols="30" rows="7"
							placeholder="Escribe aquí tu mensaje"></textarea>
					</label>
					<input class="button" type="submit" name="sent" value="Enviar" />

				</div>

			</form>
		</div>

	</footer>
</body>

</html>

