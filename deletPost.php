<?php
//addPost
    session_start();
    require_once("db.php");
    checaLogin();

    $usuarioActual = $_SESSION["usuario"];

    $db = conectarBase(); 
    var_dump($_POST);
    var_dump($_FILES);
   // die();
    if ($_POST):
        $usuarioAcatual = $_SESSION['usuario'];
        $post = $_POST['post'];

        //Eliminar Comentarios
        $sqlstat = "DELETE FROM FROM comentarios WHERE $post = :id_post";
        $query = $db->prepare($sqlstat);
        $query->execute();

        //Eliminar Likes
        $sqlstat = "DELETE FROM FROM likes WHERE $post = :id_post";
        $query = $db->prepare($sqlstat);
        $query->execute();

        //Eliminar Post
        $sqlstat  = "DELETE FROM posts WHERE $post = :id";
        $query = $db->prepare($sqlstat);
        $query->execute();
    endif;

    header('Location: posts.php');
    
    