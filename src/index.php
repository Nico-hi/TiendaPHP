<?php
session_start();
$profileLink = isset($_SESSION['id_u']) ? './php/profile.php' : './php/sign.php?action=in'; // si tengo un inicio de sesion guardado me deja entrar al profile, sino me redirecciona al login
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../JDBC/conexion.php';
$category = $_GET['category'] ?? 'All_devices';
$condition = " where 1";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <header>
        <nav>
            <section>
                <a href="./">Home</a>
                <!-- tambien se puede poner el ./index.php pero en la parte de la ruta se ve feo... asi que lo deje asi-->
                <a href="<?php echo $profileLink; ?>">Profile</a>
                <a href="./php/category.php">category</a>
            </section>
            <section>
                <h3><u>busqueda avanzada</u></h3>
                <form action="./php/look_for.php" method="get">
                    <label for="name">Nombre :
                        <input type="search" name="name" id="name" value="" required>
                    </label>
                    <label for="price">Precio minimo: <p id="precio_salida"> 0 </p>
                        <input type="range" value="0" min="0" max="3000" name="price" id="price"
                            oninput="document.getElementById('precio_salida').textContent = ' '+this.value+' '">
                    </label>
                    <label for="category">
                        <?php
                        $select_option = "<select name='category' id='category'>";
                        if ($category == "TVs") {
                            $condition = " where id_c = 1";
                            $select_option .= "<option value='TVs'>TVs / Televisores</option>";
                        } elseif ($category == "Smartphones") {
                            $condition = " where id_c = 2";
                            $select_option .= "<option value='Smartphones'>Smartphones / Movíles</option>";
                        } elseif ($category == "PCs") {
                            $condition = " where id_c = 3";
                            $select_option .= "<option value='PCs'>PCs / Ordenadores de escritorio</option>";
                        } elseif ($category == "Laptops") {
                            $condition = " where id_c = 4";
                            $select_option .= "<option value='Laptops'>Laptops / Portatiles</option>";
                        } elseif ($category == "Consoles") {
                            $condition = " where id_c = 5";
                            $select_option .= "<option value='Consoles'>Consoles / Consolas</option>";
                        } else {
                            $select_option .= "                           
                                    <option >seleciona una opcion ...</option>
                                    <option value='TVs'>TVs / Televisores</option>
                                    <option value='Smartphones'>Smartphones / Movíles</option>
                                    <option value='PCs'>PCs / Ordenadores de escritorio</option>
                                    <option value='Laptops'>Laptops / Portatiles</option>
                                    <option value='Consoles'>Consoles / Consolas</option>";
                        }
                        $select_option .= "</select>";
                        echo $select_option;
                        ?>
                    </label>
                    <input type="reset" value="limpiar"
                        onclick="document.querySelector('form label input[type=\'range\']').value=0; document.querySelector('form label #precio_salida').textContent=0;">
                    <input type="submit" value="buscar">
                </form>
            </section>
            <section>
                <a href="./php/sign.php?action=in">sign in</a>
                <a href="./php/sign.php?action=up">sign up</a>
            </section>

        </nav>
    </header>


    <main class="productos-grid">
        <?php
        $sql = "select * from product $condition";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='producto-card'>
                <img src='" . $row['img_p_t'] . "' alt='" . $row['name_p'] . "' />
                    <div class='card-info'>
                    <h3>" . $row['id_p'] . " .- " . $row['name_p'] . "</h3>
                    <p class='card-price'>" . $row['price_p'] . " €</p>
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