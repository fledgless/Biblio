<?php

require_once "ConnexionManager.class.php";
require_once "function.php";

class SessionManager extends ConnexionManager {
    private array $utilisateurs;

    public function ajouterUtilisateur($nouvelUser) {
        $this->utilisateurs[] = $nouvelUser;
    }

    public function chargementUtilisateur() {
        $connexion = $this->getConnexionDbb();
        $req = $connexion->prepare("SELECT * FROM User");
        $req->execute();
        $tableUser = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($tableUser as $utilisateur) {
           $nouvelUser = new User($utilisateur['id_user'], $utilisateur['pseudo'], $utilisateur['email'], $utilisateur['passwrd'], $utilisateur['estValide'], $utilisateur['estAdmin']);
           $this->ajouterUtilisateur($nouvelUser);

        }
    }

    public function verif($pseudo, $passwrd) {
        $sql = "SELECT * FROM User WHERE pseudo = '$pseudo' AND passwrd = '$passwrd'";
        $query = $this->getConnexionDbb()->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
}