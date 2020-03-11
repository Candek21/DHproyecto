<?php
    session_start();
    require_once("db.php");
    checaLogin();

    $db = conectarBase();

    $usuarioActual = $_SESSION["usuario"];

    $sqlstat = "select * from posts where id_usuario = :idUsuario order by id DESC";
    $query = $db->prepare($sqlstat);
    $query->bindValue(':idUsuario', $usuarioActual["id"], PDO::PARAM_STR);
    $query->execute();

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    function getLikes($postID){
        $db = conectarBase();

        $sqlstat = "select * from reacciones";
        $query = $db->prepare($sqlstat);
        $query->execute();

        $likes = $query->fetchAll(PDO::FETCH_ASSOC);

        $toLikes = "";
        foreach($likes as $like):
            //  var_dump($postID);
            $toLikes .= '<a href="dolike.php?id=' .$like['id'] .'&post=' .$postID .'">';
            $toLikes .= '<img src="imgs/reacciones/' .$like['icono'] .'" width="5%">';
            $toLikes .= "</a>";
        endforeach;

        return $toLikes;
    }

    function getComents($postID){
        $db = conectarBase();

        $sqlstat = "SELECT c.*, u.id u_id, u.imagen u_imagen, u.nombre u_nombre FROM comentarios c";
        $sqlstat .= " INNER JOIN usuarios u ON u.id = c.id_usuario";
        $sqlstat .= " WHERE id_post = :postID";
        $query = $db->prepare($sqlstat);
        $query->bindValue(':postID', $postID, PDO::PARAM_INT);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($res);
        return $res;

    }

?>

<!doctype html>
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
        <link rel="stylesheet" href="css/profile - style.css">
        <link rel="stylesheet" href="css/perfil.css">
        <link rel="stylesheet" href="css/nav.css">

        <title>Perfil de Vulture</title>
    </head>
<body id="profile-color">
    
    <header></header>

    <main id="ContainerMain" class="col-md-12 col-lg-8 justify-content-center container p-0">

        <!-- Imagen banner - No esta incluido en la BD -->
        <!-- Tiene una imagen banner incluido en "profile - style.css" y en HTML se le agrega la imagen de perfil -->
        <div id="container-banner" class="col-12">
            <div id="imagen-banner">
                <img class="image-profile" src="imgs/profiles/<?= $usuarioActual["imagen"] ?>" alt="">
            </div>
        </div>

        <!-- El usuario tampoco tiene una descripción de su perfil como la de acá abajo. ¿Agregar? -->
        <div id="container-description" class="color-blue">    
            <div class="color-blue">
                <span ><strong><?= $usuarioActual["nombre"] ?></strong></span>
                <p><span>The cake is a lie</span></p>
            </div>    
        </div>
        <br>

       <!-- Agregar nuevo post -->
       <div class="p-2">
            <!--Descripcion y comentarios-->
            <div class="mt-2 form-group" >
                <form method="POST" action="addpost.php" enctype="multipart/form-data">
                    <textarea class="form-control" placeholder="Ingrese aquí su comentario..." name="texto"></textarea>
                    <div class="custom-file mt-1">
                        <input type="file" class="custom-file-input" id="customFile" name="imagen" accept="image/*">
                        <label class="custom-file-label" for="customFile">Seleccion una imagen</label>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Enviar</button>            
                </form>
            </div>
        </div>

        <div id="user-posts">
            <div class="globalContainer">

                <?php foreach ($posts as $unPost): ?>

                    <!-- Solo mostramos posts del usuario actual -->
                    <?php  if ($unPost["id_usuario"] == $usuarioActual["id"]): ?>
                        <article class="d-flex flex-column">
                                <!-- Comienzo posts -->
                                <!-- Imagen de perfil y nombre de Usuario -->
                                <!-- <div class="d-flex justify-content-start align-items-center"> 
                                    <div class="col-2 p-0"> <a href="#"><img class="border border-white rounded-circle" src="imgs/profiles/profile-example.jpg" alt=""></a> </div>
                                    <div class="p-0"><h5><span> GlaDOS </span></h5></div>                        
                                </div> -->
                                
                                <!--Datos creador-->
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="col-2 p-0"> <a href="#"><img class="border border-white rounded-circle" src="imgs/profiles/<?= $usuarioActual["imagen"] ?>" alt=""></a> </div>
                                <div class="p-0"><span ><strong><?= $usuarioActual["nombre"] ?></strong></span></div>
                            </div>

                            <!-- Imagen post - Descripcion post - Comentarios Post -->
                            <div class="col-12 p-0">
                                <div class="img-pub">
                                    <?php if ($unPost['contenido_p']): ?>
                                        <img src="imgs/posts/<?= $unPost["contenido_p"] ?>" width=100%>
                                    <?php endif; ?>
                                </div>
                                    
                                <div class="mt-2">
                                    <p class="text-pub"><?= $unPost["descripcion"] ?></p>
                                    <hr>
                                    <?= getLikes($unPost["id"]) ?>
                                    <hr>
                                </div>

                                <form method="POST" action="addcomment.php" enctype="multipart/form-data">
                                    <div class="mt-2 mx-0 form-group row align-top">
                                        <input type="hidden" name="post" value="<?= $unPost["id"] ?>">
                                        <textarea  class="form-control col-10 mr-0 h-2" rows="1" placeholder="Ingrese aquí su comentario..." name="comentario"></textarea>
                                        <button class="btn btn-sm btn-primary mt-0 ml-3" type="submit">Enviar</button>
                                    </div>
                                </form>    

                            <!-- Inicio comentarios -->
                                <div class="comments">
                                    <?php foreach(getComents($unPost["id"]) as $coment): ?>
                                        <?php if($coment['contenido_c'] != ''): ?>
                                            <div class="p-2 mx-2 mb-1 rounded" style="border: 1px solid gray">
                                                <img class="rounded-circle mb-1 mr-2" src="imgs/profiles/<?= $coment["u_imagen"] ?>" width="7%" alt="<?= $coment['u_nombre']?>" title="<?= $coment['u_nombre']?>" >
                                                <?= $coment["contenido_c"] ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                        <!-- </div> -->
                        </article>
                        <!-- Final posts -->

                            <!-- Boton para eliminar Post -->
                            <?php ?>
                                <form method="POST" action="deletPost.php" enctype="multipart/form-data">
                                    <input type="hidden" name="post" value="<?= $unPost["id"] ?>">
                                    <button class="btn btn-primary mt-2" type="submit">Eliminar Post</button>
                                </form>
                            <?php ?>
                            <!-- Fin boton para eliminar Post -->
                    <?php endif;?>   

                <?php endforeach;?>
            </div>
        </div>

        <br>
        <br>
    </main>

    <?php include("footer.php"); ?>
    
    </body>
</html>