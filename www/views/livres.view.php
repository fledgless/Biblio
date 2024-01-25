<?php

// logique
if (!isset($_SESSION['user'])) header("location: connexion")

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
    foreach ($livresEnCours as $livre) : ?>
        <tr>
            <td class="align-middle"><img src="<?= SITE_URL ?>public/images/<?php echo $livre->getImage(); ?>" height="60px" alt="Livre pour <?php echo $livre->getTitre(); ?>"></td>
            <td class="align-middle"><a href="<?= SITE_URL ?>livres/l/<?php echo $livre->getId(); ?>"><?php echo $livre->getTitre(); ?></a></td>
            <td class="align-middle"><?php echo $livre->getNbPages(); ?></td>
            <td class="align-middle"><a href="<?= SITE_URL ?>livres/m/<?php echo $livre->getId(); ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form action="<?= SITE_URL ?>livres/s/<?php echo $livre->getId(); ?>" method="post" onsubmit="return confirm('Voulez-vous supprimer ce livre ?')">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="<?= SITE_URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Gestion de vos livres";
$content = ob_get_clean();
require_once("template.view.php");
