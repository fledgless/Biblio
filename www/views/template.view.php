<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site sur rien du tout">
    <meta name="keywords" content="livres, science-fiction">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- based ccs bootstrap by bootswatch -->
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>assets/styles/style.css">
    <title>Biblio | <?= $titre ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Biblio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= SITE_URL ?>livres">Livres</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL ?>a-propos">A propos</a>
                    </li>
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= SITE_URL ?>connexion">Se connecter</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= SITE_URL ?>deconnexion">Se déconnecter</a>
                        </li>
                    <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- <?php echo $content ?> -->
    <div id="container" class="m-2">
        <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-primary"><?= $titre ?></h1>
        <?= $content ?>
    </div>


    <!-- javascript bootstrap version 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>