<?php
    require_once("db.php");
    $db = conectarBase();

    $sqlstat = "UPDATE posts SET eliminado = 1 WHERE id = :postID;";
    $query = $db->prepare($sqlstat);
    $query->bindValue(':postID', $_GET["post"], PDO::PARAM_INT);
    $query->execute();
    header('Location: posts.php');
?>