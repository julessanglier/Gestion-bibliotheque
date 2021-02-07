<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" src="dashboard.css">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Bibliothèque d'Orléans</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Déconnexion</a>
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
                <a class="nav-link" href="index.php?id=liste-adherents">
                  <span data-feather="users"></span>
                  Adhérents
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?id=liste-auteurs">
                  <span data-feather="coffee"></span>
                  Auteurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?id=liste-editeurs">
                  <span data-feather="truck"></span>
                  Editeurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?id=liste-emprunts">
                  <span data-feather="file"></span>
                  Emprunts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?id=liste-livres">
                  <span data-feather="book"></span>
                  Livres
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <!--<h1 class="h2">Dashboard</h1>!-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <?php for ($i = 0; $i < sizeof($breadcrumbs); $i++): ?>
                  <?php $bcelem = $breadcrumbs[$i] ?>
                  <?php if ($i == (sizeof($breadcrumbs) -1)): ?>
                    <li class="breadcrumb-item active" <a href="<?php echo $bcelem['link'] ?>" aria-current="page"><?php echo $bcelem['page'] ?></li>
                  <?php else: ?>
                    <li class="breadcrumb-item"><a href="<?php echo $bcelem['link'] ?>"><?php echo $bcelem['page'] ?></a></li>
                  <?php endif; ?>
                  <!--<li class="breadcrumb-item active" aria-current="page">Library</li>!-->
                <?php endfor; ?>
              </ol>
          </nav>
          </div>
          <?php echo $content; ?>
        </main>
      </div>
    </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
  </body>
</html>
