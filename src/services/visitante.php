<?php

namespace Services;

class Visitante {

  public static function registrarVisitante($db, $nombre, $email, $genero) {
    $db->query('INSERT INTO visitante VALUES (NULL, "'.$nombre.'","'.$email.'","'.$genero.'")' );
    return $db->insert_id;
  }
}