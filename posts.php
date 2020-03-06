<?php
    session_start();
    if (isset($_COOKIE["logeado"]) && $_COOKIE["logeado"])
        header('Location: index.php');
    else{
        setcookie("email", "", -1);
        setcookie("contrasenia", "",-1);
        setcookie("logeado", false);
    }

    function conectarBase(){

        // $dsn = 'mysql:host=127.0.0.1;dbname=buitre_db;port3306';
        $dsn = 'mysql:host=190.210.222.204;dbname=buitre_db;port3306';
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

    function deletPost($idPost){
        $db = conectarBase();
        
        if(isset($_POST['eliminar'])){
            $consulta = 'DELETE posts FROM  WHERE :id = $idPost';
            $query = $db -> prepare($consulta);
            $sql->execute();
        }
        
    }
   
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio</title>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Css local-->
        <link rel="stylesheet" href="css/post.css">
        <link rel="stylesheet" href="css/home - style.css">
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
                    <?php for($i=0;$i<20;$i++):?>
                    <article class="BCwhite shadow mt-3 rounded-top">
                        <!--Datos creador-->
                        <div class="pt-2 pl-2">
                            <img class="rounded-circle"src="imgs/usuario.png" width=13%>
                            Nombre de usuario
                        </div>
                        <!--Publicacion-->
                        <div class="p-2">
                            <!--Contenido de la publicacion ejemplo imagen-->
                            <img src="imgs/paisaje.jpg" width=100%>
                            <!--Descripcion y comentarios-->
                            <div class="mt-2">
                                <p>Descripcion de esta publicacion podemos ver un poaisaje bonito</p>
                                <ul>
                                    <li>Comentario random 1</li>
                                    <li>Comentario random 1</li>
                                    <li>Comentario random 1</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <?php endfor;?>
                    <!--Fin publicacion-->
                </div>
                 
            </section>
            <div class="col-md-3 "></div>
           <!-- <div class="col-md-4 "></div>-->
        </div>

        <?php include("footer.php"); ?>

    </body>


</html>