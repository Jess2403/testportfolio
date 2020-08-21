<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: ./");
    exit();
}

?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navbar_deconnect1.css">
    <link rel="stylesheet" type="text/css" href="css/accueil_admin.css">
    <title>Accueil - Admin</title>
    <style>
    </style>

</head>
<body>
<?php
include "php/admin/navbar_deconnect1.php";
?>
<video src="img/smoke1.mp4" autoplay muted></video>
<section id="video">
    <h1>
        <span>P</span>
        <span>o</span>
        <span>r</span>
        <span>t</span>
        <span>f</span>
        <span>o</span>
        <span>l</span>
        <span>i</span>
        <span>o</span>
        <span> </span>
        <span>A</span>
        <span>c</span>
        <span>c</span>
        <span>u</span>
        <span>e</span>
        <span>i</span>
        <span>l</span>
        <span> </span>
        <span>d</span>
        <span>e</span>
        <span> </span>
        <span>l</span>
        <span>'</span>
        <span>a</span>
        <span>d</span>
        <span>m</span>
        <span>i</span>
        <span>n</span>
        <span>i</span>
        <span>s</span>
        <span>t</span>
        <span>r</span>
        <span>a</span>
        <span>t</span>
        <span>i</span>
        <span>o</span>
        <span>n</span>
    </h1>
    <div class="div1">
        <h2>Bienvenue <?=$_SESSION['login']?></h2>
        <h3>Bienvenue sur mon site portfolio</h3>
        <p>Vous pouvez, à présent, manipuler les liens et images de ma présentation.</p>
    </div>
</section>
<footer>
    <p class="liens" >
        <a href="?p=myadmin">Précédant</a>/
        <a href="?p=presadmin">Suivant</a></p><br>
    <br>
    <hr>
    <p class="footer">Copyright &copy; CF2M 2020</p>
</footer>
<?php
// chemin depuis index.php (CF frontal)
include "./php/javascript.php";

?>
<!--<script>
    function loop() {
        var video = HTMLMediaElement.loop("video");
        video.loop=true;
        video.loop();
    }
</script>-->
<!--<script>
    function repeat() {
        var video = document.getElementById("video");
// Code for Chrome, Safari and Opera
        video.addEventListener("webkitAnimationIteration", repeatFunction);

// Standard syntax
        video.addEventListener("animationiteration", repeatFunction);
        var span = document.getElementById("video");
    }
    repeat;

    </script>-->
</body>
</html>
