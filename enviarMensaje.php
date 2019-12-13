<?php
require_once('src/services/mensaje.php');
require_once('src/services/visitante.php');
require_once('src/services/conexion.php');

if (!isset($db)) {
  $db = new Conexion();
  $mysqli = $db->conexion;
}

if(isset($_POST['nombre'], $_POST['email'], $_POST['genero'], $_POST['mensaje'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $genero = $_POST['genero'];
  $mensaje = $_POST['mensaje'];
  $visitanteId = intval(\Services\Visitante::registrarVisitante($mysqli, $nombre, $email, $genero));
  
  \Services\Mensaje::enviarMensaje($mysqli, $mensaje, $visitanteId);
}
?>