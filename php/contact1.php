<?php

if(isset($_POST['nom'])){

    ini_set('SMTP','smtp.phpnet.org');
    ini_set('smtp_port',587);

    $for = "web2020.jessica@gmail.com";

    $nom = strip_tags(trim($_POST['nom']));
    $prenom = strip_tags(trim($_POST['prenom']));
    $email = strip_tags(trim($_POST['email']));
    $email_confirmation = strip_tags(trim($_POST['email_confirmation']));
    $message = strip_tags(trim($_POST['message']));


    $subject = 'Mail venant de mon site';
    $headers = 'From: '. $email . "\r\n" .
        'Reply-To: '. $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($for, $subject, $message, $headers)){

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Réponse de l'envoie du mail</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="css/contact.css">
        </head>

        <body class="body">
        <?php
            include "php/navbar.php"
        ?>

        <h1>Votre message a bien été envoyé!</h1>

        </body>
        </html>
        <?php

    }
}

?>
<?php
$req = $bdd->prepare('INSERT INTO portfolioweb2020(nom, prenom, email, email_confirm, message) VALUES(:nom, :prenom, :email,
:email_confirm, :message)');
$req->execute(array(
'nom' => $nom,
'prenom' => $prenom,
'email' => $email,
'email_confirm' => $email,
'message' => $message
));
echo 'Votre demande a bien été transférée';
?>
