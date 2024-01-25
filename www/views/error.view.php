<?php ob_start() ?>

<p>désolé .........</p>

<?php
$titre = "contenu introuvable";
$content = ob_get_clean();
require_once "template.view.php";
