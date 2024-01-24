<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/livres/Livre.class.php";

class LivreManager extends ConnexionManager
{
    private array $livres = [];

    public function ajouterLivre($nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres($id_user)
    {

        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre where id_user=$id_user");
        $req->execute();
        $livresImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($livresImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages'], $livre['excerpt']);
            $this->ajouterLivre($nouveauLivre);
        }
    }

    public function getAllLivres()
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * from livre l left join User u on l.id_user = u.id_user");
        $req->execute();
        $livresImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->livres = [];
        foreach ($livresImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages'], $livre['excerpt'], $livre['pseudo'] != null ? $livre['pseudo'] : "Pas d'uploader");
            $this->ajouterLivre($nouveauLivre);
        }

        return $this->livres;
    }

    public function getLivreById($id_livre)
    {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $id_livre) {
                return $livre;
            }
        }
    }

    public function ajoutLivreBdd($titre, $nbPages, $nomImage, $excerpt, $id_user)
    {
        $req = "INSERT INTO biblio.livre (titre, nb_pages, image, excerpt, id_user) VALUES(:titre, :nb_pages, :image,  :excerpt, :id_user)";
        $stmt = $this->getConnexionBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nb_pages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $nomImage, PDO::PARAM_STR);
        $stmt->bindValue(":excerpt", $excerpt, PDO::PARAM_STR);
        $stmt->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultat =  $stmt->execute();
        $stmt->closeCursor();
    }


    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array
    {
        return $this->livres;
    }
}
