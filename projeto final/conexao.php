<?php 

$ip = "127.0.0.1";
$user = "root";
$port = "3366";
$pass ="";
$db = "db_catalogo3E2";

$con = new mysqli($ip, $user, $pass, $db, $port);

if($con->connect_error){
    echo $con->connect_error;
    die();
}

?>