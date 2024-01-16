<?php ob_start() ?>

<?php
$titre = "A-propos";
$content = ob_get_clean();
require_once "template.view.php";