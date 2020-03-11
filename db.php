<?php
    function conectarBase(){

        $dsn = 'mysql:host=localhost;dbname=buitre_db;port3306';
        //$dsn = 'mysql:host=190.210.222.204;dbname=buitre_db;port3306';
        $db_usr ='buitre';
        $db_pass = 'cancrinachja';

        try{
            $db=new PDO($dsn,$db_usr, $db_pass);
            
        }catch(PDOException $exeption){
            echo $exeption->getMessage();
            return null;
        }
        return $db;    
        
    }  

    function checaLogin(){
        if (!$_COOKIE["logeado"]):
            header('Location: index.php');
        endif;
    
        if (!isset($_SESSION["usuario"])):
            die("no se envio el usuario.");
        endif;
    
    
    }