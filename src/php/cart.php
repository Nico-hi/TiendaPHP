<?php
session_start();
$profileLink = isset($_SESSION['id_u']) ? './profile.php' : './sign.php?action=in';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your profile</title>
    <link rel="stylesheet" href="./../css/base.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/cart.css">

</head>

<body>

    <header>
        <nav>
            <section>
                <a href="./../index.php">Home</a>
                <a href="<?php echo $profileLink; ?>">Profile</a>
                <a href="./category.php">category</a>
            </section>
            <section>
                <?php if (isset($_SESSION['id_u'])): ?>
                    <a href="./cart.php"><img
                            src="https://png.pngtree.com/png-clipart/20230504/original/pngtree-shopping-cart-line-icon-png-image_9137796.png"
                            alt="carrito" width="30"></a>
                    <a href="./close_sesion.php">Log out</a>
                <?php else: ?>
                    <a href="./sign.php?action=in">sign in</a>
                    <a href="./sign.php?action=up">sign up</a>
                <?php endif; ?>
            </section>

        </nav>
    </header>
    <main>
        <?php
        include './../../JDBC/conexion.php';
        $sql = 'select ci.carrito_id ,p.name_p,p.price_p , img_p_t, count(ci.cantidad) as quantity from carrito_items ci  join product p on ci.producto_id = p.id_p 
	where ci.carrito_id = ' . $_SESSION['id_c'] . '
	GROUP by ci.carrito_id,p.name_p,p.price_p, img_p_t; ';
        $result = $con->query($sql);
        $precio_total = 0;

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subTotal = $row['quantity'] * $row['price_p'];
                $precio_total += $subTotal;

                echo "
        <div class='producto-card'>
            <figure class='card-image'>
                <img src='" . htmlspecialchars($row['img_p_t']) . "' alt='" . htmlspecialchars($row['name_p']) . "' />
            </figure>
            <div class='card-info'>
                <h3>
                    <span class='quantity-tag'>" . $row['quantity'] . "×</span>
                    " . htmlspecialchars($row['name_p']) . "
                </h3>
                <p class='card-price'>Precio: <span class='price-num'>" . number_format($row['price_p'], 2) . "</span> € cada uno</p>
                <p class='card-details'>
                    <span class='cart-icon'>&#128722;</span> 
                    Subtotal: <span class='total-num'>" . number_format($subTotal, 2) . "</span> €
                </p>
            </div>
        </div>
        ";
            }
            // Mostrar total final del carrito al final con un boton de borrar carrito
            echo "
            <div class='carrito-total'>
                <h2>Total del carrito: <span class='total-num'>" . number_format($precio_total, 2) . "</span> €</h2>
                <form method='POST' action='./shopping_cart.php' style='display:inline;'>
                    <input type='hidden' name='borrar_carrito' value='1'>
                    <button type='submit' class='btn-borrar-carrito'>
                        <span class='cart-icon'>&#128465;</span> Vaciar carrito
                    </button>
                </form>
            </div>
            ";

        } else {
            echo "<p>Tu carrito está vacío.</p>";
        }

        ?>
    </main>
</body>

</html>