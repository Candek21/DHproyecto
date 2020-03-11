<?php
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
        $sqlstat  = "INSERT INTO posts SET";
        $sqlstat .= " id_usuario = :idUsuario,";
        $sqlstat .= " contenido_p = :imagen,";
        $sqlstat .= " descripcion = :texto";

        $query = $db->prepare($sqlstat);
        $query->bindValue(':idUsuario', $usuarioAcatual["id"], PDO::PARAM_INT);
        $query->bindValue(':texto',  $_POST["texto"], PDO::PARAM_STR);  

        if ($_FILES["imagen"]["name"] != ""):
            $ext = pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
            $archi = uniqid().".".$ext;
            move_uploaded_file($_FILES["imagen"]["tmp_name"],"imgs/posts/".$archi);
            $query->bindValue(':imagen',$archi, PDO::PARAM_STR);
        else:
            $query->bindValue(':imagen','', PDO::PARAM_STR);
        endif;
        $query->execute();
    endif;

    header('Location: posts.php');
    