<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Présentation</title>

    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/navbar_connect1.css">
    <link rel="stylesheet" href="css/presentation.css">
    <script type="text/javascript" src="javascript/swiper.min.js"></script>
</head>
<body>
<?php
    include "php/navbar_connect1.php";
?>
<section>
<div class="titre">
    <h1>Bienvenue dans l'univers du web-developpement</h1>
    <h1 id="h1">Portfolio 2020</h1>
</div>
<h2>Pour l'emploi:</h2>
<div class="descr1">
    <h3>Je me présente.</h3>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url(img/présentation1redim.jpg); width:500px;"></div>
        <div class="swiper-slide" style="background-image:url(img/presentation2redim.jpg); width:500px;"></div>
        <div class="swiper-slide" style="background-image:url(img/presentation3redim.jpg); width:500px;"></div>
        <div class="swiper-slide" style="background-image:url(img/presentation4redim.jpg); width:500px;"></div>
    </div>
</div>
<h2>Dans la vie j'aime aussi:</h2>
    <div class="descr2">
        <h3>Mon fils, mes amis, le darts et le karaoke.</h3>
    </div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url(img/mondoudouredim.jpg);height:500px;"></div>
        <div class="swiper-slide" style="background-image:url(img/misterselfieredim.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(img/mameilleureredim.jpg); height:480px;"></div>
        <div class="swiper-slide" style="background-image:url(img/feteentreamisredim.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(img/repasentreamisredim.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(img/audartsredim.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(img/aukaraokeredim.jpg)"></div>
    </div>
</div>
<h2>La cuisine:</h2>
<div class="descr2">
    <h3>MMM... Les bons petits plats fait maison.</h3>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url(img/cuisinièreredim.jpg);height:500px;"></div>
        <div class="swiper-slide" style="background-image:url(img/saumonbellevueredim.jpg)/*; width: 80vw; height: 105vh*/"></div>
        <div class="swiper-slide" style="background-image:url(img/noixdestjacquesentroisfaçonredim.jpg)/*; width: 80vw; height: 105vh*/"></div>
        <div class="swiper-slide" style="background-image:url(img/gibierredim.jpg);height:480px;"></div>
        <div class="swiper-slide" style="background-image:url(img/brochetteredim.jpg)"></div>
    </div>
</div>
<h2 id="h2">Et le plus important...! Ce pourquoi je fais cette formation:</h2>
<img class="img" src="img/fondlogo.png"/>
</section>
<footer>
    <p class="liens" >
        <a href="?p=home ">Précédant</a>/
        <a href="?p=Tutos">Suivant</a></p><br>
    <br>
    <hr>
    <p class="footer">Copyright &copy; CF2M 2020</p>
</footer>
<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
</body>
</html>