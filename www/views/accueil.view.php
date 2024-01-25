<?php ob_start() ?>

<?php
foreach ($livresAll as $livre) : ?>
 <div class="card mb-3">
        <h3 class="card-header text-white bg-primary"><?php echo $livre->getTitre(); ?></h3>
            <img src="<?= SITE_URL ?>public/images/<?= $livre->getImage(); ?>" height="100%" alt="Livre pour <?= $livre->getTitre(); ?>">
        <div class="card-body">
          <p class="card-text">Extrait : <?= $livre->getExcerpt(); ?></p>
        </div>
        <div class="card-body bg-secondary text-white">
            <p>Nombre de pages : <?php echo $livre->getNbPages() ?>
            <p>Auteur : <?php echo $livre->getUploader() ?>
        </div>
        <div class="card-footer text-white bg-primary">
            2 days ago
        </div>
    </div>
<?php endforeach; ?>

<?php
$titre = "Tous vos livres";
$content = ob_get_clean();
require "template.view.php";
