<?php
$headTitle = "Une erreur s'est produite";
$pageTitle = "Erreur 404";
ob_start();
?>
  <section class="main-sections error-sections">
    <h2 class="main-sections-title error-sections-title">
      Erreur 404
    </h2>
    <p>
      Le contenu que vous avez demandé est introuvable.
    </p>
    <a href="/" class="cta-links">
      Retour à l'accueil
    </a>
  </section>
<?php
$mainContent = ob_get_clean();