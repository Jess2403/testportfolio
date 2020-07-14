<?php

//utilisateur d'une session
session_start();
//vérification de l'existence de la session ou de la validité de la session
if (isset($_SESSION['iddemasession']) && $_SESSION['iddemasession'] !== session_id()) {
    header('Location: sedeconnecter.php');
}
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
        $recup_admin = mysqli_query($db, $sql) or die (mysqli_error($db));

        //si on récupère un utilisateur (connexion réussie)
        if (mysqli_num_rows($recup_admin) === 1) {
            //util contient toutes les données venant de la requête
            $admin = mysqli_fetch_assoc($recup_admin);
            //on va remplir notre session avec ces données:
            $_SESSION = $admin;
            //on va créer notre variable de session de vérification et on va la remplir avec le PHPSESSID de notre session
            $_SESSION['iddemasession'] = session_id();
            //redirection vers l'accueil
            header('Location: ./');
        }
        else {
            $message = "Login et/ou mot de passe incorrect(s)";
        }
    }
    else {
        $message = "login et/ou mot de passe au format(s) invalide(s)";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
<?php
    include "php/navbar_connect.php";
?>
<h1>Se connecter à la partie admin</h1>
<div class="container">
    <form method="post" action="">
        <?php
        if(isset($message)) echo "<h3>$message</h3>>"
        ?>
        <fieldset>
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
            <form class="form-inline my-2 my-lg-0">
                <button class="badge badge-pill badge-lg my-2 my-sm-0" type="button"><a href="?p=myadmin" class="badge badge danger" style="color:white;">SE CONNECTER</a></button>
            </form>
        </fieldset>
    </form>
</div>

</body>
</html>
