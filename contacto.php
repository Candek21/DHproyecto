<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenidos a Fisc</title>
    <link rel="stylesheet" href="css/home - style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header containerA -->

    <header casls="containerA">

        <div id="Logo">
            <img class="cls_logo" src="imgs/Logo - Social.png">
        </div>
    </header>

    <article>
        <form>
            <!-- div que contiene nuestro formulario de inicio de sesión -->
            <div id="Login" class="row">

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInput">Email</label>
                    <input type="email" class="form-control form-control-sm mb-2" id="inlineFormInput" placeholder="Email">
                </div>

                <div class="col-10">
                    <label class="sr-only" for="inlineFormInputGroup">Contraseña</label>
                    <input type="text-area" class="form-control form-control-sm mb-2" id="inlineFormInputGroup" placeholder="Contraseña">
                </div>

                <div class="col-10">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">Remember me</label>
                    </div>
                </div>

                <div class="col-8">
                    <button type="submit" class="btn btn-primary btn-sm mb-2">Iniciar</button>
                </div>

            </div>
            <!-- Fin del formulario de inicio de sesión -->
        </form>
    </article>

    <!-- FIN Header containerA -->

    <!-- containerB - Formulario de registro -->
    <div id="containerB">

        <h1>Registro</h1>
        <!-- Campos de texto a completar -->
        <div id="Form-text" class="row">
            <div class="col-10"><input class="form-control form-control-sm" type="text" name="firstname" value="" placeholder="Nombre"></div>
            <div class="col-10"><input class="form-control form-control-sm" type="text" name="lastname" value="" placeholder="Apellido"></div>
            <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email" value="" placeholder="Correo electrónico"></div>
            <div class="col-10"><input class="form-control form-control-sm" type="email" name="reg_email_confirmation" value="" placeholder="Confirmar correo electrónico"></div>
            <div class="col-10"><input class="form-control form-control-sm" type="password" name="reg_passwd" placeholder="Contraseña nueva"></div>
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
                <select name="birthday_day">
                    <option value="0">Día</option>
                    <option value="18">18</option>
                </select>
                <select name="birthday_month">
                    <option value="11" selected="1">Nov</option>
                    <option value="12" selected="1">Dec</option>
                </select>
                <select name="birthday_year">
                    <option value="0">Año</option>
                    <option value="2019">1993</option>
                </select>
            </div>

            <div>Sexo</div>
            <span data-type="radio">
                <span>
                    <input type="radio" name="sex" value="1"><label>Mujer</label>
                </span>
                <span>
                    <input type="radio" name="sex" value="2"><label>Hombre</label>
                </span>
                <span>
                    <input type="radio" name="sex" value="3"><label>Personalizado</label>
                </span>
            </span>

            <div><button type="button" class="btn btn-primary btn-sm">Registrarme</button></div>

        </div>
        <!-- Fin de opciones a elegir -->

    </div>
    <!-- FIN containerB -->
    <?php include("footer.html"); ?>

</body>

</html>