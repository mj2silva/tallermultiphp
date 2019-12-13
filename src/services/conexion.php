<?php

class Conexion {

  private $host;
  private $dbName;
  private $user;
  private $password;
  public $conexion;

  public function __construct() {
    
    $config = require('config.php');
    $database = $config['database'];
    
    $this->host = $database['host'];
    $this->dbName = $database['dbName'];
    $this->user = $database['user'];
    $this->password = $database['password'];
    $this->conexion = $this->conectar();
  }

  public function conectar() {
    if(!isset($this->conexion)) {
      $mysqli = new mysqli($this->host, $this->user, $this->password, $this->dbName);
      //echo "conectando";
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      $mysqli->set_charset("utf8");
      
      $this->conexion = $mysqli;
    } 
    // else {
    //   echo "conexion previamente establecida";
    // }
    
    return $this->conexion;
  }

}