<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutos</title>
    <link rel="stylesheet" href="css/Tutos.css">
</head>
<body>
<?php
    include "php/navbar_connect.php"
?>
<div class="div1">
    <img src="img/fondlogo.png" class="logo02"/>
    <h1>Voici mes Tutos</h1>
    <h2>Vidéo YouTube</h2>
        <p>Nous allons voir dans cette vidéo comment créer une base de donnée avec php myAdmin!</p>
        <div class="div2">
            <iframe  class="video1" width="640" height="360" src="https://www.youtube.com/embed/hDS-n64YqWs"<!--frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen-->></iframe>
        </div>
            <p>J'ai choisi cette vidéo car elle est courte simple et pratique. Elle nous apprends comment, déjà pouvoir télécharger un serveur comme Wampp, Car sans serveur nous ne pouvons pas créer de base de données pour nos sites internet</p>
        <p>Ce monsieur nous explique aussi comment ajouter des lignes dans une base de données. Ajouter et/ou supprimer des tables</p>
        <hr>
    <h2>Voici mon Tuto</h2>
        <p>Dans ce tuto, je vais vous guider pour faire une base de donnée avec php myAdmin.</p><br>
    <h3>Tout d'abord vous devez télécharger un serveur style Wamp.</h3>
    <p>Télécharger Wamp <a href="https://www.wampserver.com/">ici</a></p>
        <p>Il vous suffit de suivre les instructions de téléchargement.</p>
        <p>Ensuite vous devez ouvrir wampp, activez les services en cliquant droit sur l'icône qui se trouvera dans votre barre des
                tâches, dans le menu appuyer sur activer les services, quand il passe de rouge à vert, ça y est les services sont activés.</p>
    <h3>Entrez dans Php MyAdmin pour vous connectez au serveur et à la base de données</h3>
        <p>Vous pouvez à présent voir dans ce même menu qu'il y a écrit Php MyAdmin vous pouvez cliquer dessus pour rentrer dans Php MyAdmin.</p>
        <p>Quand vous êtes sur la page d'accueil pour vous connecter il faut mettre le mot "root" dans "Utilisateur", ne mettez pas de mot de passe
            et choississez le serveur que vous voudrez utiliser. Dans mon cas je choisi l'SQL.</p>
        <p>pour faire une nouvelle DB (DATABASE):</p>
        <div class="div2">
            <ol class="liste2">
                <li>Vous cliquez sur "Créez une nouvelle base de donnée" en lui donnant un nom et le nombre de colonnes que vous voulez. Exécuter.</li><br>
                <li>Vous verrez dans les chamops à gauche que vous avez créé une nouvelles table ave le nom que vous lui aurez donner</li><br>
                <li>Vous pouvez à présent donner des noms à vos colonnes en général vous pouvez commencer par la colonne "id" puis nom par ewemple,
                pseudo, mail,...en déclarant les types de données que vous autorisez par exemple on mettra "varchar" pour un nom car ça peut prendre
                tout les caractères la taille c'est le nombre de caractère que vous autorisez et pour l'id il faut que ce soit un attribut primary key (
                clé primaire) et la case A.I. doit être cochée ("Auto Increment"). Comme ça chaque utilisateur aura son numéro d'identification personnel
                et pourra ête inscrit dans la base de données automatiquement dans votre base de données lors de leur enregistrement. Puis Enregistrer</li><br>
                <li>Vous pouvez faire autant de collonne que vous voulez.</li><br>
                <li>Après avoir enregistrer votre base de donnée si vous allez sur parcourir, vous verrez tout vos noms de colonnes les une à côtés des autres.</li>
                <li>Sur structure vous avez votre structure de votre tableau de base de données.</li><br>
                <li>Pour enregistrer des données de vos utilisateurs cela passera par des langages de codes et fonctions php et sql.</li><br>
            </ol>
        </div>
    <h2>Bon amusement à confectionner vos bases de données!</h2>
        <p>Si vous voulez des précisions ou si vous avez des questions j'essaierai de vous aider du mieux que je peux en m'envoyant
                votre mail via la page de contact de ce site.</p><br><br>
    <footer>
        <p class="liens" >
            <a href="?p=presentation">Précédant</a>/
            <a href="?p=projet">Suivant</a></p><br>
        <br>
        <hr>
        <p class="footer">Copyright &copy; CF2M 2020</p>
    </footer>
</div>
</section>
</body>
</html>
