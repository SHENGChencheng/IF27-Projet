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
                <input type="hidden" name="action" value="specialiteAffiche">
                <label for="listeId">selection d'un id de specialité</label>
                <select name="idSpecialite" id="idSpecialite" class="form-control">
                    <?php
                    foreach($results as $idSpecialite){
                        printf("<option value='%d'>%d</option>", $idSpecialite[0], $idSpecialite[0]);
                    }
                    ?>
                    
            </select>
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>