<?php

if (empty($_GET['page'])){
    require "views/accueil.view.php";
} else {
    switch ($_GET['page']) {
        case 'accueil':
            require "views/accueil.view.php";
            break;
        case 'livres':
            if(!isset($_SESSION['utilisateur'])) {
                require "views/livres.view.php";
            } else {
                require "views/connexion.view.php";
            }
            break;
        case 'a-propos':
            require "views/a-propos.view.php";
            break;
        default:
            require "views/error.view.php";
            break;
    }
}