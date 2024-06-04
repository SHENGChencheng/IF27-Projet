<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="router2.php?action=CaveAccueil">POUNA-DIFFO|PATIENT|<?php printf("%s %s",$_SESSION['prenom'],$_SESSION['nom']);?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">patient</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=infoCompte&statut=2">mon compte</a></li>
              <li><a class="dropdown-item" href="router2.php?action=listeRdv&statut=2">liste de mes rendez-vous</a></li>
              <li><a class="dropdown-item" href="router2.php?action=listePrat">prendre rendez-vous</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=rechSpecialite">rechercher une spécialite</a></li>
              
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
    </div>   
    
    
    
    <!-- ----- fin de la page cave_acceuil -->
  
  </body>
  </html>