<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name_server="mysql";
$ip_server="127.0.0.1";//localhost
$user_server="root";
$passwd_server="Kawaii_456";
$name_bbdd="virtual_store";
// este es el problema
$con=new mysqli($ip_server,$user_server,$passwd_server,$name_bbdd);
if($con->connect_error){
    die("hubo un error en la coneccion de la BBDD si quieres sabe cual es el error aqui esta --> ".$con->connect_error);
}
?>