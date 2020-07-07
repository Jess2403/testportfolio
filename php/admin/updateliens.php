<?php
//vérification de l'existence de la session ou de la validité de la session
if (!isset($_SESSION['iddemasession']) && $_SESSION['iddemasession'] !== session_id()) {
    header('Location: ./?p=liens');
}
    include "php/navbar.php";
?>
