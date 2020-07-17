<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeconnecter.php");
    exit();
}

if (isset($_POST['categorie_image'])) {

    if (isset($_POST['nomfichier'], $_POST['chemin'])) {
        // si erreur vaudra "" => empty
        $fichier = htmlspecialchars(strip_tags(trim($_POST['nomfichier'])), ENT_QUOTES);
        // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
        $chemin = filter_var($_POST['chemin'], FILTER_VALIDATE_URL);
        // si erreur vaudra "" => empty
        $categorieimage=(int)$_POST['categorie_image'];
        $admin = $_SESSION['idadminpres'];

        // si on a une erreur de type
        if (empty($fichier) || $chemin === false || empty($categorieimage)) {

            header("Location:?p=liens_admin");
            $message= "Erreur de type de données";
        } else {
            // sql
            $sql = "INSERT INTO galerie (idgalerie, nomfichier, chemin, categorie_image_idcategorie_image, adminpres_idadminpres) 
                    VALUES (DEFAULT,'$fichier', '$chemin',$categorieimage,$admin);";
            $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
            header ("Location: ?p=pres_admin&insert");

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

    <link rel="stylesheet" type="text/css" href="css/accueil_admin.css">
    <title>Portfolio | Ajouter un lien</title>
    <style>
    </style>

</head>
<body>
<?php
include "php/admin/navbar_deconnect.php";
?>
<header>
    <h1 class="display-4 text-center mb-4">Portfolio | Ajouter un lien</h1>
</header>
<main role="main" class="container">
    <h1 class="text-center md-4">Admin - Ajouter une image</h1>
    <p class="lead text-center">Ce formulaire vous permet d'ajouter une image dans les swipes</p>
    <form id="formulaire" method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    include "php/javascript.php"
    ?>
</body>
</html>