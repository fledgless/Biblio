<?php ob_start() ?>
<?php session_start();
if(isset($_GET['action']) && $_GET['action'] === "deconnexion") {
  session_destroy();
  header("location: connexion");
//   ne fonctionne pas, reste connecté même après avoir docker-compose down + suppression des images
} ?>

<?php
require_once 'User.class.php';
require_once 'SessionManager.class.php';

if($_POST) {
    $newSession = new SessionManager;
    $newSession->chargementUtilisateur();
    $newSession->verif($_POST['pseudo'], $_POST['passwrd']);
    header("location: livres");
    // connexion fonctionne, redirige vers livres
}

?>

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