<?php 
require_once "models/ConnexionManager.class.php";
require_once "controllers/UsersController.controller.php";

if(isset($_SESSION['user'])) {
  header('location: /');
}

$userManager = new UserManager;
$usersController = new UsersController;
if (isset($_POST['pseudo'])) {
  $usersController->connexionUser($_POST['pseudo'], $_POST['passwrd']);
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