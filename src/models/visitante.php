<?php

class Visitante {
  private $id;
  private $nombres;
  private $email;
  private $genero;

  public function __constructor($id, $nombres, $email, $genero) {
    $this->id = $id;
    $this->nombres = $nombres;
    $this->email = $email;
    $this->genero = $genero;
  }
}