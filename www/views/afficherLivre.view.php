<?php ob_start() ?>

<div class="card mb-3">
        <h3 class="card-header text-white bg-primary"><?php echo $livreEnCours->getTitre(); ?></h3>
            <img src="<?= SITE_URL ?>public/images/<?= $livreEnCours->getImage(); ?>" height="100%" alt="Livre pour <?= $livreEnCours->getTitre(); ?>">
        <div class="card-body">
          <p class="card-text">Extrait : <?= $livreEnCours->getExcerpt(); ?></p>
        </div>
        <div class="card-body bg-secondary text-white">
            <p>Nombre de pages : <?php echo $livreEnCours->getNbPages() ?>
        </div>
        <div class="card-footer text-white bg-primary">
            2 days ago
        </div>
    </div>


<?php
$titre = $livreEnCours->getTitre();
$content = ob_get_clean();
require_once "template.view.php";
