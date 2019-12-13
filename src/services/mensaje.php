<?php
namespace Services;

class Mensaje {

  public static function enviarMensaje($db, $mensaje, $visitanteId) {
    $db->query('INSERT INTO mensaje(mensaje, visitante_id) VALUES ("'.$mensaje.'", '.$visitanteId.')' );
  }
}