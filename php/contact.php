
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/contact.css">
    </head>
    <body class="body">
    <?php
        include "php/navbar_connect.php";
    ?>
    <div>
        <h1>Contact</h1>
        <div class="container">
        <form method="post" action="?p=contact1">
            <fieldset>
                <legend>Vos coordonnées</legend>
                <div class="row">
                    <div class="col-25">
                        <label for="nom">Nom:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nom" name="nom" required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="prenom">Prénom:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="prenom" name="prenom" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">Votre adresse email:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" name="email" required>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label id="label">Votre message</label>
                    </div>
                    <div class="col-75">
                        <textarea id="message" name="message" style="height:200px" placeholder="Ecrivez votre message ici..." required></textarea>
                    </div>
                </div>
                <div class="row" id="bouton">
                    <input type="submit" value="Envoyer">
                </div>
            </fieldset>
        </form>
        </div>
            <footer>
                <p class="liens" >
                    <a href="?p=cv">Précédant</a>/
                    <a href="./">Retour vers Home</a></p><br>
                <br>
                <hr>
                <p class="footer">Copyright &copy; CF2M 2020</p>
            </footer>
    </div>
    </body>
</html>
