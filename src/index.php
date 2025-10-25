<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../JDBC/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <h1>TiendaVirtual</h1>

    <div>
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
        $result1 = $con->query($sql1);
        $url1 = $result1->fetch_assoc();
        echo "<a href='devices.php?category=TVs'>
        <h3>TVs / Televisores</h3>
        <img src='$url1[img_c_t]'>
        </a>";
        
        ?>
    </div>
    <div>
        <?php
        $sql2 = "select img_c_t from category where id_c=2 and name_c='Smartphones'";
        $result2 = $con->query($sql2);
        $url2 = $result2->fetch_assoc();
        
        echo "<a href='devices.php?category=Smartphones'>
        <h3>Smartphones / Movíles</h3>
        <img src='$url2[img_c_t]'>
        </a>";
        ?>
    </div>

    <div>
        <?php
        $sql3 = "select img_c_t from category where id_c=3 and name_c='PCs'";
        $result3 = $con->query($sql3);
        $url3 = $result3->fetch_assoc();

        echo "<a href='devices.php?category=PCs'>
        <h3>PCs / Ordenadores de escritorio</h3>
        <img src='$url3[img_c_t]'>
        </a>";
        ?>
    </div>

    <div>
        <?php
        $sql4 = "select img_c_t from category where id_c=4 and name_c='Laptops'";
        $result4 = $con->query($sql4);
        $url4 = $result4->fetch_assoc();

        echo "<a href='devices.php?category=Laptops'>
        <h3>Laptops / Portatiles</h3>
        <img src='$url4[img_c_t]'>
        </a>";
        ?>
    </div>

    <div>
        <?php
        $sql5 = "select img_c_t from category where id_c=5 and name_c='Consoles'";
        $result5 = $con->query($sql5);
        $url5 = $result5->fetch_assoc();

        echo "<a href='devices.php?category=Consoles'>
        <h3>Consoles / Consolas</h3>
        <img src='$url5[img_c_t]'>
        </a>";
        ?>
    </div>

</body>

</html>