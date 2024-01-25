<?php ob_start() ?>

<ul class="list-group">
  <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
    Pseudo :
    <span class="badge bg-primary rounded-pill">
        <?= $_SESSION['user']['pseudo'] ?>
    </span>
  </li>
  <li class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">
    Mot de passe :
    <span class="badge bg-primary rounded-pill">
        <? // = $userEnCours->getPasswrd() ?>
    </span>
  </li>
  <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
    Email : 
    <span class="badge bg-primary rounded-pill">
        <?= $_SESSION['user']['email'] ?>
    </span>
  </li><li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
    Adresse :
    <span class="badge bg-primary rounded-pill">
        <?= $_SESSION['user']['adresse'] ?>
    </span>
  </li>
</ul>

<?php
$titre = "Profil";
$content = ob_get_clean();
require_once "template.view.php";
