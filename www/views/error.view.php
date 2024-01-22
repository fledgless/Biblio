<?php ob_start() ?>

<p>Désolé, le contenu demandé n'est pas disponible.</p>

<?php
$titre = "Erreur";
$content = ob_get_clean();
require_once "template.view.php";