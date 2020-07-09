<?php
session_start();
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeonnecter.php");
    exit();
}

    $sql="SELECT c.idcategorie_liens, c.nom_cat_liens, l.idliens, l.nom_site, l.url, l.description  
        FROM categorie_liens 
        INNER JOIN liens l ON c.categorie_liens_idcategorie_liens = l.id liens WHERE c.idcategorie_liens;";
    $recup_liens = mysqli_query($db,$sql) or die(mysqli_error($db));

    // on compte le nombre de lignes de résultat
    $count = mysqli_num_rows($recup_liens);

    if(!$count){
        $message = "Pas encore de liens pour le moment";
    }
    else{
        // utilisation de mysqli_fetch_all qui va formater tous les résultats dans un tableau indexé, le paramètre non obligatoire MYSQLI_ASSOC fait que chaque ligne de ce tableau sera un tableau associatif
        $tous_les_liens = mysqli_fetch_all($recup_liens,MYSQLI_ASSOC);
        // var_dump($tous_les_liens);
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
    if (isset($message1)) {
        echo
        '<div class="alert alert-success alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <h4 class="alert-heading">.$message1.</h4>
            <p class="text-center">Votre message à bien été envoyer</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>';
    }
        if(isset($message2)) {
            echo
            '<div class="alert alert-danger alert-dismissible fade show offset-1 col-9" role="alert" id="messageok">
            <h4 class="alert-heading">.$message2.</h4>
            <p class="text-center">Votre message \n\'a pas été envoyer</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="false"></span>
            </button>
        </div>';
    }
    ?>
    </pre>
    <p>Vous trouverez ci-dessous quelques liens qui m'ont servit pour confectionner mon site:</p>
    <h2>Pour mes animations:</h2>
    <div class="liste1"
    <ol>
        <li>Pour faire mes boutons de navigation dans ma page "ACCUEIL".<br>
            <a href="https://www.youtube.com/watch?v=ex7jGbyFgpA">Bouton néon</a>
        </li>
        <li>Pour faire ma sphère 3d qui est sur ma page "ACCUEIL".<br>
            <a href="https://www.youtube.com/watch?v=icgbxlqf9Kc">Sphère animation 3D</a>
        </li>
        <li>Pour faire mon animation texte dans ma page "ACCUEIL"<br>
            <a href="https://www.youtube.com/watch?v=ajhJnfS_FK4">Effet animation texte</a>
        </li>
        <li>Pour faire le swipe responsive que vous trouverez dans ma page "PRESENTATION".<br>
            <a href="https://www.youtube.com/watch?v=kw1wnvWjgCw">Swipe 3d responsive:</a>
        </li>
        <?php

        if (isset($_GET['idcategorie_liens']) && ctype_digit($_GET['idcategorie_liens'])) {
        $animations = $_GET['idcategorie_liens'];
        $sql3 = "SELECT idcatégorie_liens FROM categorie_liens WHERE idcategorie_liens=3;";
        $recup_cat1 = mysqli_query($db, $sql3) or die(mysqli_error($db));

        }
        else {
            echo "Vous n'avez pas récupérer vos liens dans cete catégorie";
        }
            if(isset($nom_site, $url, $description)) {
                foreach ($tous_les_liens as $item) {
                    ?>
                    <li>
                        <?php
                        // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                        echo html_entity_decode($item['description'], ENT_QUOTES);
                        ?>
                        <a href="<?= $item['url'] ?>" target="_blank"><?= $item['nom_site'] ?></a>
                    </li>
                    <?php
                }
            }
        ?>
    </ol>
</div>
<h2>Pour mes recherches:</h2>
<div class="liste1">
    <ol>
        <li>Pour faire mes fonds d'écran en linear-gradient. ( Mes couleurs de fonds de pages).</li>
        <a href="https://developer.mozilla.org/fr/docs/Web/CSS/linear-gradient">Linear-gradient</a>
        <li>Pour faire ma barre de navigation responsive sur toutes mes pages sauf "ACCUEIL".</li>
        <a href="https://www.youtube.com/watch?v=lYw-FE60Dws">Navbar responsive</a>
        <li>Pour divers soucis en css</li>
        <a href="https://developer.mozilla.org/fr/docs/Web/CSS/font-style">Ici pour les font-style(gras, italic,...</a>
        <li>
            <a href="https://www.formget.com/css-lists/">Pour faire mes listes de liens.</a>
        </li>
        <li>Pour m'aider dans ma mise en page de ma page cv pour l'intégration d'un paragraphe dans mon encadré faisant partie de mon titre.</li>
        <a href="https://www.cssdebutant.com/debuter-en-css-integrer-du-css-page-HTML.html">Mise en page</a>
        <?php

        if (isset($_GET['idcategorie_liens']) && ctype_digit($_GET['idcategorie_liens'])) {
            $animations = $_GET['idcategorie_liens'];
            $sql1 = "SELECT idcatégorie_liens FROM categorie_liens WHERE idcategorie_liens=2;";
            $recup_cat2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

        }
        else {
            echo "Vous n'avez pas récupérer vos liens dans cete catégorie";
        }
        if(isset($nom_site, $url, $description)) {
            foreach ($tous_les_liens as $item) {
                ?>
                <li>
                    <?php
                    // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                    echo html_entity_decode($item['description'], ENT_QUOTES);
                    ?>
                </li>
                    <a href="<?= $item['url'] ?>" target="_blank"><?= $item['nom_site'] ?></a>
                <?php
            }
        }
        ?>
    </ol>
</div>
<h2>Espace - Formateur:</h2>
<div class="liste1">
    <ol>
        <?php

        if (isset($_GET['idcategorie_liens']) && ctype_digit($_GET['idcategorie_liens'])) {
            $animations = $_GET['idcategorie_liens'];
            $sql1 = "SELECT idcatégorie_liens FROM categorie_liens WHERE idcategorie_liens=1;";
            $recup_cat1 = mysqli_query($db, $sql1) or die(mysqli_error($db));

        }
        else {
            echo "Vous n'avez pas récupérer vos liens dans cete catégorie";
        }
        if(isset($nom_site, $url, $description)) {
            foreach ($tous_les_liens as $item) {
                ?>
                <li>
                    <?php
                    // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                    echo html_entity_decode($item['description'], ENT_QUOTES);
                    ?>
                    <a href="<?= $item['url'] ?>" target="_blank"><?= $item['nom_site'] ?></a>
                </li>
                <?php
            }
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
