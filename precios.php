<?php
require_once('src/services/conexion.php');
require_once('src/services/guitarra.php');

$db = new Conexion();
$mysqli = $db->conexion;

include_once('enviarMensaje.php');

$guitarras = \Services\Guitarra::getGuitarras($mysqli);

?>

<!DOCTYPE html>
<html>

<head>
    <title>M&S Guitars - Precios</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Allerta|Montserrat:400,700" rel="stylesheet" />
</head>

<body>
    <header id="header" class="header background">
        <div class="container">
            <!-- Logo -->
            <figure class="logo">
                <img src="images/logo+(1).png" alt="invie logo" width="186" height="50" />
            </figure>
            <!-- Menu -->
            <nav class="menu">
                <ul>
                    <li><a href="index.php" title="">Inicio</a></li>
                    <li><a href="index.php#guitars" title="">Guitarras</a></li>
                    <li><a href="precios.php" title="">Precios</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->
<section class="main">
    <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Precio</th>
                        <th>Modelo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
    <?php
      for ($i = 0; $i < count($guitarras); $i++) {
        echo '<tr>';
        echo '<td>'.$guitarras[$i]->nombre.'</td>';
        echo '<td> S/'.$guitarras[$i]->precio.'</td>';
        echo '<td>'.$guitarras[$i]->caracteristicas[0].'</td>';
        echo '<tr>';
      }
    ?>
                </tbody>
            </table>
        </div>

</section>

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