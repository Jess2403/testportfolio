<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeconnecter.php");
    exit();
}
// var_dump($_POST);

/*
 * COPIE CONFORME DE L'INSERT DE LA PAGE liens_admin_ajout.php
 *
 * si le formulaire est envoyé,on ajoute l'existence de idliens
 */if (isset($_POST['categorie_liens'])) {

    if (isset($_POST['idliens'], $_POST['nom_site'], $_POST['url'], $_POST['description'])) {
        //on traite idliens en le transformant en entier si faux 0 => empty
        $idliens = (int)$_POST['idliens'];
        // si erreur vaudra "" => empty
        $thename = htmlspecialchars(strip_tags(trim($_POST['nom_site'])), ENT_QUOTES);
        // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
        $theurl = filter_var($_POST['url'], FILTER_VALIDATE_URL);
        // si erreur vaudra "" => empty
        $thetext = htmlspecialchars(
            strip_tags(
                trim($_POST['description']), '<p><a><img><br><strong><b><i><em>'), ENT_QUOTES);
        $categorieliens = (int)$_POST['categorie_liens'];
        $admin = $_SESSION['idadminpres'];
        // si on a une erreur de type(ajout de la vérification de idliens - on vérifie si le formulaire n'a pas été modifié
        // pa rapport  à la variable GET,protège des attaques par modification du code source, mais pas les attaques via robots
        //ou des requêtes externes au site(rare si on est connecté, mais ne pas oublié que vos alliés (les membres de l'équipe)
        //peuvent devenir vos ennemis!
        if (empty($thename) || empty($thetext) || $theurl === false || empty($idliens) || $idliens = $_GET['idliens']) {
            $message = "Erreur de type de données, veuillez recommencer";
        } else {
            // sql - devient un update
            $sql = "UPDATE liens SET idliens = DEFAULT, nom_site ='$thename', url = '$theurl', description ='$thetext' , 
                    categorie_liens_idcategorie_liens = $categorieliens, adminpres_idadminpres = $admin);";
            $update = mysqli_query($db, $sql) or die(mysqli_error($db));
            header("Location: ?p=updateliens");

        }
    }
}
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
/*
 * COPIE CONFORME DU DELETE DE LA PAGE liens_admin_delete.php
 * On l'adapte pour
 */
if(isset($_GET['idliens'])&&ctype_digit($_GET['idliens'])){
    // conversion en entier
    $idliens = (int) $_GET['idliens'];

    // préparation de la requête ! besoin de tous les champs pour l'update
    $sql = "SELECT * FROM liens WHERE idliens=$idliens;";
    // exécution de la requête
    $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on trouve une ligne de résultat 1 vaut true
    if(mysqli_num_rows($recup)){
        $liens = mysqli_fetch_assoc($recup);
        // mysqli_num_rows($recup) vaut 0 donc false
    }else{
        $erreur = "Cet article ne peut être modifier, il n'existe plus ou n'a jamais existé";
    }
// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Pas d'id spécifié!";
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
    <title>Portfolio | Modifier le lien : <?php echo (isset($erreur))? $erreur: $liens['nom_site'] ?></title>

</head>
<body>
<?php
include "navbar_deconnect.php";
?>
<header>
    <h1 class="display-4 text-center mb-4">Portfolio | Administration des liens | Modifier le lien :</h1>
    <h1 class="text-center md-4">Admin - Modifier liens</h1>
    <p class="lead text-center">Ce formulaire vous permet d'ajouter un lien dans la liste</p>
    <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? $erreur: $liens['nom_site'] ?></h2>
</header>

<main role="main" class="container">
    <?php
    // message d'erreur
    if(isset($message)) {
        echo "<hr><h3>$message</h3><hr>";
    }
   ?>

    <form id="formulaire" method="post" action="">
        <p><strong>Veuillez choisir une catégorie ci-dessous pour rajouter les liens</strong></p>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" type="radio" name="categorie_liens" id="animations" value="1" checked>
            <label class="form-check-label" for="animations">Pour faire les animations</label>
        </div>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" type="radio" name="categorie_liens" id="recherches" value="2"">
            <label class="form-check-label" for="recherches">Pour faire des recherches</label>
        </div>
        <div class="form-check form-group offset-1">
            <input class="form-check-input" type="radio" name="categorie_liens" id="espace-formateur" value="3">
            <label class="form-check-label" for="espace-formateur">Pour l'espace-formateur</label>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="nom_site"><strong>Nom du site(*)</strong></label>
            <input type="text" class="form-control col-md-9" id="nom_site" name="nom_site" placeholder="Entrez le nom du site" required value="<?=$liens['nom_site']?>">
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="url"><strong>Adresse du site(*)</strong></label>
            <input type="url" class="form-control col-md-9" id="url" name="url" placeholder="Entrez l'adresse du site(URL)" required value="<?=$liens['url']?>">
            <div class="invalid-feedback text-left offset-md-3">Vous devez renseigner l'URL du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="description"><strong>Description du site</strong></label>
            <textarea class="form-control col-md-9" id="description" name="description" placeholder="Entrez une description du site"><?=$liens['description']?></textarea>
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrer une description</div>
        </div>
        <div class="form-group row">
            <p class="form-text text-center col-md-12">(*) Champs obligatoire</p>
        </div>
        <input type="hidden" name="idliens" value="<?=$liens['idliens']?>">
        <button type="submit" class="btn btn-primary btn-block col-md-4 offset-md-4">Modifier les données</button>
    </form>
    <?php
    include "php/javascript.php";
    ?>

</body>
</html>