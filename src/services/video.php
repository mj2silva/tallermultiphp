<?php
namespace Services;

class Video {

  public static function getVideo($db, $id) {
    require_once('./../models/video.php');
    $video = new \Video();

    $resultado = $db->query('SELECT * FROM video WHERE id = '.$id);
    $fila = $resultado->fetch_assoc();

    $video->id = $fila['id'];
    $video->titulo = $fila['titulo'];
    $video->enlaceVideo = $fila['enlace_video'];

    return $video;
  }

  public static function getVideos($db) {
    require_once('src/models/video.php');

    $resultado = $db->query('SELECT * FROM video');
    $i = 0;

    $videos = [];

    while ($fila = $resultado->fetch_assoc()) {
      $videos[$i] = new \Guitarra();

      $videos[$i]->id = $fila['id'];
      $videos[$i]->titulo = $fila['titulo'];
      $videos[$i]->enlaceVideo = $fila['enlace_video'];

      $i++;
    }
    return $videos;
  }
}