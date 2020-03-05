<?php
    session_start();
    $loged = false;

    function conectarBase(){
        $dsn = 'mysql:host=127.0.0.1;dbname=buitre_db;port3306';
        $db_usr ='root';
        $db_pass = '';
        try{
            $db=new PDO($dsn,$db_usr, $db_pass);
            
        }catch(PDOException $exeption){
            echo $exeption->getMessage();
            return null;
        }
        return $db;    
            
    }
    function login($db){
        $query = $db->prepare('SELECT COUNT(username) FROM usuarios WHERE email = "'.$_POST["email"].'"');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result['COUNT(username)'] == 1){
            $query = $db->prepare('SELECT password FROM usuarios WHERE email = "'.$_POST["email"].'"');
            $query->execute();
            $pass = $query->fetch(PDO::FETCH_ASSOC);
            if( password_verify($_POST["contrasenia"], $pass['password']) ){
                return true;
            }
        }
        return false;
    }

    function cargarSession($db){
        $query = $db->prepare('SELECT COUNT(username) FROM usuarios WHERE email = "'.$_POST["email"].'"');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result['COUNT(username)'] == 1){
            $query = $db->prepare('SELECT id, username, email, password, fecha_nac, genero_id, imagen FROM usuarios WHERE email = "'.$_POST["email"].'"');
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($result);
            $_SESSION["usuario"] = $result;
        }

/**
        $usF = file_get_contents("usuarios.json");
        $listaUsuarios = json_decode($usF, true);
        $indiceU = 0;
//      foreach($listaUsuarios as $clave => $usuario){
        foreach($listaUsuarios as $usuario){
                if($_POST["email"] == $usuario["reg_email"]){
//                  $indiceU = $clave;
                    $_SESSION["usuario"] = $usuario;
            }
        }*/
/*      foreach($usA[$indiceU] as $clave => $dato){
            $_SESSION[$clave] = $dato;
        }
*/
     }


    function recordar($email, $contrasenia, $persiste){
        if ($persiste):
            $tiempo = time() + (60 * 60 * 24 * 30);
            setcookie("email", $email, $tiempo);
            setcookie("contrasenia", $contrasenia, $tiempo);
            setcookie("logeado", true, $tiempo);
        else:
            setcookie("email", $email);
            setcookie("contrasenia", $contrasenia);
            setcookie("logeado", true);
        endif;

    }

    function levanta($db){
        if ( isset($_COOKIE['logeado']) ){
            cargarSession($db);
            header('Location: posts.php');
        }
    }
    $db = conectarBase();
    levanta($db);

    if(!$_POST):
        if( isset($_COOKIE["email"]) and isset($_COOKIE["logeado"]) ):
            levanta($db);
        endif;
    else:{
        $loged = login($db);
        
    }
        
        if($loged){
            if(isset($_POST["recordar"]))
                recordar($_POST["email"],$_POST["contrasenia"], True);
            else
                recordar($_POST["email"],$_POST["contrasenia"], False);

            levanta();
            echo "<pre>";
            var_dump($_SESSION);
            var_dump($_COOKIE);
            echo "</pre>";            
            header('Location: posts.php');
        }
    endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenidos a Vulture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home - style.css">
</head>

<body>
    <!-- Header containerA -->
    <header id="containerA">

        <div id="Logo">
            <img class="cls_logo" src="imgs/Logo - Social.png">
        </div>
            
        <form action="index.php" method="POST">
            <!-- div que contiene nuestro formulario de inicio de sesión -->
            <div id="Login" class="row">

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInput">Email</label>
                    <input  type="email" class="form-control form-control-sm mb-2" id="inlineFormInput"
                            placeholder="Email" name="email" value=" <?= isset($_POST["email"]) ? $_POST["email"]:'';?>">
                </div>

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInputGroup">Contraseña</label>
                    <input name="contrasenia" type="password" class="form-control form-control-sm mb-2"
                        id="inlineFormInputGroup"
                        placeholder="Contraseña">
                </div>

                <div class="col-10">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="recordar">
                        <label class="form-check-label" for="autoSizingCheck">Remember me</label>
                    </div>
                </div>

                <div class="col-10 pt-3">
                    <button type="submit" class="btn btn-primary btn-sm mb-2 col-12">Iniciar</button>
                </div>

            </div>
            <!-- Fin del formulario de inicio de sesión -->
        </form>

            <?php if($_POST && !$loged): ?>
                <center>Contrasenia o usuario incorrecto</center>
                <a href="register.php">Registrarse</a>
            <?php endif;?>

</header>

    <?php include("footer.php"); ?>

</body>

</html>