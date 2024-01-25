<?php
require_once "models/livres/LivreManager.class.php";
require_once "models/utils/Utils.class.php";

class LivresController extends Utils
{
    private $livresManager;

    public function __construct()
    {
        // logique "vue" livres
        $this->livresManager = new LivreManager;
        if (isset($_SESSION['user'])) {
            $id_user = $_SESSION['user']['id'];
            $this->livresManager->chargementLivres($id_user);
        }
    }

    public function afficherLivresAll()
    {
        $livresAll = $this->livresManager->getAllLivres();
        require "views/accueil.view.php";
    }

    public function afficherPageError()
    {
        require "views/error.view.php";
    }

    public function afficherLivres()
    {
        // $livreEnCours = $this->livresManager;
        $livresEnCours = $this->livresManager->getLivres();
        require_once "views/livres.view.php";
    }

    public function afficherLivre($id_livre)
    {
        $livreEnCours = $this->livresManager->getLivreById($id_livre);
        require ($livreEnCours != null) ? "views/afficherLivre.view.php" : "views/error.view.php";
    }

    public function ajoutLivre()
    {
        require "views/afficherAjoutLivre.view.php";
    }

    public function ajoutLivreValidation()
    {
        $image = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImage = Utils::uploadFile($image, $repertoire);
        $this->livresManager->ajoutLivreBdd($_POST['titre'], intval($_POST['nbPages']), $nomImage, $_POST['excerpt'], $_SESSION['user']['id']);
        header('location: ' . SITE_URL . 'livres');
    }

    public function modifierLivre($id_livre) {
        $livre = $this->livresManager->getLivreById($id_livre);
        require "views/afficherModificationLivre.view.php";
    }

    public function modifierLivreValidation() {
        $imageActuelle = $this->livresManager->getLivreById(intval($_POST['id_livre']))->getImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            unlink("public/images/" . $imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = Utils::uploadFile($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }

        $this->livresManager->modifierLivreBdd(intval($_POST['id_livre']), $_POST['titre'], intval($_POST['nbPages']), $nomImageToAdd, $_POST['excerpt'], $_SESSION['user']['id']);
        header("location: " . SITE_URL . "livres");
    }

    public function supprimerLivre($id_livre) {
        $nomImage = $this->livresManager->getLivreById($id_livre)->getImage();
        unlink("public/images/" . $nomImage);
        $this->livresManager->supprimerLivreBdd($id_livre);
        header('location: ' . SITE_URL . 'livres');
    }

    // public function ajoutFile($file, $dir)
    // {
    //     Utils::uploadFile($file, $dir);
    // }
}
