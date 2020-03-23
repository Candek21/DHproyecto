<?php
    function conectarBase(){

        // $dsn = 'mysql:host=127.0.0.1;dbname=buitre_db;port3306';
        // si no funciona con infosir.no-ip.org usar 190.195.133.61
        //$dsn = 'mysql:host=infosir.no-ip.org;dbname=buitre_db;port3306';
        //$db_usr ='buitre';

        $dsn = 'mysql:host=infosir.com.ar;dbname=infosir_buitredb;port3306';
        $db_usr ='infosir_buitre';

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