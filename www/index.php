<?php
session_start();
require_once "UserManager.class.php";
$usersManager = new UserManager;

if (empty($_GET['page'])){
    require "views/accueil.view.php";
} else {
    switch ($_GET['page']) {
        case 'accueil':
            require "views/accueil.view.php";
            break;
        case 'livres':
            require "views/livres.view.php";
            break;
        case 'a-propos':
            require "views/a-propos.view.php";
            break;
        case 'connexion':
            require "views/connexion.view.php";
            break;
        case 'deconnexion':
            $usersManager->deconnexion();
            break;
        default:
            require "views/error.view.php";
            break;
    }
}