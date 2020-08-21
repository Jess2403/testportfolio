<?php
$message1="";
$message2="";
if(!isset($_SESSION['iddemasession'])||$_SESSION['iddemasession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: sedeconnecter.php");
    exit();
}

if(isset($_POST['nom'])){

ini_set('SMTP', 'smtp.phpnet.org');
ini_set('smtp_port', 587);

$for = "web2020.jessica@gmail.com";

$nom = strip_tags(trim($_POST['nom']));
$prenom = strip_tags(trim($_POST['prenom']));
$email = strip_tags(trim($_POST['email']));
$message = strip_tags(trim($_POST['message']));


$subject = 'Mail venant de mon site';
$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($for, $subject, $message, $headers)){


//$req = $db->prepare('INSERT INTO liste_contact (nom, prenom, email, message) VALUES(:nom, :prenom, :email, :message)');
//$req->execute(array(
    //'nom' => $nom,
    //'prenom' => $prenom,
    //'email' => $email,
    //'message' => $message
//));
    $sql1 = "INSERT INTO liste_contact (idliste_contact, nom, prenom, email, message) 
                    VALUES (DEFAULT,'$nom', '$prenom', '$email','$message');";
    $insert = mysqli_query($db, $sql1) or die(mysqli_error($db));
    header ("Location: ?p=liste_contact&idliste_contact");
    $message1= "Votre mail a bien été envoyé";

}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Formulaire et liste de contact</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navbar_deconnect1.css">
    <link rel="stylesheet" type="text/css" href="css/liste_contact_admin.css">
</head>

<body class="body">
<?php
include "php/admin/navbar_deconnect1.php";
?>
<header class="pb-1">
    <h1 class="display-3 text-center mb-4">Admin | Formulaire de contact</h1>
</header>
<form method="post" action="" style="margin-left: 20vw;">
    <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label offset-sm-1" style="font-size: 1.5vw;">Nom:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" style="font-size: 1.5vw;" id="nom" name="nom" placeholder="Nom">
        </div>
    </div>
    <div class="form-group row">
        <label for="prenom" class="col-sm-2 col-form-label offset-sm-1" style="font-size: 1.5vw;">Prénom:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" style="font-size: 1.5vw;" id="prenom" name="prenom" placeholder="Prénom">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label offset-sm-1" style="font-size: 1.5vw;">Email:</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" style="font-size: 1.5vw;" id="email" name="email" placeholder="Votre email">
        </div>
    </div>
    <div class="form-group row">
        <label for="message" class="col-sm-2 col-form-label offset-sm-1" style="font-size: 1.5vw;">Message:</label>
        <textarea id="message" name="message" class="form-control col-sm-6 ml-3 mr-3" style="font-size: 1.5vw;" placeholder="Entrez votre message"></textarea>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 offset-sm-5">
            <button type="submit" class="btn btn-primary" style="font-size: 1.5vw;">Envoyer</button>
        </div>
    </div>
</form>
<h2><?=$message1?></h2>
<header class="pb-1">
    <h1 class="display-3 text-center mb-4"> Admin | Liste de contacts</h1>
</header>
<table class="table table-md col-10">
    <thead class="thead-bordered-2px-double-dark bg-secondary text-center">
    <tr>
        <th scope="col">Numéro</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_GET['idliste_contact'])) {
        /*
         *  $sql="SELECT c.idcategorie_liens, c.nom_cat_liens, l.idliens, l.nom_site, l.url, l.description
        FROM categorie_liens c
        INNER JOIN liens l ON l.categorie_liens_idcategorie_liens = c.idcategorie_liens;";
         */
        $sql2 = "SELECT idliste_contact, nom, prenom, email, message FROM liste_contact;";
        $contact = mysqli_query($db, $sql2) or die(mysqli_error($db));
        $recup_contact = mysqli_num_rows($contact);

        if (!$recup_contact) {
            $message2 = "Pas encore de contact pour le moment";
        }
        foreach ($contact as $item) {
            ?>
            <tr>
                <th scope="row">1</th>
                <td><?= $item['nom'] ?></td>
                <td><?= $item['prenom'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['message'] ?></td>
            </tr>
            <?php

        }
    }
            ?>
    </tbody>
        </table>
<footer>
    <p class="liens" >
        <a href="?p=liens_admin">Précédant</a>/
        <a href="?p=accueil_admin">Retour à l'accueil de l'admin</a></p><br>
    <br>
    <hr>
    <p class="footer">Copyright &copy; CF2M 2020</p>
</footer>
        </body>
        </html>


