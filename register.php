<?php
    session_start();
    include_once("db.php");

    if (isset($_COOKIE["logeado"]) && $_COOKIE["logeado"])
        header('Location: posts.php');
    else{
        setcookie("email", "", -1);
        setcookie("contrasenia", "",-1);
        setcookie("logeado", false);
    }

    function validate($db){
        $errores = [];
        if($_POST["sex"] == NULL)
            array_push($errores, "Indique su sexo");
        if($_FILES["imagen"]["error"] != UPLOAD_ERR_OK){
            array_push($errores, "error al subir la imagen  ");
        }
        
        $query = $db->prepare('SELECT COUNT(username) FROM usuarios WHERE email = "'.$_POST["reg_email"].'"');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result['COUNT(username)'] != 0){
           array_push($errores, "email ya existente");
        }
        if($_POST["reg_passwd"] != $_POST["reg_passwdC"]){
            array_push($errores, "Las contrasenias no coinciden.");
        }
        foreach($_POST as $clave => $valor){
            if($valor == "")
                array_push($errores, ("campo ".$clave. " incompleto"));
            if($clave == "reg_email")
                if(false == filter_var($valor, FILTER_VALIDATE_EMAIL))
                    array_push($errores, "mail incompatible");
        }
        return $errores;
    }

    function registrar($db){
        $query = $db->prepare('INSERT into usuarios (username, email, password, tipo_usuario,fecha_nac,genero_id, imagen) VALUES(:username, :email, :password, :tipo_usuario, :fecha_nac,:genero_id,:imagen)');
        $query->bindValue(':username', $_POST["firstname"], PDO::PARAM_STR);
        $query->bindValue(':email',  $_POST["reg_email"], PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($_POST["reg_passwd"], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $query->bindValue(':tipo_usuario', 'usuario', PDO::PARAM_STR);
        $query->bindValue(':fecha_nac', $_POST["birthday_day"] ."-". $_POST["birthday_month"]."-". $_POST["birthday_year"], PDO::PARAM_STR);
        $query->bindValue(':genero_id',$_POST["sex"], PDO::PARAM_STR);
        $ext = pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $query->bindValue(':imagen',uniqid().".".$ext, PDO::PARAM_STR);
        $query->execute();
        move_uploaded_file($_FILES["imagen"]["tmp_name"],"imgs/profiles/".uniqid().".".$ext);

    }

    if($_POST){
        $db = conectarBase();
        $errores = validate($db);
        if($errores==[]){
            registrar($db);
        }
            
            
    }
   
    $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];

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

        <div id="Logo" class="bg-white">
            <img class="cls_logo" src="imgs/Logo - Social.png">
        </div>
        
    </header>
    <!-- FIN Header containerA -->

    <!-- containerB - Formulario de registro -->
    <section id="containerB" class="container">

        <h3>Registro</h3>
        <?php if($_POST):?>
            <?php if($errores==[]):?>
                <?php echo "Registro completo"?>
            <?php else:?>
                <?php foreach($errores as $error):?>
                        Error encontrado, <?php echo $error?>
                        <br>
                <?php endforeach?>
            <?php endif;?>
        <?php endif;?>
    <!-- FIN containerB -->
    <br><br>
        <!-- Campos de texto a completar -->
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div id="Form-text" class="row">
                <div class="col-10"><input class="form-control form-control-sm" type="text" name="firstname" value="" placeholder="Nombre o Usuario"></div>
                <!-- Supuse que eso podría personalizarse después, una vez que se tiene una cuenta -->
                <!--<div class="col-10"><input class="form-control form-control-sm" type="text" name="lastname" value="" placeholder="Apellido"></div> -->
                <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email" value="" placeholder="Email"></div>
                <!-- En otros lugares ya no lo ponen más porque, por más que haya confirmación, si se ingresa mal el mail dos veces, sigue estando mal -->
                <!--  <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email_confirmation" value="" placeholder="Confirmar correo electrónico"></div> -->
                <div class="col-10"><input class="form-control form-control-sm" type="password" name="reg_passwd" placeholder="Contraseña"></div>
                <div class="col-10"><input class="form-control form-control-sm" type="password" name="reg_passwdC" placeholder="Confirmar contraseña"></div>
            </div>
            <!-- Fin de campos de texto -->
            <br>
            <!-- Opciones a elegir -->
            <div id="Form-option">

                <div>
                    <h5>Fecha de nacimiento</h5>
                </div>
                <section id="containerC" class="">
                    <select name="birthday_day" class="texto-white" style="height: 1.6em">
                        <!-- Esto después lo podemos armar con PHP -->
                        <?php for($i=31; $i>=1; $i--): ?>
                        <option value=<?= $i ?> selected=<?= $i ?>> <?= $i ?> </option>
                        <?php endfor; ?>
                    </select>

                    <select name="birthday_month" class="texto-white" style="height: 1.6em">
                        <!-- Esto después lo podemos armar con PHP -->
                        <?php for($i=11; $i>=0; $i--): ?>
                        <option value=<?= $i+1 ?> selected="<?= $i+1 ?>"> <?= $meses[$i] ?> </option>
                        <?php endfor; ?>
                    </select>
                    <!-- Esto después lo podemos armar con PHP -->
                    <!-- <input name = "birthday_year" type="number" class="texto-white" style="height: 1.6em" min="1900" max="2001" step="1" value="2001"/> -->
                    <select name="birthday_year" class="texto-white" style="height: 1.6em">
                        <!-- Esto después lo podemos armar con PHP -->
                        <?php for($i=2100; $i>=1900; $i--): ?>
                        <option value=<?= $i ?> selected=<?= $i ?>> <?= $i ?> </option>
                        <?php endfor; ?>
                    </select>
                    <!-- Esto después lo podemos armar con PHP, no lo borré porque posiblemente podríamos utilizarlo para algo más -->
                    <!-- <select name="birthday_year"> -->
                    <!-- <option value="0">Año</option> -->
                    <!--  <option value="1993">1993</option>  -->
                    <!-- </select>-->
                </section>
                <br>
                <div class="texto-white"><h5>Sexo</h5></div>
                <span data-type="radio">
                    <span  class="m-2 texto-white">
                        <input type="radio" name="sex" value="1"><label>Mujer </label>
                    </span>
                    <span  class="m-2 texto-white">
                        <input type="radio" name="sex" value="2"><label>Hombre </label>
                    </span>
                </span>
                <input name="imagen" type="file" />
                <input type="submit" class="btn btn-primary btn-sm">
                <br>
                <br>
                <br>
                <br>

            </div>
        </form>
        <!-- Fin de opciones a elegir -->

    </section>
   
    
    <?php include("footer.php"); ?>

</body>

</html>