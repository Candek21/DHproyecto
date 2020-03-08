<?php
    session_start();
    require_once("db.php");
    checaLogin();

    $usuarioActual = $_SESSION["usuario"];

    $db = conectarBase();

    if ($_POST):
        $usuarioAcatual = $_SESSION['usuario'];
        $sqlstat  = "insert into posts set";
        $sqlstat .= " id_usuario = :idUsuario,";
        $sqlstat .= " contenido_p = :imagen,";
        $sqlstat .= " descripcion = :texto";

        $query = $db->prepare($sqlstat);
        $query->bindValue(':idUsuario', $usuarioAcatual["id"], PDO::PARAM_STR);
        $query->bindValue(':texto',  $_POST["texto"], PDO::PARAM_STR);
        $ext = pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $archi = uniqid().".".$ext;
        move_uploaded_file($_FILES["imagen"]["tmp_name"],"imgs/posts/".$archi);

        $query->bindValue(':imagen',$archi, PDO::PARAM_STR);
        $query->execute();
    endif;

    header('Location: posts.php');
    