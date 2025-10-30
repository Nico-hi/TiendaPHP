<?php
session_start();
$action_sign = $_GET['action'];
$profileLink = isset($_SESSION['id_u']) ? './profile.php' : './sign.php?action=in';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./../css/base.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/sign.css">
    <?php

    echo "<title>Sign $action_sign </title>";

    ?>
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
                <h2>me da pereza que desapareca si ya estas logueado....</h2>
                <a href="./sign.php?action=in">sign in</a>
                <a href="./sign.php?action=up">sign up</a>
            </section>

        </nav>
    </header>
    <main>
        <div id="form_sign">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                include './../../JDBC/conexion.php';
                if ($action_sign == "in") {
                    $log_user = $_POST['log_user'];
                    $passwd_user = $_POST['passwd_user'];
                    $sql="select id_u,passwd_u from user_data where (nickname_u = '".$log_user."') or (email = '".$log_user."') limit 1";
                    $result= $con->query($sql);
                    $row=$result->fetch_assoc();
                    if($result->num_rows === 1){
                        if(password_verify($passwd_user,$row['passwd_u'])){
                            $_SESSION['id_u']=$row['id_u'];
                            header("Location: ./profile.php");
                        }
                    }else{
                        echo"something is wrong <br>Try again.";
                    }

                } elseif ($action_sign == "up") {
                    $name_user = $_POST['name_user'];
                    $lastname_user = $_POST['lastname_user'];
                    $nickname_user =$_POST['nickname_user'];
                    $email_user = $_POST['email_user'];
                    $passwd_user = $_POST['passwd_user'];
                    $confirm_passwd_user = $_POST['confirm_passwd_user'];
                    $verify_code = $_POST['verify_code'];

                    if ($_SESSION['verify_code'] === $verify_code) {
                        $sql_verify="select * from user_data where (nickname_u = '$nickname_user') or (email = '$email_user')";
                        $result_verify=$con->query($sql_verify);
                        if($result_verify->num_rows!=1){
                            $passwd_user_h=password_hash($passwd_user,PASSWORD_DEFAULT);
                            unset($_SESSION['verify_code']); // limpiar la variable que guardamos después de usar/ser correcta
                            $sql="insert into user_data (name_u,nickname_u,lastname_u,email,passwd_u) 
                            values ('$name_user','$nickname_user','$lastname_user','$email_user','$passwd_user_h');";
                            $result=$con->query($sql);

                            if($result){
                                echo'It works, now you can sign in xD';
                            }else{
                                echo 'try again later';
                            }

                        }else{
                            echo "your email or nickname is already used... use another one";
                        }
                        } else {
                        echo "❌ the code is wrong try again";
                    }
                }
            }

            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?action=$action_sign"); ?>" method="post">
                <?php
                if ($action_sign === "in") {
                    echo "
                    <section class='left'>
                        <h1>Let's sing in !!!!</h1>
                        <script defer src='./js/sign_in.js'></script>

                        <label for='log_user'>User Nickname or Email: 
                            <input type='text' name='log_user' id='log_user' autocomplete='off'>
                        </label>

                        <label for='passwd_user'>Password : 
                            <input type='password' name='passwd_user' id='passwd_user' autocomplete='off'>
                        </label>
                        
                        <input type='submit' value='sign in' name='input_sign'>

                    </section>
                    <section class='right'>
                    </section>
                    ";
                } elseif ($action_sign === "up") {

                    $caracters = "abcdefghijklmnopqrstuvwxyz1234567890";
                    $str_rand = "";
                    if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $action_sign === "up") {
                        function RandNum()
                        {
                            return rand(0, 35);
                        }
                        ;

                        for ($i = 0; $i < 6; $i++) {
                            $str_rand .= $caracters[RandNum()];

                        }
                        $_SESSION['verify_code'] = $str_rand;
                    }

                    echo "
                    <section class='left'>
                        <h1>Let's sing up !!!!</h1>
                        <label for='name_user'>User Name : 
                            <input type='text' name='name_user' id='name_user' autocomplete='off'>
                        </label>

                        <label for='latname_user'>User Lastname : 
                            <input type='text' name='lastname_user' id='latname_user' autocomplete='off'>
                        </label>

                        <label for='nickname_user'>User Nickname : 
                            <input type='text' name='nickname_user' id='nickname_user' autocomplete='off' required>
                        </label>

                        <label for='email_user'>Email : 
                        <input type='email_user' name='email_user' id='email_user' autocomplete='off' required>
                        </label>
                        
                        <label for='passwd_user'>Password : 
                            <input type='password' name='passwd_user' id='passwd_user' autocomplete='off' required>
                        </label>
                            
                        <label for='confirm_passwd_user'>Password : 
                            <input type='password' name='confirm_passwd_user' id='confirm_passwd_user' autocomplete='off' required>
                        </label>
                                
                        <label for='verify_code'> <b><u>Codigo de verificacion</u></b>
                            <span>$str_rand </span>
                            <input type='text' name='verify_code' id='verify_code' autocomplete='off' required>
                        </label>
                                
                        <input type='submit' value='sign up' name='input_sign'>
                    </section>

                    <section class='right'>
                    </section>
                    ";
                }
                ?>
                </form>
            
        </div>
    </main>
</body>

</html>