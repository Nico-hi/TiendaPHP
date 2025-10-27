<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../JDBC/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/devices.css">
</head>
<body>
    <?php
    $category=$_GET['category'];
    $condition="";
    if($category=="TVs"){
        $condition=" where id_c = 1";
        echo"<h1 style='fonst-aling:center;' >Te encuentras en la categoria de $category / Televisores";
        }elseif ($category=="Smartphones") {
            $condition="where id_c = 2";
            echo"<h1 style='fonst-aling:center;' >Te encuentras en la categoria de $category / Movíles";
        }elseif ($category=="PCs") {
            $condition="where id_c = 3";
            echo"<h1 style='fonst-aling:center;' >Te encuentras en la categoria de $category / Ordenadores de escritorio";
        }elseif ($category=="Laptops") {
            $condition="where id_c = 4";
            echo"<h1 style='fonst-aling:center;' >Te encuentras en la categoria de $category / Portatiles";
        }elseif ($category=="Consoles") {
            $condition="where id_c = 5";
            echo"<h1 style='fonst-aling:center;' >Te encuentras en la categoria de $category / Consolas";
        }
        ?>

<main class="productos-grid">
        <?php
        $sql="select * from product $condition";
        $result=$con->query($sql);
        
        if($result->num_rows>0){
            while($row = $result->fetch_assoc() ){
                echo "
                <div class='producto-card'>
                <img src='".$row['img_p_t']."' alt='".$row['name_p']."' />
                    <div class='card-info'>
                    <h3>".$row['id_p']." .- ".$row['name_p']."</h3>
                    <p class='card-price'>".$row['price_p']." €</p>
                    <button class='card-btn'>Comprar</button>
                    </div>
                    </div>
                ";
            }
        }
        
        ?>
</main>
    
</body>
</html>