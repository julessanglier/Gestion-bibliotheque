<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="signin.css" rel="stylesheet">
  </head>
  <body style="text-align:center;">
    <main class="form-signin">
      <?php if (isset($_GET['error'])): ?>
        <h3 style="color: red;">Erreur ..</h3>
      <?php endif; ?>
      <form action="controllers/c-login.php" method="POST">
        <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>
        <label for="inputEmail" class="visually-hidden">Adresse mail</label>
        <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Mdp</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
      </form>
    </main>

  </body>
</html>
