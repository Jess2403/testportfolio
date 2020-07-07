<?php


//si le formulaire a été envoyé (login et pwd)
if (isset($_POST['login'], $_POST['pwd'])) {
//on récupère les superglobales post et locales traitées
    $thelogin = htmlspecialchars(strip_tags(trim($_POST['login'])), ENT_QUOTES);
    $thepwd = htmlspecialchars(strip_tags(trim($_POST['pwd'])), ENT_QUOTES);
//si les variables locales ne sontpas vide vide
    if (!empty($thelogin) && !empty($thepwd)) {


//connexion à la db mysqli_28
        $db = mysqli_connect('Localhost', 'root', '', 'portfolio2020', 3308);
//encodage en utf8
        mysqli_set_charset($db, 'utf8');

        //requête
        $sql = "SELECT * FROM adminpres WHERE login='$thelogin'AND pwd='$thepwd'";

        //requête mysqli
        $recup = mysqli_query($db, $sql);

        //si on récupère un utilisateur (connexion réussie)
        if (mysqli_num_rows($recup) === 1) {
            //util contient toutes les données venant de la requête
            $admin = mysqli_fetch_assoc($recup);

            //on va remplir notre session avec ces données:
            $_SESSION = $admin;
            //on va créer notre variable de session de vérification et on va la remplir avec le PHPSESSID de notre session
            $_SESSION['iddemasession'] = session_id();
            //redirection vers l'accueil
           header('Location: ./?p=accueil_admin');
            // var_dump($_SESSION);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/seconnecter.css">
</head>
<body>
<?php
    include "php/admin/navbar_connect.php";
?>
<h1>Se connecter à la partie admin</h1>
<div class="container">
    <form method="post" action="">
        <fieldset class="fieldset">
            <legend>Se connecter</legend>
            <div class="row">
                <div class="col-25">
                    <label for="login">Login:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="login" name="login" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="pwd">Mot de passe:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="pwd" name="pwd" required>
                </div>
            </div>
            <!--<form class="form-inline my-3 my-lg-4">-->
                <input type="submit" value="Envoyer" class="offset-5 col-2"><!--<a href="?p=accueil_admin">Se connecter</a>-->
                <!--<button class="badge badge-pill badge-lg my-2 my-sm-0" type="button"><a href="?p=accueil_admin" class="badge badge-primary" style="color:white;">SE CONNECTER</a></button>-->
            <!--</form>-->
        </fieldset>
    </form>
</div>

</body>
</html>
