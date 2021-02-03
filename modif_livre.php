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
            <h1 class="h2">Gestion des livres</h1>
          </div>
          <h2>Blahblahblah</h2>
          <?php
            $livreId = $_GET['id'];
            if (!isset($_GET['id']) || !preg_match("/L[0-9]{3}/", $_GET['id'])){
              die("Mauvais ID");
            }

            require("connect.php");

            $linker = connect();
            $livre_infos = 'SELECT titreLivre, nomCollection, nomEditeur, nomAuteur, prenomAuteur, idAuteur FROM livre natural join collection natural join editeur natural join ecrit_par natural join auteur where idLivre = ?';
            $auteurs = 'SELECT * from auteur';

            $stmt = $linker->prepare($livre_infos);
            $stmt->execute(array($livreId));

            $livre = $stmt->fetch();
          ?>
          <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">#</span>
          <input type="text" class="form-control" placeholder="<?php echo $livreId ?>" aria-label="<?php echo $livreId ?>" aria-describedby="basic-addon1" disabled>
          </div>

          <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $livre['titreLivre'] ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Auteurs</span>
            <ul class="list-group" style="max-height: 30vh; overflow: scroll;">
              <?php
                foreach ($linker->query($auteurs) as $row){
                  $auteur_id = $row['idAuteur'];

                  echo '<li class="list-group-item">';
                  if ($auteur_id == $livre['idAuteur'])
                    echo '<input class="form-check-input me-1" type="checkbox" value="" aria-label="..." checked>';
                  else
                    echo '<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">';

                  echo $row['prenomAuteur'] . ' ' . $row['nomAuteur'];
                  echo '</li>';
                }

                $linker = null;
              ?>
            </ul>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Collection</span>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
         </div>

         <div class="input-group mb-3">
           <span class="input-group-text" id="basic-addon3">Editeur</span>
           <select class="form-select" aria-label="Default select example">
             <option selected>Open this select menu</option>
             <option value="1">One</option>
             <option value="2">Two</option>
             <option value="3">Three</option>
           </select>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>
        </main>
      </div>
    </div>
  </body>
</html>
