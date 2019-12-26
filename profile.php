<?php
    session_start();
    if (!$_COOKIE["logeado"])
        header('Location: index.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/profile - style.css">
        <link rel="stylesheet" href="css/perfil.css">
        <link rel="stylesheet" href="css/nav.css">

        <title>Perfil de Vulture</title>
    </head>
<body id="profile-color">
    
    <header></header>

    <main id="ContainerMain" class="col-md-12 col-lg-8 justify-content-center container p-0">

        <div id="container-banner" class="col-12">
            <div id="imagen-banner">
                <img class="image-profile" src="imgs/profile-example.jpg" alt="">
            </div>
        </div>
        <div id="container-description" class="color-blue">    
            <div class="color-blue">
                <h5>GlaDOS</h5>
                <p><span>The cake is a lie</span></p>
            </div>    
        </div>
        <br>
       
        <div id="user-posts">
            <div class="globalContainer">

            <?php 
                $directory="imgs-posts";
                $dirint = dir($directory);

                while (($archivo = $dirint->read()) !== false): 
                    $extension = pathinfo ($archivo, PATHINFO_EXTENSION);
                    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png"): ?>

                    <article class="d-flex flex-column">

                        <div class="d-flex justify-content-start align-items-center"> 
                            <div class="col-2 p-0"> <a href="#"><img class="border border-white rounded-circle" src="imgs/profile-example.jpg" alt=""></a> </div>
                            <div class="p-0"><h5><span> GlaDOS </span></h5></div>                        
                        </div>
                        
                        <div class="col-12 p-0">
                            <div class="img-pub">
                                <?php echo '<img src="'.$directory."/".$archivo.'">'; ?>
                            </div>
                            <p class="text-pub"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum asperiores pariatur iste molestiae tenetur repudiandae, illum non, vero recusandae ex ullam veritatis similique consequatur rerum officiis eveniet? Quae, eveniet quod. </p>
                            <div class="comments">
                                <ul>
                                    <li class="d-flex flex-row align-items-center"> 
                                    <div class="col-2 p-0 m-1"><img class="border rounded-circle img-profile-post" src="imgs/profile-comments-example-1.jpg" alt=""></div> 
                                    <div> Comentario random 1 </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center"> 
                                    <div class="col-2 p-0 m-1"><img class="border rounded-circle img-profile-post" src="imgs/profile-comments-example-2.jpg" alt=""></div> 
                                    <div> Comentario random 1 </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center"> 
                                    <div class="col-2 p-0 m-1"><img class="border rounded-circle img-profile-post" src="imgs/profile-comments-example-3.jpg" alt=""></div> 
                                    <div> Comentario random 1 </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                </article>
                    <?php endif; 
                    endwhile; 
                    $dirint->close();?>

            </div>
        </div>

        <br>
        <br>
    </main>

    <?php include("footer.php"); ?>
    
    </body>
</html>