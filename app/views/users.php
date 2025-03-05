<?php
$headTitle = "Utilisateurs";
$pageTitle = "Utilisateurs";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-sections-title">
      Liste des utilisateurs
    </h2>
    <nav>
      <a href="/users/add" class="cta-links">Ajouter</a>
    </nav>
    <?php if (!$users): ?>
      <p>
        Il n'y a pas d'utilisateurs dans la base de données.
      </p>
    <?php else: ?>
      <ul>
        <?php foreach ($users as $user): ?>
          <li class="border-card">
          Pseudo : <?= $user->pseudo ?>
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
            <aside class="cta-container">
              <form action="/users/update" method="POST">
                <input type="hidden" value="<?= $user->id ?>" name="id">
                <button type="submit" class="cta">
                  Modifier
                </button>
              </form>
              <form action="/users/delete" method="POST">
                <input type="hidden" value="<?= $user->id; ?>" name="id">
                <button type="submit" class="cta">
                  Supprimer
                </button>
              </form>
            </aside>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
  </article>
</section>
<?php
$mainContent = ob_get_clean();
