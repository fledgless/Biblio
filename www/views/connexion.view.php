<?php 

require_once 'UserManager.class.php';
$userManager = new UserManager;

if(isset($_SESSION['user'])) {
    header('location: /');
}

if(isset($_POST['pseudo'])) {
    $userManager->setUser($_POST['pseudo'], $_POST['passwrd']); 
    $userEnCours = $userManager->getUser();
    if ($userEnCours != null) {
        foreach($userEnCours as $attribut => $valeur) {
            $_SESSION['user'][$attribut] = $valeur;
        }
    }
    header("location: livres");
}

?>

<?php ob_start() ?>

<p>Pour accéder à ce contenu, veuillez-vous connecter :</p>

<form method="post">
  <div class="form-group">
    <label class="form-label">Identifiant</label>
    <input type="text" name="pseudo" minlength="1" class="form-control">
  </div>
  <div class="form-group">
    <label class="form-label">Mot de passe</label>
    <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php
$titre = "Connexion";
$content = ob_get_clean();
require_once "template.view.php";