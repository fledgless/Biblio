<?php
require_once "models/ConnexionManager.class.php";
require_once "models/Livre.class.php";

class LivreManager extends ConnexionManager 
{
    private array $livres;

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

    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array {
        return $this->livres;
    }
}