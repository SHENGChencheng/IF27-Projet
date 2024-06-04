<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=CaveAccueil">POUNA-DIFFO|PRATICIEN|<?php printf("%s %s",$_SESSION['prenom'],$_SESSION['nom']);?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">praticien</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=listeDisponibilite">liste de mes disponibilités</a></li>
            <li><a class="dropdown-item" href="router2.php?action=ajoutDispo">ajout d'une nouvelle disponibilité</a></li>
            <li><a class="dropdown-item" href="router2.php?action=listeRdvPraticien">liste de mes rendez-vous avec nom des patients</a></li>
            <li><a class="dropdown-item" href="router2.php?action=listePatient">liste de mes patients sans doublon</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=rechSpecialite">rechercher une spécialite</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=Login">login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=pageInscription">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router2.php?action=deconnexion">déconnexion</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav> 