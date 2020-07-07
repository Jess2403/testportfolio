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
    <link rel="stylesheet" type="text/css" href="css/accueil_admin.css">
    <title>Accueil - Admin</title>
    <style>
    </style>

</head>
<body>
<?php
include "php/admin/navbar_deconnect.php";
?>
<header>
    <h1 class="display-4 text-center mb-4">Portfolio | Accueil de l'administration</h1>
    <h2>Bienvenue <?=$_SESSION['login']?></h2>
</header>
<div class="div1">
    <h3>Bienvenue sur mon site portfolio</h3>
    <p>Vous pouvez, à présent, manipuler les liens et images de ma présentation.</p>
</div>
<?php
// chemin depuis index.php (CF frontal)
include "./php/javascript.php";

?>

</body>
</html>
