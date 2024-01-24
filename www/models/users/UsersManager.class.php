<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/users/User.class.php";

class UserManager extends ConnexionManager
{
    private User $user;

    public function setUser($pseudo, $passwrd)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM User");
        $req->execute();
        $users = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($users as $user) {
            // logique
            if ($user['pseudo'] === $pseudo) {
                if (password_verify($passwrd, $user['passwrd'])) {
                    $user = new User($user['id_user'], $user['pseudo'], $user['passwrd'], $user['email'], $user['adresse']);
                    return $this->user = $user;
                }
            }
        }
    }

    /**
     * Get the value of user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
