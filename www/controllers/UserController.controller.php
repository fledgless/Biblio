<?php
require_once "models/UserManager.class.php";

class UserController {
    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager;
    }
    
    public function utilisateur() {
        if(isset($_POST['pseudo'])) {
            $this->userManager->setUser($_POST['pseudo'], $_POST['passwrd']); 
            $userEnCours = $this->userManager->getUser();
            if ($userEnCours != null) {
                foreach($userEnCours as $attribut => $valeur) {
                    $_SESSION['user'][$attribut] = $valeur;
                }
            }
            header("location: /");
            require "views/connexion.view.php";
        }
    }   

    /**
     * Get the value of userManager
     */
    public function getUserManager() {
        return $this->userManager;
    }

    /**
     * Set the value of userManager
     */
    public function setUserManager($userManager): self {
        $this->userManager = $userManager;
        return $this;
    }
}