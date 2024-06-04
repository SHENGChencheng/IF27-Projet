<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenuPraticien.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <form action="router2.php" role="form" method="post">
            <div class="form-group">
                <input type="hidden" name="action" value="insertPraticienDispo">
                <label class="form-label" for="dateRdv">entrez la date du rendez-vous</label>
                <input type="date" class='form-control' name='dateRdv'>
                <label class="form-label" for="nbreRdv">entrez le nombre de rendez-vous</label>
                <input type="number" max=10 min=1 class='form-control' name='nbreRdv'>   
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>