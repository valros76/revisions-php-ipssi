<?php
$headTitle = "Modifier un utilisateur";
$pageTitle = "Modifier un utilisateur";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-sections-title">
      Un changement ?
    </h2>
    <form action="/users/apply-update" method="POST">
      <label for="pseudo">
        Pseudo
      </label>
      <input type="text" name="pseudo" required/>
      <label for="password">
        Mot de passe
      </label>
      <input type="password" name="password" required/>
      <input type="hidden" value="<?= $userID ?>" name="id">
      <button type="submit">
        Ajouter
      </button>
    </form>
  </article>
</section>
<?php
$mainContent = ob_get_clean();
