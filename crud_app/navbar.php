<!-- partie navbar utiliser comme une partie applleé par defaut dans des autre page -->
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">App Crud</a><!--champs a gauche peut l'envoyer vers des liens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="view.php">Home</a><!--retoure vers la page des listes view -->
        </li>
        <li class="nav-item">
          <a class="nav-link active"  aria-current="page" href="Ajouter.php">Ajouter un Apprenant</a><!--retoure vers la page d'ajouter apprenant ajout-->
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Déconnexion</a><!--retoure vers la page home de connexion pour changer user -->
        </li>
      </ul>
      <span class="navbar-text"><!-- champ a droit -->
      Military Academie
      </span>
    </div>
  </div>
</nav>