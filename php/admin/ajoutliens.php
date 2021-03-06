<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeconnecter.php");
    exit();
}

if (isset($_POST['categorie_liens'])) {

    if (isset($_POST['nom_site'], $_POST['url'], $_POST['description'])) {
        // si erreur vaudra "" => empty
        $thename = htmlspecialchars(strip_tags(trim($_POST['nom_site'])), ENT_QUOTES);
        // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
        $theurl = filter_var($_POST['url'], FILTER_VALIDATE_URL);
        // si erreur vaudra "" => empty
        $thetext = htmlspecialchars(
            strip_tags(
                trim($_POST['description']), '<p><a><img><br><strong><b><i><em>'), ENT_QUOTES);
        $categorieliens=(int)$_POST['categorie_liens'];
        $admin = $_SESSION['idadminpres'];

        // si on a une erreur de type
        if (empty($thename) || empty($thetext) || $theurl === false || empty($categorieliens)) {

            header("Location:?p=liens_admin");
            $message= "Erreur de type de données";
        } else {
            // sql
            $sql = "INSERT INTO liens (idliens, nom_site, url, description, categorie_liens_idcategorie_liens, adminpres_idadminpres) 
                    VALUES (DEFAULT,'$thename', '$theurl', '$thetext',$categorieliens,$admin);";
            $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
            header ("Location: ?p=liens_admin&insert");

            /*var_dump($sql);*/
        }
    }
    else {
        $erreur = "Le remplissage des champs n'est pas correct.";
    }
}
else {
    $erreur = "Vous n'avez pas choisi de catégorie pour pouvoir insérer le lien";
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navbar_deconnect1.css">
    <link rel="stylesheet" type="text/css" href="css/liste_contact_admin.css">
    <title>Portfolio | Ajouter un lien</title>
    <style>
        p {
            font-size: 1.5vw;
            color: white;
        }
    </style>

</head>
<body>
<?php
include "php/admin/navbar_deconnect1.php";
?>
<header>
    <h1 class="display-4 text-center mb-4">Portfolio | Admin - Ajouter un lien</h1>
</header>
<main role="main" class="container">
    <p class="lead text-center">Ce formulaire vous permet d'ajouter un lien dans la liste</p>
    <form id="formulaire" method="post" action="">
        <p><strong>Veuillez choisir une catégorie ci-dessous pour rajouter les liens</strong></p>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" style="font-size: 1.5vw;" type="radio" name="categorie_liens" id="animations" value="1" checked>
            <label class="form-check-label" style="font-size: 1.5vw;" for="animations">Pour faire les animations</label>
        </div>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" style="font-size: 1.5vw;" type="radio" name="categorie_liens" id="recherches" value="2"">
            <label class="form-check-label" style="font-size: 1.5vw;" for="recherches">Pour faire des recherches</label>
        </div>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" style="font-size: 1.5vw;" type="radio" name="categorie_liens" id="espace-formateur" value="3">
            <label class="form-check-label" style="font-size: 1.5vw;" for="espace-formateur">Pour l'espace-formateur</label>
        </div>
        <div class="form-group row">
            <label class="col-md-3" style="font-size: 1.5vw;"for="nom_site"><strong>Nom du site(*)</strong></label>
            <input type="text" class="form-control col-md-9" style="font-size: 1.5vw;" id="nom_site" name="nom_site" placeholder="Entrez le nom du site">
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" style="font-size: 1.5vw;"for="url"><strong>Adresse du site(*)</strong></label>
            <input type="url" style="font-size: 1.5vw;"class="form-control col-md-9" id="url" name="url" placeholder="Entrez l'adresse du site(URL)" required>
            <div class="invalid-feedback text-left offset-md-3">Vous devez renseigner l'URL du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" style="font-size: 1.5vw;"for="description"><strong>Description du site</strong></label>
            <textarea class="form-control col-md-9" style="font-size: 1.5vw;"id="description" name="description" placeholder="Entrez une description du site"></textarea>
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrer une description</div>
        </div>
        <div class="form-group row">
            <p class="form-text text-center col-md-12">(*) Champs obligatoire</p>
        </div>
        <button type="submit" class="btn btn-primary btn-block col-md-4 offset-md-4" style="font-size: 1.5vw;">Envoyer les données</button>
    </form>
    <footer>
        <p class="liens" ><a href="?p=presentation">Suivant</a></p><br>
        <br>
        <hr>
        <p class="footer">Copyright &copy; CF2M 2020</p>
    </footer>

    <?php
    include "php/javascript.php"
    ?>
</body>
</html>
