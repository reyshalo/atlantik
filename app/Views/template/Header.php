<head>
  <title>Accueil Atlantik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="tarifliaison/">tarif liaison</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="enregistrer/">créer un compte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="horairetraverser/">horaire traverser</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="historiquereserve/">afficher historique</a>
      </li>
      <?php
      $session = \Config\Services::session();?>
    </ul>
  </div>
</nav>

</body>
</html>