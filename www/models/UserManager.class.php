<?php

require_once "models/User.class.php";
require_once "models/ConnexionManager.class.php";

class UserManager extends ConnexionManager {
    private object $user;

    public function setUser($pseudo, $passwrd) {
        $connexion = $this->getConnexionDbb();
        $req = $connexion->prepare("SELECT * FROM User");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($users as $user) {
            if($user['pseudo'] === $pseudo) {
                if(password_verify($passwrd, $user['passwrd'])) {
                    $user = new User($user['id_user'], $user['pseudo'], $user['email'], $user['passwrd']);
                    return $this->user = $user;
                }
            }
        }
    }

    /**
     * Get the value of user
     *
     * @return object
     */
    public function getUser(): object {
        return $this->user;
    }
}