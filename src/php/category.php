<?php
session_start();
$profileLink = isset($_SESSION['id_u']) ? './profile.php' : './sign.php?action=in';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../JDBC/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="./../css/base.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/category.css">
</head>
<body>

    <header>
        <nav>
            <section>
                <a href="./../index.php">Home</a> <!-- tambien se puede poner el ./index.php pero en la parte de la ruta se ve feo... asi que lo deje asi-->
                <a href="<?php echo $profileLink; ?>">Profile</a>
                <a href="./category.php">Category</a>
            </section>
            <section>
                <h3><u>busqueda avanzada</u></h3>
                <form action="./look_for.php" method="get">
                    <label for="name">Nombre :
                        <input type="search" name="name" id="name" value="" >
                    </label>
                    <label for="price">Precio minimo: <p id="precio_salida"> 0 </p>
                        <input type="range" value="0" min="0" max="3000" name="price" id="price"
                            oninput="document.getElementById('precio_salida').textContent = ' '+this.value+' '" required>
                    </label>
                    <label for="category">
                        <?php
                        $select_option = "
                        <select name='category' id='category'>                     
                            <option >seleciona una opcion ...</option>
                            <option value='TVs'>TVs / Televisores</option>
                            <option value='Smartphones'>Smartphones / Movíles</option>
                            <option value='PCs'>PCs / Ordenadores de escritorio</option>
                            <option value='Laptops'>Laptops / Portatiles</option>
                            <option value='Consoles'>Consoles / Consolas</option>
                        </select>";
                        echo $select_option;
                        ?>
                    </label>
                    <input type="reset" value="limpiar"
                        onclick="document.querySelector('form label input[type=\'range\']').value=0; document.querySelector('form label #precio_salida').textContent=0;">
                    <input type="submit" value="buscar">
                </form>
            </section>
            <section>
                <?php if (isset($_SESSION['id_u'])): ?>
                    <a href="./cart.php"><img src="https://png.pngtree.com/png-clipart/20230504/original/pngtree-shopping-cart-line-icon-png-image_9137796.png" alt="carrito" width="30"></a>
                    <a href="./close_sesion.php">Log out</a>
                <?php else: ?>
                    <a href="./sign.php?action=in">sign in</a>
                    <a href="./sign.php?action=up">sign up</a>
                <?php endif;?>
            </section>

        </nav>
    </header>
    <h1>TiendaVirtual</h1>

    <main>
        <div>
                <a href='../index.php?category=All_devices'>
                <h3>All Devices / Todos los dispositivos</h3>
                <img src='https://cdn-icons-png.freepik.com/512/2641/2641269.png'>
        </a>
        </div>
        <div>
            <?php
                $sql1 = "select img_c_t from category where id_c=1 and name_c='TVs'";
                $result1 = $con->query($sql1);
                $url1 = $result1->fetch_assoc();
                echo "<a href='../index.php?category=TVs'>
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
            
            echo "<a href='../index.php?category=Smartphones'>
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
            
            echo "<a href='../index.php?category=PCs'>
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
            
            echo "<a href='../index.php?category=Laptops'>
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
            
            echo "<a href='../index.php?category=Consoles'>
            <h3>Consoles / Consolas</h3>
            <img src='$url5[img_c_t]'>
            </a>";
            ?>
        </div>
    </main>
    
</body>

</html>