<?php
    session_start();
    require_once("db.php");
    checaLogin();

    $usuarioActual = $_SESSION["usuario"];

    $db = conectarBase(); 

    //var_dump($_POST);
    //var_dump($_GET);
    //var_dump($_FILES);
    //die();

    if ($_GET):
        $usuarioAcatual = $_SESSION['usuario'];
        $post = $_GET['post'];
        $like = $_GET['likeid'];

        $sqlstat = "select coalesce(likes.id_reaccion,0) AS idR, count(*) as cant from likes where
                    id_usuario = :idUsuario
                    and id_post = :idPost";

        $query = $db->prepare($sqlstat);
        $query->bindValue(':idUsuario', $usuarioAcatual["id"], PDO::PARAM_INT);
        $query->bindValue(':idPost', $post, PDO::PARAM_INT);
        $query->execute();
        $verif = $query->fetch(PDO::FETCH_ASSOC);

        if($verif["cant"]== 0):
        $sqlstat  = "insert into likes set
                    id_usuario = :idUsuario,
                    id_post = :idPost,
                    id_reaccion = :idLike";
        else:
        $sqlstat  = "update likes set
                    id_reaccion = :idLike
                    where id_usuario = :idUsuario
                    and id_post = :idPost";
        endif;

        $query = $db->prepare($sqlstat);
        $query->bindValue(':idUsuario', $usuarioAcatual["id"], PDO::PARAM_INT);
        $query->bindValue(':idPost', $post, PDO::PARAM_INT);
        if ($verif["idR"] != $like):
            $query->bindValue(':idLike',  $like, PDO::PARAM_INT); 
        else:            
            $query->bindValue(':idLike',  0, PDO::PARAM_INT); 
        endif;
        $query->execute();
    endif;

    header('Location: posts.php');
    