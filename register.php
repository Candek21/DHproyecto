<?php
    session_start();
    if (isset($_COOKIE["logeado"]) && $_COOKIE["logeado"])
        header('Location: posts.php');
    else{
        setcookie("email", "", -1);
        setcookie("contrasenia", "",-1);
        setcookie("logeado", false);
    }

    function validate(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        $errores = [];
        if($_POST["sex"] == NULL)
            array_push($errores, "Indique su sexo");
        if($_FILES["imagen"]["error"] != UPLOAD_ERR_OK){
            array_push($errores, "error al subir la imagen  ");
        }
        if(in_array($_POST["reg_email"] , array_column($usA,"reg_email"))){
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
    function getId(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        if(count($usA)){
            return end($usA)['id'] + 1;
        } else {
            return 1;
        }
    }
    function registrar(){
        $usF = file_get_contents("usuarios.json");
        $usA = json_decode($usF, true);
        $temp = [];
        $temp['id'] = getId();
        $temp["firstname"] = $_POST["firstname"];
        $temp["reg_email"] = $_POST["reg_email"];
        $temp["reg_passwd"] = password_hash($_POST["reg_passwd"], PASSWORD_DEFAULT);
        $temp["fecha_nacimineto"] = $_POST["birthday_day"] . $_POST["birthday_month"]. $_POST["birthday_year"]; 
        $temp["sex"] = $_POST["sex"];
        $ext = pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $temp["imagen"] = uniqid().".".$ext;
        move_uploaded_file($_FILES["imagen"]["tmp_name"],"img/".$temp["imagen"]);
        
        array_push($usA, $temp);
        $usF = json_encode($usA);
        file_put_contents("usuarios.json", $usF);

    }


    if($_POST){
        $errores = validate();
        if(count($errores)==0){
            registrar();
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

        <div id="Logo" class="bg-white">
            <img class="cls_logo" src="imgs/Logo - Social.png">
        </div>
        
    </header>
    <!-- FIN Header containerA -->

    <!-- containerB - Formulario de registro -->
    <section id="containerB" class="container">

        <h3>Registro</h3>
        <?php if($_POST):?>
            <?php if(count($errores)==0):?>
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
                        <option value="0" selected="1">Día</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="birthday_month" class="texto-white" style="height: 1.6em">
                        <!-- Esto después lo podemos armar con PHP -->
                        <option value="1" selected="1">Ene</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Abr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Ago</option> 
                        <option value="9">Sep</option> 
                        <option value="10">Oct</option> 
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>        
                    </select>
                    <!-- Esto después lo podemos armar con PHP -->
                    <input name = "birthday_year" type="number" class="texto-white" style="height: 1.6em" min="1900" max="2001" step="1" value="2001"/>

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