<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <form action='router2.php' role="form" method="POST">
            <div class="form-group">
                <input type="hidden" name="action" value="insertSpecialite">
                <label for="specialite" class="form-label">entrez le nom de la spécialité</label><br>
                <input type="text" class="form-control" name="specialite" value="churigien dentiste">
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>