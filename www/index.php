<?php
session_start();
require_once "models/UserManager.class.php";
$usersManager = new UserManager;
require_once "controllers/LivresController.controller.php";
$livreController = new LivresController;

try {
    if (empty($_GET['page'])){
        $livreController->afficherLivresAccueil();
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'accueil':
                $livreController->afficherLivresAccueil();
                break;
            case 'livres':
                if(empty($url[1])) {
                    $livreController->afficherLivres();
                } else if ($url[1] === "l") {
                    echo "Afficher livre";
                } else if ($url[1] === "a") {
                    echo "ajout livre";
                } else if ($url[1] === "m") {
                    echo "Modifier livre";
                } else if ($url[1] === "s") {
                    echo "Supprimer livre";
                } else {
                    throw new Exception();
                }
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
                throw new Exception();
                break;
        }
    }
} catch(Exception $e) {
    require "views/error.view.php";
}