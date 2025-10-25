<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '../JDBC/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
</head>

<body>
    <h1>TiendaVirtual</h1>

    <div>
        <h3>TVs / Televisores</h3>
        <?php
/*
        $sql1="select * from category;";
        $result1=$con->query($sql1);
        if($result1 -> num_rows > 0){
            while($fila + $result1 -> fetch_assoc()){
                echo "{$fila['id_c']}";
            }}
*/
        

        $sql1 = "select img_c_t from category where id_c=1 and name_c='TVs'";
        echo "hola";
        $result1 = $con->query($sql1);
        var_dump($result1);
        $url1 = $result1->fetch_assoc();
        var_dump($url1);
        echo "<a href='devices.php?category=TVs'><img src='$url1[img_c_t]'></a>";
        
        ?>
    </div>
    <div>
        <h3>Smartphones / Movíles</h3>
        <?php
        $sql2 = "select img_c_t from category where id_c=2 and name_c='Smartphones'";
        $result2 = $con->query($sql2);
        echo "<a href='devices.php?category=Smartphones'><img src='$result2'></a>";
        ?>
    </div>

    <div>
        <h3>PCs / Ordenadores de escritorio</h3>
        <?php
        $sql3 = "select img_c_t from category where id_c=3 and name_c='PCs'";
        $result3 = $con->query($sql3);
        echo "<a href='devices.php?category=PCs'><img src='$result3'></a>";
        ?>
    </div>

    <div>
        <h3>Laptops / Portatiles</h3>
        <?php
        $sql4 = "select img_c_t from category where id_c=4 and name_c='Laptops'";
        $result4 = $con->query($sql4);
        echo "<a href='devices.php?category=Laptops'><img src='$result4'></a>";
        ?>
    </div>

    <div>
        <h3>Consoles / Consolas</h3>
        <?php
        $sql5 = "select img_c_t from category where id_c=5 and name_c='Consoles'";
        $result5 = $con->query($sql5);
        echo "<a href='devices.php?category=Consoles'><img src='$result5'></a>";
        ?>
    </div>

</body>

</html>