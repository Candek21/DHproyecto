<?php
session_start();
    if (!$_COOKIE["logeado"])
        header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/home - style.css">
    <link rel="stylesheet" href="css/friends - style.css">

    <title>Amigos de Vulture</title>

</head>

<body> 
    <div class="container ContainerA col-md-12 col-lg-8 p-0">
        <!-- Header-->
        <header>
            <div id="Logo" class="bg-white">
                <img class="cls_logo" src="imgs/Logo - Social.png">
            </div>
            <br>
        </header>
        <!-- FIN Header containerA -->

        <!-- containerB - F.A.Q. -->
        <main>
        <h1>Amigos</h1>
        <br>
        <!-- Contenedor de amigos -->
        <div class="d-flex flex-row flex-wrap col-md-12 container col-lg-12 justify-content-center">
            <!-- Divs para cada amigo -->
            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 1</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 2</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 3</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 4</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 5</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 6</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 7</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 8</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 9</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 10</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 11</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 12</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 13</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>

            <div class="d-flex flex-row friend d-flex align-items-center m-2 p-1 col-12 col-md-5">
                <div class="col-3"> <a href="perfil-amigo.php"><img class="border border-white rounded-circle image-friend" src="imgs/Friend.png" alt=""></a> </div>
                <div class="col-9">
                <span><a href="perfil-amigo.php">Amigo 14</a></span>
                <p>Descripcion amigo</p> <!-- Lo que pone cada usuario en su perfil -->
                </div>
            </div>
            <!-- Fin divs para cada amigo -->
        </div>
        <!-- Fin contenedor de amigos -->
        <br>
        <br>
        </main>
    <!-- FIN containerB -->
    </div>
    
    <?php include("footer.php"); ?>

</body>

</html>