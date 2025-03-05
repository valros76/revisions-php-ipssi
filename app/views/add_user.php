<?php
$headTitle = "Ajouter un utilisateur";
$pageTitle = "Ajouter un utilisateur";
ob_start();
?>
<section class="main-sections">
  <article class="main-articles">
    <h2 class="main-sections-title">
      Un nouvel utilisateur ?
    </h2>
    <form action="/users/add" method="POST">
      <label for="pseudo">
        Pseudo
      </label>
      <input type="text" name="pseudo" required/>
      <label for="password">
        Mot de passe
      </label>
      <input type="password" name="password" required/>
      <button type="submit">
        Ajouter
      </button>
    </form>
  </article>
</section>
<?php
$mainContent = ob_get_clean();
