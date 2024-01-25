<?php ob_start() ?>

<form class="m-auto w-50" method="POST" action="<?= SITE_URL ?>livres/av" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <label for="exampleInputIdentifiant" class="form-label mt-4">Titre</label>
            <input type="text" name="titre" class="form-control" id="exampleInputtitre" aria-describedby="titreHelp" placeholder="titre du livre">
        </div>
        <div class="form-group">
            <label for="exampleInputNbPages" class="form-label mt-4">Nombre de pages</label>
            <input type="number" name="nbPages" class="form-control" id="exampleInputNbPages" placeholder="Nombre de pages">
        </div>

        <div class="form-group">
            <label for="exampleInputImage" class="form-label mt-4">Votre image</label>
            <input type="file" name="image" class="form-control" id="exampleInputImages">
        </div>
        <div class="form-group" data-quillbot-parent="O5rdH0_a-OnjtBR0O50vU">
            <label for="exampleTextarea" class="form-label mt-4">Extrait</label>
            <textarea name="excerpt" class="form-control" id="exampleTextarea" rows="5" data-gramm="false" wt-ignore-input="true" style="height: 75px;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
    </fieldset>
</form>

<?php
$titre = "Ajout d'un livre";
$content = ob_get_clean();
require_once "template.view.php";
