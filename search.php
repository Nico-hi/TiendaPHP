<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search PHP</title>
</head>
<body>
    <?php
#if($action==""){
#echo "no seleccionaste una opcion para realizar";
#}
    $action=$_POST['action'];

        $tabla= $_POST['valor_tabla'];
        $table=$tabla;

        if($tabla== "ambos" ) $table="usuario u join ventas v on u.id = v.id";
        $select=$_POST['valor_vista'];
        // Une los valores con coma
        $campos = implode(", ", $select);
        $condition=1;

        $sql="";
        if($action == "select"){
            $sql="$action $campos from $table where $condition";
        }elseif ($action == "insert"){
            $sql="$action into $campos values $table where $condition";
        }elseif ($action == "delete"){
            $sql="$action $campos from $table where $condition";
        }elseif ($action == "update"){
            $sql="$action $campos from $table where $condition";
        }
        


    
        echo $sql;
    ?>
    <br>
    <a href="./index.php">regresar de pagina</a>
</body>
</html>