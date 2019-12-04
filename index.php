<?php
function cargarSession(){
    session_start();
    $usF = file_get_contents("usuarios.json");
    $usA = json_decode($usF, true);
    $indiceU = 0;
    foreach($usA as $clave => $usuario){
        if($_POST["email"] == $usuario["reg_email"]){
            $indiceU = $clave;
        }
    }
    foreach($usA[$indiceU] as $clave => $dato){
        $_SESSION[$clave] = $dato;
    }

}

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

if($_POST){
    $loged = login();
    if($loged){
        cargarSession();


    }
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
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
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
                 <?php echo "Usuario logeado"?>
            <?php else:?>
                <?php echo "Contrasenia o usuario incorrecto"?>
                <a href="register.php">Registrarse</a>
            <?php endif;?>
            
        <?php endif;?>

    </header>

    <?php include("footer.html"); ?>

</body>

</html>