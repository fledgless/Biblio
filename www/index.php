<?php
session_start(); // global
define("SITE_URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require "models/users/UsersManager.class.php";
require "controllers/livres/LivresController.controller.php";
require "controllers/users/UsersController.controller.php";
$usersManager = new UserManager;
$livresController = new LivresController;
$usersController = new UsersController();
// Routeur

try {
    if (empty($_GET['page'])) {
        $livresController->afficherLivresAll(); // page par défaut
    } else {
        // $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $url = explode("/", $_GET['page']);
        switch ($url[0]) {
            case 'livres':
                if (empty($url[1])) {
                    $livresController->afficherLivres(); // Appel de la vue Livres
                } else if ($url[1] === "l") {
                    $livresController->afficherLivre(intval($url[2])); // appel controller
                } else if ($url[1] === "a") {
                    $livresController->ajoutLivre();
                } else if ($url[1] === "av") {
                    $livresController->ajoutLivreValidation();
                } else if ($url[1] === "m") {
                    echo "modifier livre";
                } else if ($url[1] === "s") {
                    echo "supprimer livre";
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case 'a-propos':
                $usersController->profil(); // Appel de la vue Livres
                break;
            case 'connexion':
                $usersController->connexion(); // Appel de la vue Livres
                break;
            case 'deconnexion':
                $usersController->deconnexion(); // Appel methode deconnexion
                break;
            default:
                throw new Exception("La page n'existe pas"); // page d'erreur
                break;
        }
    }
} catch (Exception $e) {
    // echo $e->getMessage();
    $livresController->afficherPageError();
}
