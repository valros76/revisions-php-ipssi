<?php
$headTitle = "Erreur du serveur";
$pageTitle = "Erreur 500";
ob_start();
?>
  <section class="main-sections error-sections">
    <h2 class="main-sections-title error-sections-title">
      Erreur 500
    </h2>
    <p>
      Le serveur est indiponible ou une erreur s'est produite lors de la transaction avec ce dernier.
    </p>
    <a href="/" class="cta-links">
      Retour à l'accueil
    </a>
  </section>
<?php
$mainContent = ob_get_clean();