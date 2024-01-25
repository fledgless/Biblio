<?php ob_start() ?>

<form class="m-auto w-50" method="POST" action="<?= SITE_URL ?>livres/mv" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <label for="exampleInputIdentifiant" class="form-label mt-4">Titre</label>
            <input type="text" value="<?= $livre->getTitre() ?>" name="titre" class="form-control" id="exampleInputtitre" aria-describedby="titreHelp" placeholder="titre du livre">
        </div>
        <div class="form-group">
            <label for="exampleInputNbPages" class="form-label mt-4">Nombre de pages</label>
            <input type="number" value="<?= $livre->getNbPages() ?>" name="nbPages" class="form-control" id="exampleInputNbPages" placeholder="Nombre de pages">
        </div>
        <div class="form-group">
            <label for="exampleInputImage" class="form-label mt-4">Votre image</label>
            <input type="file" name="image" class="form-control" id="exampleInputImages">
        </div>

        <img src="<?= SITE_URL ?>public/images/<?= $livre->getImage() ?>" style="height: 200px; margin-top: 24px;" alt="">

        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Extrait</label>
            <textarea name="excerpt" class="form-control" id="exampleTextarea" rows="5" data-gramm="false" wt-ignore-input="true" style="height: 75px; resize: none;"><?= $livre->getExcerpt() ?></textarea>
        </div>

        <input type="hidden" value="<?= $livre->getId() ?>" name="id_livre">
        <button type="submit" class="btn btn-primary mt-4">Modifier</button>
    </fieldset>
</form>

<?php
$titre = "Modifier un livre";
$content = ob_get_clean();
require_once "template.view.php";
