<?php
session_start();
include './../../JDBC/conexion.php';
if ($_SESSION['id_c'] && !isset($_POST['borrar_carrito']) ) {
    $id_p = isset($_GET['id_p'])?$_GET['id_p']: null;
    $price_p = isset($_GET['price_p'])?$_GET['price_p']: null;
    $sql = 'insert into carrito_items (carrito_id,producto_id, cantidad) values (' . $_SESSION['id_c'] . ',' . $id_p . ',1)';
    $result = $con->query($sql);
    if ($result == true) {
        echo "Producto añadido al carrito correctamente.";
        header('location:./../index.php');
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_carrito']) && $_SESSION['id_c']) {
    // Borra todos los productos del carrito (no borra el carrito en sí)
    $sqlDelete = "DELETE FROM carrito_items WHERE carrito_id = " . intval($_SESSION['id_c']);
    $con->query($sqlDelete);
    echo "<script>
        window.location.href = './../index.php';
    </script>";
}else {

    echo "<script>
        alert('Primero necesitas estar registrado para comprar.');
        window.location.href = './../index.php';
    </script>";
    exit;

}



?>

