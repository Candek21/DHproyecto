<?php
    session_start();
    if (!$_COOKIE["logeado"])
        header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenidos a Vulture - F:A:Q</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home - style.css">
</head>

<body>
    <!-- Header containerA -->
    <header id="containerA">
        <div id="Logo" class="bg-white">
            <img class="cls_logo" src="imgs/Logo - Social.png">
        </div>
        <br>
    </header>
    <!-- FIN Header containerA -->

    <!-- containerB - F.A.Q. -->
    <section id="containerB">
        <h3>FAQ</h3>
        <!-- Campos de texto a completar -->
        <div id="Form-text" class="row">
            <div class="col-10">
                <article class="text-justify">
                <h6>Q. ¿Lorem ipsum?</h6>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos consequatur dolores quas commodi ab ratione quam debitis ea, fugit neque, saepe perferendis facilis laborum officia, velit tempora optio sed! Distinctio! <br>
                </article>
                <br>
                <article class="text-justify">
                <h6>Q. ¿Lorem ipsum?</h6>
                    Exercitationem a quos quidem facilis, consectetur modi molestiae asperiores vel deleniti placeat mollitia eius quia soluta pariatur assumenda et nobis incidunt totam debitis? Repudiandae numquam quod maiores iusto voluptate tempora!
                    At accusamus officia quaerat eos, possimus iste dolorum asperiores tempore saepe nulla! Error sit laboriosam sunt illo assumenda, nisi officia labore in nostrum, omnis esse non tempora fugiat, provident itaque?
                </article>
                <br>
                <article class="text-justify">
                <h6>Q. ¿Lorem ipsum?</h6>
                    Obcaecati, veritatis. Labore delectus cumque eaque minima fugiat, fugit quisquam doloremque voluptas mollitia pariatur dignissimos maxime molestiae voluptates quaerat! Facilis reiciendis nemo ipsam voluptatum aut necessitatibus perspiciatis quis cumque ducimus?
                </article>
                <br>
                <article class="text-justify">    
                <h6>Q. ¿Lorem ipsum?</h6>
                    Cupiditate quaerat dicta eum. Possimus ad voluptatibus, commodi accusantium tempore ut perferendis <a href="mailto:support@fisc.com">Support</a> atque corrupti dignissimos molestiae mollitia, laboriosam adipisci incidunt quidem at quaerat porro voluptas cum autem vero quos exercitationem.
                </article>
            </div>
        </div>
        <!-- Fin de FAQ -->
        <br>    
    </section>
    <!-- FIN containerB -->
    
    <?php include("footer.php"); ?>

</body>

</html>