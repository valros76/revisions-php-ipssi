<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $headTitle ?? "Projet PHP IPSSI" ?>
  </title>
  <link rel="stylesheet" href="public/sources/css/style.css">
</head>
<body>
  <header class="main-head">
    <h1 class="main-head-title">
      <?= $pageTitle ?? "Projet PHP IPSSI (Je suis la valeur par défaut du global_template)" ?>
    </h1>
  </header>

  <main class="main-content">
    <?= $mainContent ?? ErrorController::showError("404") ?>
  </main>

  <footer class="main-foot">
    <p class="copyright">
      © Webdevoo - 2025
    </p>
  </footer>
</body>
</html>