<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: ./");
    exit();
}

if (isset($_POST['nom_categorie'])) {
    if (isset($_POST['nom_site'], $_POST['url'], $_POST['description'])) {
        // si erreur vaudra "" => empty
        $thename = htmlspecialchars(strip_tags(trim($_POST['nom'])), ENT_QUOTES);
        // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
        $theurl = filter_var($_POST['url'], FILTER_VALIDATE_URL);
        // si erreur vaudra "" => empty
        $thetext = htmlspecialchars(
            strip_tags(
                trim($_POST['description']), '<p><a><img><br><strong><b><i><em>'), ENT_QUOTES);

        // si on a une erreur de type
        if (empty($thename) || empty($thetext) || $theurl === false) {
            $message = "Erreur de type de données, veuillez recommencer";
        } else {
            // sql
            $sql = "INSERT INTO liens (id_liens, nom, url, description, id_categorie, id_admin) VALUES ('$thetitle', '$theurl', '$thetext');";
            $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
            $message = "Merci pour l'insertion de votre lien";
        }
    }
}
else {
    echo "Vous n'avez pas choisi de catégorie pour pouvoir insérer le lien";
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
    <h1 class="display-4 text-center mb-4">Portfolio | Ajouter des liens</h1>
</header>
<main role="main" class="container">
    <h1 class="text-center md-4">Admin - Ajouter liens</h1>
    <p class="lead text-center">Ce formulaire vous permet d'ajouter un lien dans la liste</p>
    <form id="formulaire" novalidate>
        <div class="form-group row">
            <label class="col-md-3" for="nomsite">Nom du site(*)</label>
            <input type="text" class="form-control col-md-9" id="nomsite" placeholder="Entrez le nom du site">
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="urlsite">Adresse du site(*)</label>
            <input type="url" class="form-control col-md-9" id="urlsite" placeholder="Entrez l'adresse du site(URL)" required>
            <div class="invalid-feedback text-left offset-md-3">Vous devez renseigner l'URL du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="descriptionsite">Description du site</label>
            <textarea class="form-control col-md-9" id="descriptionsite" placeholder="Entrez une description du site"></textarea>
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrer une description</div>
        </div>
        <div class="form-group row">
            <p class="form-text text-center col-md-12">(*) Champs obligatoire</p>
        </div>
        <button type="submit" class="btn btn-primary btn-block col-md-4 offset-md-4">Envoyer les données</button>
    </form>

</body>
</html>
