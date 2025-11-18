<?php
session_start();
include './../../JDBC/conexion.php';
if($_SESSION['id_u'] && $id_c=isset($_GET['id_c']) && $price_p=isset($_GET['price_p']) ){
    $sql='insert into ';
    $result = $con->query($sql);



    header('location:./../index.php');
    exit;


}else{
    echo "<script>
        alert('Primero necesitas estar registrado para comprar.');
        window.location.href = './../index.php';
    </script>";
    exit;

}
?>
