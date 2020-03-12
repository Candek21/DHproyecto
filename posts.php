<?php
    session_start();
    require_once("db.php");
    checaLogin();

    $db = conectarBase();
    
    $usuarioActual = $_SESSION["usuario"];
    
    $sqlstat = "select posts.*, u.id u_id, u.imagen u_imagen, u.nombre u_nombre from posts";
    
    $sqlstat .= " INNER JOIN usuarios u ON u.id = posts.id_usuario  WHERE eliminado = 0 order by id DESC";
    $query = $db->prepare($sqlstat);
    //$query->bindValue(':idUsuario', $usuarioActual["id"], PDO::PARAM_STR);
    $query->execute();

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    function getLikes($postID){
        $db = conectarBase();

        $sqlstat = "select * from t_reacciones";
        $query = $db->prepare($sqlstat);
        $query->execute();

        $likes = $query->fetchAll(PDO::FETCH_ASSOC);

        $toLikes = "";
        foreach($likes as $like):
            //  var_dump($postID);
            $toLikes .= '<a href="dolike.php?id=' .$like['id'] .'&post=' .$postID .'">';
            $toLikes .= '<img src="imgs/reacciones/' .$like['icono'] .'" width="15%">';
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

    function postPropio($unPost){
        $usuarioActual = $_SESSION["usuario"];
        $db = conectarBase();
        $sqlstat = "SELECT id_usuario FROM posts WHERE id = :postID";
        $query = $db->prepare($sqlstat);
        
        $query->bindValue(':postID', $unPost["id"], PDO::PARAM_INT);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if($res[0]["id_usuario"]==$usuarioActual["id"])
            return "Eliminar";

    }
    // var_dump($posts);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="ES">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio</title>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Css local-->
        <link rel="stylesheet" href="css/home - style.css">
        <link rel="stylesheet" href="css/post.css">
        <!--Iconos-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="row">
           
            <div class="col-md-2"></div>
            
            <div class="col-md-7  row pl-0 ">
                 <!--Columna extra-->
                 <div class="col-md-4 mt-3 ocultar">
                     <div class="p-3 BCwhite shadow rounded-top fijoC overflow-auto overflow-auto d-flex flex-column align-items-center ">
                            <ul class="pl-0 pt-3">
                                <li>asd</li>
                                <li>asd</li>
                            </ul>                        
                     </div>
                 </div>
                 <!--Columna publicaciones-->
                 <section class="col-md-8  d-flex flex-column centrar">
                    <!--Caja publicacion-->

                    <article class="BCwhite shadow mt-3 rounded-top">
                        <!--Datos creador-->
                        <div class="p-2 pl-2 row">
                            <div class="col-2">
                                <img class="rounded-circle mb-1 mr-2"src="imgs/profiles/<?= $usuarioActual["imagen"] ?>" width=100%>
                            </div>
                            <div class="col-10">
                                <strong><?= $usuarioActual["nombre"] ?></strong><br>
                                sarasa
                            </div>
                        </div>
                        <!--Publicacion-->
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
                    </article>
                    <?php foreach ($posts as $unPost): ?>
                    <article class="BCwhite shadow mt-3 rounded-top">
                        <!--Datos creador-->
                        <div class="p-2 pl-2 row">
                            <div class="col-2">
                                <img class="rounded-circle mb-1 mr-2"src="imgs/profiles/<?= $unPost["u_imagen"] ?>" width=100%>
                            </div>
                            <div class="col-10">
                                <strong><?= $unPost["u_nombre"] ?></strong><br>
                                sarasa
                            </div>
                        </div>

                        <!--Publicacion-->
                        <div class="p-2">
                            <!--Contenido de la publicacion ejemplo imagen-->
                            <?php if ($unPost['contenido_p']): ?>
                                <img src="imgs/posts/<?= $unPost["contenido_p"] ?>" width=100%>
                            <?php endif; ?>
                            <!--Descripcion y comentarios-->
                            <div class="mt-2 ">
                                <p><?= $unPost["descripcion"] ?></p>
                                <hr>
                                <span class="d-flex justify-content-between">
                                    <span>
                                      <?= getLikes($unPost["id"]) ?>
                                    </span>&nbsp;&nbsp;
                                    <?php if($unPost["u_id"] == $usuarioActual["id"]):  ?>
                                    <span>
                                    <a class="btn btn-xs btn-primary py-0 px-2" data-toggle="collapse" href="#multiCollapseExample1<?= $unPost['id']; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1<?= $unPost['id']; ?>">Eliminar</a>
                                    &nbsp;&nbsp;
                                    </span>
                                    <?php endif; ?>
                                </span>
                                <?php if($unPost["u_id"] == $usuarioActual["id"]):  ?>
                                <div class="collapse multi-collapse" id="multiCollapseExample1<?= $unPost['id']; ?>">
                                            <br>
                                            <span>Eliminar este post?</span>
                                            <a class="btn btn-xs btn-primary py-0 px-2" href="eliminar.php?post=<?= $unPost["id"]; ?>" role="button">Si</a>
                                            <a class="btn btn-xs btn-primary py-0 px-2" data-toggle="collapse" href="#multiCollapseExample1<?= $unPost['id']; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1<?= $unPost['id']; ?>">No</a>
                                        </div>
                                <?php endif; ?>
                                <hr>
                                
                             </div>
                            <form method="POST" action="addcomment.php" enctype="multipart/form-data">
                                <div class="mt-2 mx-0 form-group row align-top">
                                        <input type="hidden" name="post" value="<?= $unPost["id"] ?>">
                                        <textarea  class="form-control col-10 mr-0 h-2 py-0" rows="1" placeholder="Ingrese aquí su comentario..." name="comentario"></textarea>
                                        <button class="btn btn-primary mt-0 ml-2 py-0" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <!-- Comienzo Comentarios -->
                        <?php foreach(getComents($unPost["id"]) as $coment): ?>
                            <?php if($coment['contenido_c'] != ''): ?>
                                <div class="p-2 mx-2 mb-1 rounded" style="border: 1px solid gray">
                                <img class="rounded-circle mb-1 mr-2" src="imgs/profiles/<?= $coment["u_imagen"] ?>" width="7%" alt="<?= $coment['u_nombre']?>" title="<?= $coment['u_nombre']?>" >
                                    <?= $coment["contenido_c"] ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!-- Fin Comentarios -->
                        </article>
                    <?php endforeach;?>
                    <!--Fin publicacion-->
                </div>
                 
            </section>
            <div class="col-md-3 "></div>
           <!-- <div class="col-md-4 "></div>-->
        </div>

        <?php include("footer.php"); ?>

    </body>


</html>