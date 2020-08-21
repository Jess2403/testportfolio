<?php


//si le formulaire a été envoyé (login et pwd)
if (isset($_POST['login'], $_POST['pwd'])) {
//on récupère les superglobales post et locales traitées
    $thelogin = htmlspecialchars(strip_tags(trim($_POST['login'])), ENT_QUOTES);
    $thepwd = htmlspecialchars(strip_tags(trim($_POST['pwd'])), ENT_QUOTES);
//si les variables locales ne sontpas vide vide
    if (!empty($thelogin) && !empty($thepwd)) {

        //requête
        $sql = "SELECT * FROM adminpres WHERE login='$thelogin'AND pwd='$thepwd';";

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar_connect1.css">
    <link rel="stylesheet" type="text/css" href="css/seconnecter.css">
</head>
<body>
<?php
    include "navbar_connect1.php";
?>
<h1>Se connecter à la partie admin</h1>
<div>
    <form method="post" action="">
        <fieldset class="container">
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
                    <input type="password" id="pwd" name="pwd" required>
                </div>
            </div>
                <input type="submit" value="Envoyer" class="offset-5 col-2">
        </fieldset>
    </form>
</div>
<footer>
    <p class="liens" >
        <a href="?p=contact">Précédant</a>/
        <a href="./">Retour vers Home</a></p><br>
    <br>
    <hr>
    <p class="footer">Copyright &copy; CF2M 2020</p>
</footer>
</body>
</html>
