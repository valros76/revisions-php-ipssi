<?php
$headTitle = "Accueil de IPSSI PHP";
$pageTitle = "Accueil";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
  <h2 class="main-sections-title">
    Liste des utilisateurs
  </h2>
  <?php if (!$users): ?>
    <p>
      Il n'y a pas d'utilisateurs dans la base de données.
    </p>
  <?php else: ?>
    <ul>
      <?php foreach ($users as $user): ?>
        <li>
          <ul>
            <li>
              ID : <?= $user->id ?>
            </li>
            <li>
              Pseudo : <?= $user->pseudo ?>
            </li>
            <li>
              Date d'inscription : <?= $user->inscription_date ?>
            </li>
          </ul>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
  </article>
</section>
<?php
$mainContent = ob_get_clean();
