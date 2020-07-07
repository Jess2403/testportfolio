<?php
//utilisateur d'une session
session_start();
//vérification de l'existence de la session ou de la validité de la session
if(!isset($_SESSION['idmasession']) || $_SESSION['idmasession']!==session_id()){
    header('Location: seconnecter.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<?php
    include "php/navbar.php";
?>
<h1>Accueil</h1>
<h2>Bienvenue<?=$_SESSION['login']?></h2>
<h3>Vous avez la permission <?=$_SESSION['adminpres']?></h3>
<p>Bienvenue sur mon site</p>
<p>Permission0 0: accès à tout le site</p>
<h4>Menu de navigation</h4>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <?php
    switch($_SESSION['adminpres']){
        case 0:
            echo '<li><a href="ajoutpres.php">Ajouter une image</a></li>';
            echo '<li><a href="updatepres.php">Modifier une image</a></li>';
            echo '<li><a href="deletepres.php">Supprimer une image</a></li>';
            break;

    }
    ?>
    <li><a href="./">Retour à l'accueil</a></li>
    <li><a href="sedeconnecter.php">Déconnexion</a></li>

</ul>


</body>
</html>
