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
    <link rel="stylesheet" href="./../css/profile.css">

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
                <a href="./sign.php?action=in">sign in</a>
                <a href="./sign.php?action=up">sign up</a>

            </section>

        </nav>
    </header>
    <main>
    <?php
        echo "<h1>Here are your personal data, if you want change them... push the button below</h1>";
        include './../../JDBC/conexion.php';
        $id_u=$_SESSION['id_u']??'';
        $sql="select * from user_data where id_u = $id_u limit 1";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();

        echo "
        <section class='data_table'>
            <table>
                <tr><th>Name</th><th>Lastname</td><th>Nickname</th><th>Email</th></tr>
                <tr><td>".$row['name_u']."</td><td>".$row['lastname_u']."</td><td>".$row['nickname_u']."</td><td>".$row['email']."</td></tr>

            </table>
        </section>";
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> <!--
    htmlspecialchars() => Convierte caracteres especiales en entidades HTML seguras. Evita que se interpreten como código HTML o JavaScript.    
    esto nos permite que el formulario lo redireccione a el mismo php-->
        <label for="name">New name? : 
            <input type="text" name="name" id="name">
        </label>
        <label for="lastname">New lastname? : 
            <input type="text" name="lastname" id="lastname">
        </label>
        <label for="email">New email? : 
            <input type="text" name="email" id="email">
        </label>
        <label for="passwd">New password? : 
            <input type="text" name="passwd" id="passwd">
        </label>
                <label for="passwd_verify">Confirm your new password : 
            <input type="text" name="passwd_verify" id="passwd_verify">
        </label>
        
        <input type="submit" value="choose">
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'] ?? null;
            $lastname = $_POST['lastname'] ?? null;
            $email = $_POST['email'] ?? null;
            $passwd = $_POST['passwd'] ?? null;
            $passwd_verify = $_POST['passwd_verify'] ?? null;

            $id_u = $_SESSION['id_u'] ?? null;

            if ($id_u) {
                $updates = [];

                if ($name) {
                    $name = mysqli_real_escape_string($con, $name);
                    $updates[] = "name_u = '$name'";
                }

                if ($lastname) {
                    $lastname = mysqli_real_escape_string($con, $lastname);
                    $updates[] = "lastname_u = '$lastname'";
                }

                if ($email) {
                    $email = mysqli_real_escape_string($con, $email);
                    $updates[] = "email = '$email'";
                }

                if ($passwd || $passwd_verify) {
                    if ($passwd !== $passwd_verify) {
                        echo "<p class='error'>❌ The passwords aren't equal.</p>";
                        return;
                    } else {
                        $passwd_hashed = password_hash($passwd, PASSWORD_DEFAULT);
                        $updates[] = "passwd_u = '$passwd_hashed'";
                    }
                }

                if (count($updates) > 0) {
                    $sql_post = "UPDATE user_data SET " . implode(", ", $updates) . " WHERE id_u = $id_u";
                    $result = $con->query($sql_post);

                    if ($result) {
                        echo "<p class='success'>✅ Data was updated successfully.</p>";
                        header("Location: ./profile.php");
                    } else {
                        echo "<p class='error'>❌ Update failed. Try again later.</p>";
                    }
                } else {
                    echo "<p class='error'>⚠️ You must fill at least one field to update.</p>";
                }
            }
        }
    ?>

    </main>

</body>
</html>