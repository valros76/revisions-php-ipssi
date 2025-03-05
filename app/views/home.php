<?php
$headTitle = "Accueil de IPSSI PHP";
$pageTitle = "IPSSI PHP";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-sections-title">
      Bienvenue
    </h2>
    <p>
      Ce site est un projet fil rouge dédié aux révisions de PHP.
    </p>
    <p>
      Vous pouvez y retrouver des fonctionnalités comme :
    </p>
    <ul>
      <li>
        La visualisation d'une liste d'utilisateurs, provenant de la base de données.
      </li>
      <li>
        Un formulaire d'ajout d'utilisateur en base de données.
      </li>
      <li>
        Un formulaire de modification d'utilisateurs.
      </li>
      <li>
        Un bouton de suppression d'utilisateurs.
      </li>
    </ul>
  </article>
</section>
<?php
$mainContent = ob_get_clean();
