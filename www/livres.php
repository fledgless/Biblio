<?php 

require_once "Livre.class.php";

$l1 = new Livre(1, "apprendre-css.png", "Apprendre le CSS", 200);
$l2 = new Livre(2, "apprendre-docker.png", "Apprendre Docker", 500);
$l3 = new Livre(3, "apprendre-java.png", "Apprendre le Java", 300);
$l4 = new Livre(4, "apprendre-php.png", "Apprendre le PHP", 350);
$l5 = new Livre(5, "apprendre-js.png", "Apprendre le Javascript", 500);
$l6 = new Livre(6, "apprendre-wordpress.png", "Apprendre Wordpress", 400);

require_once "LivreManager.class.php";
$livreManager = new LivreManager;

$livreManager->ajouterLivre($l1);
$livreManager->ajouterLivre($l2);
$livreManager->ajouterLivre($l3);
$livreManager->ajouterLivre($l4);
$livreManager->ajouterLivre($l5);
$livreManager->ajouterLivre($l6);



?>

<?php ob_start() ?>

<table class="table table-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    $livresEnCours = $livreManager->getLivres();
    foreach($livresEnCours as $livre) : ?>
    <tr>
        <td class="align-middle"><img src="public\images\<?php echo $livre->getImage(); ?>" height="60px" alt="Livre pour <?php echo $livre->getImage(); ?>"></td>
        <td class="align-middle"><?php echo $livre->getTitre(); ?></td>
        <td class="align-middle"><?php echo $livre->getNbPages(); ?></td>
        <td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endforeach ?>
</table>
<a href="#" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Livres";
$content = ob_get_clean();
require_once "template.php";