
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 04/01/2019
 * Time: 14:43
 */



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        <?php include "css/bootstrap.min.css"; ?>
    </style>

    <style>
        <?php include "Css2.css"; ?>
    </style>


</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <h1 class="navbar-brand" href="#">GlobalNews</h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">


                <?php
                echo '<li><a href = "index.php?action="> Accueil<br></a></li>';
                if (isset($_SESSION['role']) && isset($_SESSION['login'])){
                    echo '<li><a href = "index.php?action=deco"> Deconnexion<br></a></li>';
                    echo '<li><a href = "index.php?action=pageadm"> Administrer<br></a></li>';
                    echo '<li><a href = "index.php?action=geFlux"> Gestion flux<br></a></li>';
                    echo '<li><a href = "index.php?action=chargeRSS"> Charger rss<br></a></li>';
                }
                else  echo '<li><a href = "index.php?action=appelco"> Connexion<br></a></li>';

                ?>

            </ul>
        </div>
    </div>
</nav>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>






</html>