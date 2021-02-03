<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
          <h2>Tableau répertoriant tous les livres</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Reference</th>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Collection</th>
                  <th>Editeur</th>
                  <th>Emprunté</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require("connect.php");
                  
                  $linker = connect();
                  $sql = 'SELECT idLivre, titreLivre, nomCollection, nomEditeur, nomAuteur, prenomAuteur FROM livre natural join collection natural join editeur natural join ecrit_par natural join auteur';
                  if (!$linker->query($sql))
                    echo "Pb d'accès à la table livres";
                  else{
                    $livres = Array();
                    foreach($linker->query($sql) as $row){
                      $livres = $row;
                      echo '<tr>';
                      echo '<td><a href="modif_livre.php?id=' .$row['idLivre'].'">' . $row['idLivre'].'</a></td>';
                      echo '<td>' . $row['titreLivre'].'</td>';
                      echo '<td>' . $row['nomAuteur']. ' ' . $row['prenomAuteur']. '</td>'; //Auteur(s)
                      echo '<td>' .$row['nomCollection']. '</td>'; //Collection
                      echo '<td>'. $row['nomEditeur'].'</td>'; //Editeur
                      echo '<td>Oui</td>'; //Emprunté ?
                      echo '<tr>';
                    }
                    //var_dump($livres);
                  }
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
