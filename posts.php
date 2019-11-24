


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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Iconos-->
        <link rel="stylesheet" href="css/posts.css">

    </head>

  

    <body>
        <header class=" p-0 BCwhite shadow fijo">
            <div class="row ">
                <div class="col-md-2"></div>
                    
                <div class="col-md-7 pl-0 row ">
                    <div class="col-md-4 pl-2 pt-1">
                    <a href="#"><img src="imgs/Logo - Social.png" width=65px></a>
                    </div>
                    <div class="col-md-8  pt-1 ">
                        
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <div class="d-flex">
                        <div><a class="fa fa-user Fblack Fsize48 pr-3" href="#"></a></div>
                        <div><a class="fa fa-sign-out Fblack Fsize48 pr-3" href="#"></a></div>
                        
        
                       
                    </div>
                </div>
            </div>
        </header>
        <div class="row">
           
            <div class="col-md-2"></div>
            
            <div class="col-md-7  row pl-0 ">
                 <!--Columna extra-->
                 <div class="col-md-4 mt-3 separacion10">
                     <div class="p-3 BCwhite shadow rounded-top fijoC overflow-auto overflow-auto d-flex flex-column align-items-center">
                        <h3>Amigos</h3>
                            <ul class="pl-0 pt-3">
                                <li>asd</li>
                                <li>asd</li>
                            </ul>

                        
                     </div>
                 </div>
                 <!--Columna publicaciones-->
                 <div class="col-md-8  d-flex flex-column separacion10">
                    <!--Caja publicacion-->
                    <?php for($i=0;$i<20;$i++):?>
                    <div class="BCwhite shadow mt-3 rounded-top">
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
                    </div>
                    <?php endfor;?>
                    <!--Fin publicacion-->
                </div>
                 
            </div>
            <div class="col-md-3 "></div>
           <!-- <div class="col-md-4 "></div>-->
        </div>
    </body>


</html>