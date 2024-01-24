<?php

class Utils
{

    public static function uploadFile($file, $dir)
    {
        try {
            // récupération extension
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            // tableau d'extensions autorisées
            $extensionsValidesTab = ["jpg", "png", "gif", "jpeg", "webp"];
            // renommage fichier
            // $random = rand(0, 9999999999999);
            $random = time(); // timestamp
            $nomImage = $random . "_" . $file['name'];
            $target_file = $dir . $nomImage;

            // vérification image
            if (!isset($file['name']) || empty($file['name'])) throw new Exception("Vous devez sélectionner une image");

            // création du répertoire /images si inexistant
            if (!file_exists($dir)) mkdir($dir, 0777);

            // impossible dans notre cas
            if (file_exists($target_file)) throw new Exception("Le fichier existe déjà!");

            // poids image => 2Mo maxi
            // https://www.generationcyb.net/convertisseur-octet-ko-mo-go-to/
            if ($file['size'] > 2097152) throw new Exception("Le fichier est trop volumineux");

            // vérification extensions autorisées
            if (!in_array($extension, $extensionsValidesTab))  throw new Exception("L'extension $extension nest pas autorisée!");

            // erreur copie
            if (!move_uploaded_file($file['tmp_name'], $target_file))  throw new Exception("L'ajout de l'image n'a pas fonctionné!");

            else return $nomImage;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
