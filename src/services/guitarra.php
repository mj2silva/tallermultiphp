<?php
namespace Services;

class Guitarra {

  public static function getGuitarra($db, $id) {
    require_once('./../models/guitarra.php');
    $guitarra = new Guitarra();

    $resultado = $db->query('SELECT * FROM guitarra WHERE id = '.$id);
    $fila = $resultado->fetch_assoc();

    $guitarra->id = $fila['id'];
    $guitarra->nombre = $fila['nombre'];
    $guitarra->enlaceImagen = $fila['enlaceImagen'];
    $guitarra->precio = $fila['precio'];

    return $guitarra;
  }

  public static function getGuitarras($db) {
    require_once('src/models/guitarra.php');

    $resultado = $db->query('SELECT * FROM guitarra');
    $i = 0;

    $guitarras = [];

    while ($fila = $resultado->fetch_assoc()) {
      $guitarras[$i] = new \Guitarra();

      $guitarras[$i]->id = $fila['id'];
      $guitarras[$i]->nombre = $fila['nombre'];
      $guitarras[$i]->enlaceImagen = $fila['enlace_imagen'];
      $guitarras[$i]->precio = $fila['precio'];

      $resultado2 = $db->query('SELECT * FROM guitarra_caracteristica WHERE guitarra_id = '.$fila['id']);

      $j = 0;
      while ($fila2 = $resultado2->fetch_assoc()) {
        $caracteristicas[$j] = $fila2['caracteristica'];
        $j++;
      }

      $guitarras[$i]->caracteristicas = $caracteristicas;
      
      $i++;
    }

    

    return $guitarras;
  }
}