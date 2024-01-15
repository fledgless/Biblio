<?php ob_start() ?>


<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, quam doloribus. Ipsum aspernatur ratione voluptas minima possimus quod quasi deleniti odio accusantium, ea molestias officiis adipisci recusandae, obcaecati nam nisi?</p>

<?php
$titre = "Accueil";
$content = ob_get_clean();
require_once "template.php";