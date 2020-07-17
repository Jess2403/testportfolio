<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeonnecter.php");
    exit();
}
    $sql="SELECT c.idcategorie_liens, c.nom_cat_liens, l.idliens, l.nom_site, l.url, l.description  
        FROM categorie_liens c
        INNER JOIN liens l ON l.categorie_liens_idcategorie_liens = c.idcategorie_liens;";
    $recup_liens = mysqli_query($db,$sql) or die(mysqli_error($db));

    // on compte le nombre de lignes de résultat
    $count = mysqli_num_rows($recup_liens);

    if(!$count){
        $message = "Pas encore de liens pour le moment";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio | Admin - Liens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/liens.css">
</head>
<body>
<?php
include "php/admin/navbar_deconnect.php";
?>

<div class="div1">
    <img src="img/fondlogo.png" class="logo02"/>
    <h1 class="titre1">Portfolio | Admin - Liens</h1>
    <pre>
    <?php
    if (isset($_GET['message'])) {
        switch ($_GET['message']) {
            case "insert":
        ?>
        <div class="alert alert-success alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <p class="text-center">Votre insertion a bien été faite</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <?php
            break;
            case "delete":
                ?>
        <div class="alert alert-success alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <p class="text-center">Votre suppression a bien été faite</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <?php
            break;
            case "update":
                ?>
        <div class="alert alert-success alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <p class="text-center">Votre modification a bien été insérée</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <?php
            break;
            default:
        ?>
        <div class="alert alert-danger alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <p class="text-center">Vous ne pouvez exécuter cette action</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <?php
        }
    }
    ?>
    </pre>
    <p>Vous trouverez ci-dessous quelques liens qui m'ont servit pour confectionner mon site:</p>
    <h2>Pour mes animations:</h2>
    <div class="liste1"
    <ol>
        <?php

        $sql1 = "SELECT * FROM liens JOIN categorie_liens ON idcategorie_liens = categorie_liens_idcategorie_liens 
                WHERE nom_cat_liens = 'animations';";
        $recup_cat1 = mysqli_query($db, $sql1) or die(mysqli_error($db));

                foreach ($recup_cat1 as $item1) {
                    ?>
                    <li>
                        <?php
                        // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                        echo html_entity_decode($item1['description'], ENT_QUOTES)."<br>";
                        ?>
                        <a href="<?= $item1['url'] ?>" target="_blank"><?= $item1['nom_site'] ?></a><br>
                    </li>
                    <a href="?p=ajoutliens"<i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter un lien</a><br>
                    <a href="?p=updateliens&idliens=<?=$item1['idliens']?>"<i class="fa fa-pencil" aria-hidden="true"></i>Modifier un lien</a><br>
                    <a href="?p=deleteliens&idliens=<?=$item1['idliens']?>"<i class="fa fa-trash" aria-hidden="true"></i>Supprimer un liens</a><br>
                    <a class="btn btn-danger" href="?p=deleteliens&idliens=<?=$item1['idliens']?>&ok" role="button">Supprime définitivement !</a>
                    <a class="btn btn-secondary" href="?p=liens_admin" role="button">Ne pas supprimer</a>
                    <?php

            }
        ?>
    </ol>
</div>
<h2>Pour mes recherches:</h2>
<div class="liste1">
    <ol>
        <?php

        $sql2 = "SELECT * FROM liens JOIN categorie_liens ON idcategorie_liens = categorie_liens_idcategorie_liens 
                WHERE nom_cat_liens = 'recherches';";
        $recup_cat2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

        foreach ($recup_cat2 as $item2) {
            ?>
            <li>
                <?php
                // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                echo html_entity_decode($item2['description'], ENT_QUOTES)."<br>";
                ?>
                <a href="<?= $item2['url'] ?>" target="_blank"><?= $item2['nom_site'] ?></a><br>
            </li>
            <a href="?p=ajoutliens"<i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter un lien</a><br>
            <a href="?p=updateliens&idliens=<?=$item2['idliens']?>"<i class="fa fa-pencil" aria-hidden="true"></i>Modifier un lien</a><br>
            <a href="?p=deleteliens&idliens=<?=$item2['idliens']?>"<i class="fa fa-trash" aria-hidden="true"></i>Supprimer un liens</a><br>
            <a class="btn btn-danger" href="?p=deleteliens&idliens=<?=$item2['idliens']?>&ok" role="button">Supprime définitivement !</a>
            <a class="btn btn-secondary" href="?p=liens_admin" role="button">Ne pas supprimer</a>
            <?php

        }
        ?>
    </ol>
</div>
<h2>Espace - Formateur:</h2>
<div class="liste1">
    <ol>
        <?php

        $sql3 = "SELECT * FROM liens JOIN categorie_liens ON idcategorie_liens = categorie_liens_idcategorie_liens 
                WHERE nom_cat_liens = 'espace_formateur';";
        $recup_cat3 = mysqli_query($db, $sql3) or die(mysqli_error($db));

        foreach ($recup_cat3 as $item3) {
            ?>
            <li>
                <?php
                // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                echo html_entity_decode($item3['description'], ENT_QUOTES)."<br>";
                ?>
                <a href="<?= $item3['url'] ?>" target="_blank"><?= $item3['nom_site'] ?></a><br>
            </li>
            <a href="?p=ajoutliens"<i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter un lien</a><br>
            <a href="?p=updateliens&idliens=<?=$item3['idliens']?>"<i class="fa fa-pencil" aria-hidden="true"></i>Modifier un lien</a><br>
            <a href="?p=deleteliens&idliens=<?=$item3['idliens']?>"<i class="fa fa-trash" aria-hidden="true"></i>Supprimer un liens</a><br>
            <a class="btn btn-danger" href="?p=deleteliens&idliens=<?=$item3['idliens']?>&ok" role="button">Supprime définitivement !</a>
            <a class="btn btn-secondary" href="?p=liens_admin" role="button">Ne pas supprimer</a>
            <?php

        }
        ?>
    </ol>
    <footer>
        <p class="liens" >
            <a href="?p=projet">Précédant</a>/
            <a href="?p=cv1">Suivant</a></p><br>
        <br>
        <hr>
        <p class="footer">Copyright &copy; CF2M 2020</p>
    </footer>
</div>
<?php
    include "php/javascript.php"
?>
</body>
</html>
