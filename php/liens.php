<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
//if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
   // header("Location: sedeonnecter.php");
    //exit();
//}
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
    <link rel="stylesheet" href="css/navbar_connect1.css">
    <link rel="stylesheet" href="css/liens.css">
</head>
<body>
<?php
include "navbar_connect1.php";
?>
<div class="container">
    <img src="img/fondlogo.png" class="logo02"/>
</div>
<div class="div1">
    <h1 class="titre1">Mes Liens</h1>
    <p>Vous trouverez ci-dessous quelques liens qui m'ont servit pour confectionner mon site:</p>
    <h2>Pour mes animations:</h2>
    <div>
        <ol class="liste1">
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
                <?php
            }
        ?>
    </ol>
</div>
<h2>Pour mes recherches:</h2>
<div>
    <ol class="liste1">
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
            <?php

        }
        ?>
    </ol>
</div>
<h2>Espace - Formateur:</h2>
<div>
    <ol class="liste1">
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
            <?php

        }
        ?>
    </ol>
</div>
</div>
    <footer>
        <p class="liens" >
            <a href="?p=projet">Précédant</a>/
            <a href="?p=cv1">Suivant</a></p><br>
        <br>
        <hr>
        <p class="footer">Copyright &copy; CF2M 2020</p>
    </footer>

<?php
include "php/javascript.php"
?>
</body>
</html>
