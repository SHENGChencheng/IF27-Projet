<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenuPatient.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <form action='router2.php' role="form" method="POST">
            <div class="form-group">
                <input type="hidden" name="action" value="getSpecialite"><br>
                <label for="specialite">rechercher une spécialité</label>
                <input type="text" class="form-label" name="specialite" placeholder="rechercher..">
                
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>