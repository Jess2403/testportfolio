<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if (!isset($_SESSION['iddemasession']) || $_SESSION['iddemasession'] !== session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeconnecter.php");
    exit();
}


// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idliens'])&&ctype_digit($_GET['idliens'])){
    // conversion en entier
    $idliens = (int) $_GET['idliens'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $sql = "DELETE FROM liens WHERE idliens=$idliens";
        // suppression
        mysqli_query($db,$sql)or die(mysqli_error($db));
        // redirection - ajout d'une variable GET['message'] pour la confirmation,ici de la suppression(&message=delete
        header("Location: ?p=liens_admin&message=delete");
    }

    // préparation de la requête
    $sql = "SELECT nom_site, url FROM liens WHERE idliens=$idliens";
    // exécution de la requête
    $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on trouve une ligne de résultat 1 vaut true
    if(mysqli_num_rows($recup)){
        $liens = mysqli_fetch_assoc($recup);
        // mysqli_num_rows($recup) vaut 0 donc false
    }else{
        $erreur = "Cet article n'existe déjà plus ou n'a jamais existé";
    }
// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Pas d'id répertorié!";
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

    <title>Portfolio | Suppression du lien - <?php echo (isset($erreur))? $erreur: $liens['thetitle']  ?> </title>

</head>
<body>
<?php
include "navbar_deconnect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Suppression du lien - <?php echo (isset($erreur))? $erreur: $liens['nom_site']  ?></h1>
</header>

<main class="container">
    <?php
    if(!isset($erreur)){
        ?>
        <h3>Voulez vous vraiment supprimer :</h3><hr>
        <h4><?=$liens['nom_site']?></h4>
        <h5><?=$liens['url']?></h5>
        <hr>
        <a class="btn btn-danger" href="?p=deleteliens&idliens=<?=$idliens?>&ok" role="button">Supprime définitivement !</a>
        <a class="btn btn-secondary" href="?p=liensadmin" role="button">Ne pas supprimer</a>
        <?php
    }else{
        ?>
        <h3>Retournez vers l'<a href="./">accueil</a></h3>
        <?php
    }
    ?>
</main>

<?php
// chemin depuis index.php (CF frontal)
include "php/javascript.php";

?>

</body>
</html>