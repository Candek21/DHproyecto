<?php
    session_start();
    if (!$_COOKIE["logeado"])
        header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home - style.css">
    <title>Contacto de Vulture</title>
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
                    <textarea name="mensaje" class="form-control form-control-sm mb-2" id="consulta" placeholder="Ingrese aqui su consulta!" rows="5"></textarea>
                </div>

                 <div class="col-8">
                    <button type="submit" class="btn btn-primary btn-sm mb-2">Enviar</button>
                </div>

            </div>
            <!-- Fin del formulario de inicio de sesión -->
        </form>
    </article>

    <!-- FIN Header containerA -->


    <?php include("footer.php"); ?>

</body>

</html>