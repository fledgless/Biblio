<?php ob_start(); ?>
<?php
require_once "Livre.class.php";
require_once "LivreManager.class.php"; 
$livreManager = new LivreManager;
$livreManager->chargementLivres();
?>

<?php 
    $livresEnCours = $livreManager->getLivres(); 
    if (isset($_SESSION['user'])) :?>
    <?php foreach($livresEnCours as $livre) : ?>
    <div class="card mb-3">
        <h3 class="card-header text-white bg-primary"><?php echo $livre->getTitre(); ?></h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-block bg-secondary user-select-none" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
            <img src="www\public\images\<?= $livre->getImage(); ?>" height="100%" alt="Livre pour <?= $livre->getTitre(); ?>">
        </svg>
        <div class="card-body">
          <p class="card-text">Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro totam ea rerum, est impedit tenetur corporis, ut officiis culpa harum sequi ipsa reprehenderit laboriosam atque provident nihil officia magni quidem.</p>
        </div>
        <div class="card-body bg-secondary text-white">
            <p>Nombre de pages : <?php echo $livre->getNbPages() ?>
        </div>
        <div class="card-footer text-white bg-primary">
            2 days ago
        </div>
    </div>
    <?php endforeach;
    endif; 
    if (!isset($_SESSION['user'])) :?>
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">Pas de livre à afficher.</div>
            <div class="card-body bg-danger">
                <h4 class="card-title">Ressource non disponible.</h4>
                <p class="card-text">Veuillez vous <a class="text-warning" href="connexion">connecter</a> pour accéder à vos livres.</p>
            </div>
        </div>
    <?php endif ?>

<?php
$titre = "Vos livres";
$content = ob_get_clean();
require_once "template.view.php";