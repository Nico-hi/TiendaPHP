<?php
$name_server="mysql";
$ip_server="localhost";
$user_server="user";
$passwd_server="userpass";
$name_bbdd="virtual_store";
// este es el problema
$con=new mysqli($name_server,$user_server,$passwd_server,$name_bbdd,);
var_dump($con);
if($con->connect_error){
    die("hubo un error en la coneccion de la BBDD si quieres sabe cual es el error aqui esta --> ".$con->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>