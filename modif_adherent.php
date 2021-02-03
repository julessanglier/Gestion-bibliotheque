<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

    <link rel="stylesheet" src="dashboard.css">
    <title>Gestion bibliotheque</title>
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Bibliothèque d'Orléans</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="book"></span>
                  Livres
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Empreints
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Adhérents
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="book"></span>
                  Collections
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="book"></span>
                  Auteurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="book"></span>
                  Editeurs
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion adhérents</h1>
          </div>
          <h2>Mise à jour</h2>
          <?php
            $adh_id = $_GET['id'];
            if (!isset($_GET['id']) || !preg_match("/H[0-9]{3}/", $_GET['id'])){
              die("ID d'adhérent mal saisi ou au mauvais fortmat");
            }

            require("connect.php");
           ?>
          <form class="row g-3">
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">#</label>
              <input type="email" class="form-control" id="inputId" disabled>
            </div>
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputMail">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Nom</label>
              <input type="text" class="form-control" id="inputNom">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="inputPrenom">
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Ville</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">CP</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
        </form>
        </main>
      </div>
    </div>
  </body>
</html>
