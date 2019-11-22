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
    <div id="containerB">

        <h3>Registro</h3>
        <!-- Campos de texto a completar -->
        <div id="Form-text" class="row">
            <div class="col-10"><input class="form-control form-control-sm" type="text" name="firstname" value="" placeholder="Nombre o Usuario"></div>
            <!-- Supuse que eso podría personalizarse después, una vez que se tiene una cuenta -->
            <!--<div class="col-10"><input class="form-control form-control-sm" type="text" name="lastname" value="" placeholder="Apellido"></div> -->
            <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email" value="" placeholder="Email"></div>
            <!-- En otros lugares ya no lo ponen más porque, por más que haya confirmación, si se ingresa mal el mail dos veces, sigue estando mal -->
            <!--  <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email_confirmation" value="" placeholder="Confirmar correo electrónico"></div> -->
            <div class="col-10"><input class="form-control form-control-sm" type="password" name="reg_passwd" placeholder="Contraseña"></div>
            <div class="col-10"><input class="form-control form-control-sm" type="password" name="reg_passwd" placeholder="Confirmar contraseña"></div>
        </div>
        <!-- Fin de campos de texto -->
        <br>
        <!-- Opciones a elegir -->
        <div id="Form-option">

            <div>
                <h5>Fecha de nacimiento</h5>
            </div>
            <div id="containerC" class="">
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
            </div>
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
            <div><button type="button" class="btn btn-primary btn-sm">Registrarme</button></div>
            <br>

        </div>
        <!-- Fin de opciones a elegir -->

    </div>
    <!-- FIN containerB -->
    <br><br><br>
    <br><br><br>

    <?php include("footer.html"); ?>

</body>

</html>