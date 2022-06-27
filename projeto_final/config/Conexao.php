<?php
class Conexao{

  static $con = null;

  public static function getConnection(){
  $ip = "127.0.0.1";
  $port = "3366";
  $user = "root";
  $pass = "";
  $db = "db_catalogo3E2";

  if(!self::$con){
      //cria uma conexão com o banco de dados no mysql
      self::$con = new mysqli($ip, $user, $pass, $db, $port);
  
      //verifica se houve erros na conexão
      if(self::$con->connect_error){
        echo self::$con->connect_error;
      die(); 
      }
    }
  return self::$con;
  }
}
?>