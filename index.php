<?php
session_start();
if(!isset($_GET["p"])){
    include "php/home.php";
}
else {
    $p = $_GET["p"];
    switch ($p) {
        case "navbar":
            include "php/navbar_connect.php";
            break;
        case "presentation":
            include "php/presentation.php";
            break;
        case "Tutos":
            include "php/Tutos.php";
            break;
        case "projet" :
            include "php/projet.php";
            break;
        case "liens":
            include "php/liens.php";
            break;
        case "cv1":
            include "php/cv1.php";
            break;
        case "contact":
            include "php/contact.php";
            break;
        case "contact1":
            include "php/contact1.php";
            break;
        case "myadmin":
            include "php/admin/seconnecter.php";
            break;
        case "accueil_admin":
            include "php/admin/accueil_admin.php";
            break;
        case "navbar_deconnect":
            include "php/admin/navbar_deconnect.php";
            break;
        case "deconnect":
            include "php/admin/sedeconnecter.php";
            break;
        case "droitpres":
            include "php/admin/droitpres.php";
            break;
        case "ajoutpres":
            include "php/admin/ajoutpres.php";
            break;
        case "updatetpres":
            include "php/admin/updatepres.php";
            break;
        case "deletepres":
            include "php/admin/deletepres.php";
            break;
        case "droitliens":
            include "php/admin/droitliens.php";
            break;
        case "ajoutliens":
            include "php/admin/ajoutliens.php";
            break;
        case "updateliens":
            include "php/admin/updateliens.php";
            break;
        case "deleteliens":
            include "php/admin/deleteliens.php";
            break;

    }
}

