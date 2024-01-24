<?php ob_start() ?>

<div class="card card-livre mb-3">
    <h3 class="card-header"><?= $userEnCours->getPseudo() ?></h3>
    <div class="card-image">
        <img src="<?= SITE_URL ?>public/images/<?php echo $livreEnCours->getImage(); ?>" class="d-block mt-2 mx-auto" height="300" width="auto" alt="Livre pour <?php echo $livreEnCours->getTitre(); ?>">
    </div>
    <div class="card-body">
        <a href="#" class="card-link">Modifier</a>
    </div>
    <div class="card-footer text-muted">
        <p>Nombre de pages : <?= $livreEnCours->getNbPages() ?></p>
    </div>
</div>

<ul class="list-group">
  <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
    Pseudo :
    <span class="badge bg-primary rounded-pill"><?= $userEnCours->getPseudo() ?></span>
  </li>
  <li class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">
    Mot de passe :
    <span class="badge bg-primary rounded-pill"><?= $userEnCours->getPasswrd() ?></span>
  </li>
  <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
    Email : 
    <span class="badge bg-primary rounded-pill"><?= $userEnCours->getEmail() ?></span>
  </li><li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
    Adresse :
    <span class="badge bg-primary rounded-pill"><?= $userEnCours->getAdresse() ?></span>
  </li>
</ul>

<?php
$titre = "Profil";
$content = ob_get_clean();
require_once "template.view.php";
