<?php
<<<<<<< HEAD
  session_start();
=======
    session_start();
    $loged = false;
>>>>>>> b344b6472c60f8e49ec204f7df3eb7a8e08dd08d

    function cargarSession(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        $indiceU = 0;
        foreach($usA as $clave => $usuario){
            if($_POST["email"] == $usuario["reg_email"]){
                $indiceU = $clave;
            }
<<<<<<< HEAD
        }
        foreach($usA[$indiceU] as $clave => $dato){
            $_SESSION[$clave] = $dato;
=======
>>>>>>> b344b6472c60f8e49ec204f7df3eb7a8e08dd08d
        }
        foreach($usA[$indiceU] as $clave => $dato){
            $_SESSION[$clave] = $dato;
        }

    }
<<<<<<< HEAD

    function login(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        foreach($usA as $usuario){
            if($_POST["email"] == $usuario["reg_email"])
                if(password_verify($_POST["contrasenia"], $usuario["reg_passwd"]))
                    return true;
        }
        return false;
    }

    function recordar($email, $contrasenia){
        setcookie("email", $email);
        setcookie("contrasenia", $contrasenia);
    }

if ( isset($_COOKIE["email"]) and isset($_GET["logeado"]) ){
    setcookie("email", null, -1);
    setcookie("contrasenia", null, -1);
}

if($_POST){
    $loged = login();
    if($loged){
        cargarSession();
        if(isset($_POST["recordar"]))
            recordar($_POST["email"],$_POST["contrasenia"]);
=======

    function login(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        foreach($usA as $usuario){
            if($_POST["email"] == $usuario["reg_email"])
                if( password_verify($_POST["contrasenia"], $usuario["reg_passwd"]) ){
                    return true;
                }
        }
        return false;
    }

    function recordar($email, $contrasenia){
        setcookie("email", $email);
        setcookie("contrasenia", $contrasenia);
        setcookie("logeado", true);
    }

    function levanta(){
        if ( isset($_COOKIE['logeado']) ){
            header('Location: posts.php');
        }
    }

    if ( isset($_COOKIE['logeado']) ){
        header('Location: posts.php');
    }
    else
    {
 ##       var_dump($_COOKIE);
  #      die();
    }

    if(!$_POST){
        if( isset($_COOKIE["email"]) and isset($_COOKIE["logeado"]) ){
            echo "deberia estar logueado";
            levanta();
        }
    }
    else {
        $loged = login();
        echo $loged;
        if($loged){
            cargarSession();
            if(isset($_POST["recordar"]))
                recordar($_POST["email"],$_POST["contrasenia"]);
        }
>>>>>>> b344b6472c60f8e49ec204f7df3eb7a8e08dd08d
    }
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
        <?php if(isset($_COOKIE["email"])):?>

            <?php echo "Bienvenido ".$_COOKIE["email"];?>
            <a href="index.php?logeado=5">Deslogearse</a>
        <?php else:?>
            
        <form action="index.php" method="POST">
            <!-- div que contiene nuestro formulario de inicio de sesión -->
            <div id="Login" class="row">

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInput">Email</label>
                    <input  type="email" class="form-control form-control-sm mb-2" id="inlineFormInput" placeholder="Email" name="email">
                </div>

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInputGroup">Contraseña</label>
                    <input name="contrasenia" type="password" class="form-control form-control-sm mb-2" id="inlineFormInputGroup" placeholder="Contraseña">
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
        <?php if($_POST):?>
            <?php if($loged):?>
<<<<<<< HEAD
                header("Location: posts.php");
                 <?php echo "Usuario logeado"?>
=======
                 <?php echo "Usuario logeado";
                 header('Location: posts.php');
                 ?>
>>>>>>> b344b6472c60f8e49ec204f7df3eb7a8e08dd08d
            <?php else:?>
                <?php echo "Contrasenia o usuario incorrecto"?>
                <a href="register.php">Registrarse</a>
            <?php endif;?>
            
        <?php endif;?>
    <?php endif;?>
    </header>

    <?php include("footer.php"); ?>

</body>

</html>