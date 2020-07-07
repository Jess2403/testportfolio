<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: ./");
    exit();
}
session_start();
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
</body>
</html>