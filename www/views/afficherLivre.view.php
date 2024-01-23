<?php ob_start() ?>

    <div class="card mb-3">
        <h3 class="card-header text-white bg-primary"><?php echo $livreEnCours->getTitre(); ?></h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-block bg-secondary user-select-none" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
            <img src="<?= SITE_URL ?>public/images/<?= $livreEnCours->getImage(); ?>" height="100%" alt="Livre pour <?= $livreEnCours->getTitre(); ?>">
        </svg>
        <div class="card-body">
          <p class="card-text">Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro totam ea rerum, est impedit tenetur corporis, ut officiis culpa harum sequi ipsa reprehenderit laboriosam atque provident nihil officia magni quidem.</p>
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
