<?php

if(isset($_POST['nom'])){

    ini_set('SMTP','smtp.phpnet.org');
    ini_set('smtp_port',587);

    $for = "web2020.jessica@gmail.com";

    $nom = strip_tags(trim($_POST['nom']));
    $prenom = strip_tags(trim($_POST['prenom']));
    $email = strip_tags(trim($_POST['email']));
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
            include "php/navbar_connect.php"
        ?>

        <h1>Votre message a bien été envoyé!</h1>

        </body>
        </html>
        <?php

    }
}

?>
<?php
//$req = $db->prepare('INSERT INTO liste_contact (nom, prenom, email, message) VALUES(:nom, :prenom, :email, :message)');
//$req->execute(array(
//'nom' => $nom,
//'prenom' => $prenom,
//'email' => $email,
//'message' => $message
//));
//echo 'Votre demande a bien été transférée.';
$sql1 = "INSERT INTO liste_contact (idliste_contact, nom, prenom, email, message) 
                    VALUES (DEFAULT,'$nom', '$prenom', '$email',$message);";
$insert = mysqli_query($db, $sql1) or die(mysqli_error($db));
header ("Location: ?p=liste_contact");
$message1= "Votre mail a bien été envoyé";
?>
