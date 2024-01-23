<?php
require_once "models/ConnexionManager.class.php";
require_once "models/Livre.class.php";

class LivreManager extends ConnexionManager 
{
    private array $livres = [];

    public function ajouterLivre($nouveauLivre) 
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres($id_user) {
        $connexion = $this->getConnexionDbb();
        $req = $connexion->prepare("SELECT * FROM livre where id_user = $id_user");
        $req->execute();
        $livresImportes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($livresImportes as $livre) {
           $nouveauLivre = new Livre($livre['id_livre'], $livre['image'], $livre['titre'], $livre['nb_pages']);
           $this->ajouterLivre($nouveauLivre);
        }
    }

    public function chargementLivresComplet() {
        $connexion = $this->getConnexionDbb();
        $req = $connexion->prepare("SELECT * FROM livre LEFT JOIN User ON livre.id_user = User.id_user");
        $req->execute();
        $livresImportes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->livres = [];

        foreach($livresImportes as $livre) {
           $nouveauLivre = new Livre($livre['id_livre'], $livre['image'], $livre['titre'], $livre['nb_pages'], $livre['pseudo'] != null ? $livre['pseudo'] : "Pas d'uploader");
           $this->ajouterLivre($nouveauLivre);
        }

        return $this->livres;
    }

    public function getLivreById($id_livre) {
        foreach($this->livres as $livre) {
            if ($livre->getId() === $id_livre) {
                return $livre;
            }
        }
    }

    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array {
        return $this->livres;
    }
}