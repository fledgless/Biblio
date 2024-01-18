<?php
require_once "ConnexionManager.class.php";

class LivreManager extends ConnexionManager 
{
    private array $livres;

    public function ajouterLivre($nouveauLivre) 
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres() {
        $connexion = $this->getConnexionDbb();
        $req = $connexion->prepare("SELECT * FROM livre LIMIT 0,10");
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