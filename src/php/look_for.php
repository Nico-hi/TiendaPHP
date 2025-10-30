<?php
session_start();
$profileLink = isset($_SESSION['id_u']) ? './profile.php' : './sign.php?action=in';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../JDBC/conexion.php';
$name=$_GET['name'];
$price=$_GET['price'];
$category=$_GET['category']??"All_devices";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>looking for something</title>
    <link rel="stylesheet" href="./../css/base.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/index.css">
</head>
<body>

    <header>
        <nav>
            <section>
                <a href="./../index.php">Home</a> <!-- tambien se puede poner el ./index.php pero en la parte de la ruta se ve feo... asi que lo deje asi-->
                <a href="<?php echo $profileLink; ?>">Profile</a>
                <a href="./category.php">category</a>

            </section>
            <section>
                <form action="look_for.php" method="get">
                    <label for="name">Nombre : 
                        <input type="search" name="name" id="name">
                    </label>
                    <label for="price">Precio minimo : <p id="precio_salida"> 0 </p>
                        <input type="range" value="0" min="0" max="3000" name="price" id="price" oninput="document.getElementById('precio_salida').textContent = ' '+this.value+' '">
                    </label>
                    <label for="category">
                        <select name='category' id='category'>                             
                            <option >seleciona una opcion ...</option>
                            <option value='TVs'>TVs / Televisores</option>
                            <option value='Smartphones'>Smartphones / Movíles</option>
                            <option value='PCs'>PCs / Ordenadores de escritorio</option>
                            <option value='Laptops'>Laptops / Portatiles</option>
                            <option value='Consoles'>Consoles / Consolas</option>
                        </select>
                    </label>
                <input type="reset" value="limpiar" onclick="document.querySelector('form label input[type=\'range\']').value=0; document.querySelector('form label #precio_salida').textContent=0;">
                <input type="submit" value="buscar">
                </form>
            </section>
            <section>
                <a href="./sign.php?action=in">sign in</a>
                <a href="./sign.php?action=up">sign up</a>
            </section>

        </nav>
    </header>
    <?php
    $condition="";
    if($category=="TVs"){
        $condition=" where id_c = 1";
        echo"<h1 style='text-align:center;' >Te encuentras en la categoria de $category / Televisores </h1>";
        }elseif ($category=="Smartphones") {
            $condition="where id_c = 2";
            echo"<h1 style='text-align:center;' >Te encuentras en la categoria de $category / Movíles </h1>";
        }elseif ($category=="PCs") {
            $condition="where id_c = 3";
            echo"<h1 style='text-align:center;' >Te encuentras en la categoria de $category / Ordenadores de escritorio </h1>";
        }elseif ($category=="Laptops") {
            $condition="where id_c = 4";
            echo"<h1 style='text-align:center;' >Te encuentras en la categoria de $category / Portatiles </h1>";
        }elseif ($category=="Consoles") {
            $condition="where id_c = 5";
            echo"<h1 style='text-align:center;' >Te encuentras en la categoria de $category / Consolas </h1>";
        }else{
            $condition = "where 1";
        }
        //aqui se puede poner un else if para All_devices , pero como no hay mas opciones lo toma como defecto el la consulta completa sin condicion ...
        ?>

<main class="productos-grid">
        <?php

        if($name=="" && $price==0){
            $condition .= "";
        }elseif($name=="" && $price>0){
            $condition .= " and (price_P between $price and 3000)";
        }elseif($name!="" && $price==0){
            $condition .= " and (name_p like '%$name%')";
        }elseif($name!="" && $price>=0){
            $condition .= " and (price_P between $price and 3000) and (name_p like '%$name%')";
        }

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