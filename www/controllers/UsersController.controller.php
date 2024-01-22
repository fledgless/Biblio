<?php
require_once "models/UserManager.class.php";

class UsersController {
    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager;
    }

    public function connexion() {
        require "views/connexion.view.php";
    }
    
    public function connexionUser($userId, $passwrd) {
        if(isset($_POST['pseudo'])) {
            $this->userManager->setUser($_POST['pseudo'], $_POST['passwrd']); 
            $userEnCours = $this->userManager->getUser();
            if ($userEnCours != null) {
                foreach($userEnCours as $attribut => $valeur) {
                    $_SESSION['user'][$attribut] = $valeur;
                }
                header("location: /");
            }
        }
    }   

    public function deconnexion()
    {
        session_destroy();
        header("location: /");
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