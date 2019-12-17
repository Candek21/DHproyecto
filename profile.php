<?php
    session_start();
    if (!$_COOKIE["logeado"])
        header('Location: index.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <!-- CSS -->
    <link rel="stylesheet" href="css/profile - style.css">
    <link rel="stylesheet" href="css/nav.css">

    <title>Fisc</title>
  </head>
  <body>
    
    <header></header>

    <main>

        <div id="container-banner" class="col-12 row">
            <img class="image-profile" src="imgs/profile-example.jpg" alt="">
        </div>

        <div id="container-description">    
            <div>
                <h5>GlaDOS</h5>
                <p>The cake is a lie</p>
            </div>    
        </div>
        <br>
        <div id="user-posts">
            <div class=globalContainer>
                <article>
                    <div class="img-pub"><img src="./imgs/article-1.jpg" alt=""></div>
                    <p class="text-pub"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum asperiores pariatur iste molestiae tenetur repudiandae, illum non, vero recusandae ex ullam veritatis similique consequatur rerum officiis eveniet? Quae, eveniet quod. </p>
                </article>
                <article>
                    <div class="img-pub"><img src="./imgs/article-2.jpg" alt=""></div>
                    <p class="text-pub"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam harum similique voluptas ullam eligendi, ab nihil exercitationem dolore odio tenetur, deserunt quia. Incidunt quo necessitatibus ab ullam? Nobis, similique officia! </p>
                </article>
                <article>
                    <div class="img-pub"><img src="./imgs/article-3.jpg" alt=""></div>
                    <p class="text-pub"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique sapiente doloribus labore amet corrupti ullam pariatur reprehenderit voluptatum fugiat expedita tempora modi rem dignissimos tenetur temporibus nemo, architecto sit! Rem. </p>
                </article>
                <article>
                    <div class="img-pub"><img src="./imgs/article-4.jpg" alt=""></div>
                    <p class="text-pub"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat ullam ut magni minima praesentium explicabo quas, laudantium, officiis facilis deleniti similique quae, cumque excepturi aspernatur alias libero architecto. Rem, eligendi? </p>
                </article>       
            </div>
        </div>

    </main>

    <?php include("footer.php"); ?>
    
    </body>
</html>