<?php
    session_start();
    require_once("db.php");
    checaLogin();

    $usuarioActual = $_SESSION["usuario"];

    $db = conectarBase(); 

    var_dump($_POST);
    var_dump($_FILES);
    //die();

    if ($_POST):
        $usuarioAcatual = $_SESSION['usuario'];
        $post = $_POST['post'];
        $comm = $_POST['comentario'];
        $sqlstat  = "insert into comentarios set";
        $sqlstat .= " id_usuario = :idUsuario,";
        $sqlstat .= " id_post = :idPost,";
        $sqlstat .= " contenido_c = :comm";

        $query = $db->prepare($sqlstat);
        $query->bindValue(':idUsuario', $usuarioAcatual["id"], PDO::PARAM_INT);
        $query->bindValue(':idPost', $post, PDO::PARAM_INT);
        $query->bindValue(':comm',  $comm, PDO::PARAM_STR);  
        $query->execute();
    endif;

    header('Location: posts.php');
    