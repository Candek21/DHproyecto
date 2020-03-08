<?php
    session_start();
    require_once("db.php");
    checaLogin();
    
    $usuarioActual = $_SESSION["usuario"];

