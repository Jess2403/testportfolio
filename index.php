<?php
session_start();
require_once "config.php";
//connexion à la db
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT);
mysqli_set_charset($db, "utf8");

    if (!isset($_GET["p"])) {
        include "php/home.php";
    } else {
        $p = $_GET["p"];
        switch ($p) {
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
                include "php/seconnecter.php";
                break;
            case "liste_contact":
                include "php/admin/liste_contact_admin.php";
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
            case "Tutos_admin":
                include "php/admin/Tutos_admin.php";
                break;
            case "projet_admin":
                include "php/admin/projet_admin.php";
                break;
            case "cv_admin":
                include "php/admin/cv_admin.php";
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
            case "liens_admin" :
                include"php/admin/liens_admin.php";
                break;
            case "presadmin":
                include "php/admin/pres_admin.php";
                break;
            case "updateliens":
                include "php/admin/updateliens.php";
                break;
            case "deleteliens":
                include "php/admin/deleteliens.php";
                break;
            default:
                include "php/home.php";
        }
    }

