<?php
require_once "models/LivreManager.class.php";

class LivresController {
    private $livresManager;

    public function __construct() {
        $this->livresManager = new LivreManager;
        $this->livresManager->chargementLivres();
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