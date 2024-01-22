<?php
require_once "models/LivreManager.class.php";

class LivresController {
    private $livresManager;

    public function __construct() {
        $this->livresManager = new LivreManager;
        if (isset($_SESSION["user"])) {
            $id_user = $_SESSION['user']['userId'];
            $this->livresManager->chargementLivres($id_user);
        } 
    }

    public function afficherLivres() {
        $livresEnCours = $this->livresManager->getLivres();
        require "views/livres.view.php";
    }

    public function afficherLivresAccueil() {
        $livresEnCours = $this->livresManager->getLivres();
        require "views/accueil.view.php";
    }
}