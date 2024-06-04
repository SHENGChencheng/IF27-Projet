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
                <input type="hidden" name="action" value="listeDispo">
                <label for="listePraticien">selection d'un praticien</label>
                <select name="listePraticien" id="listePraticien" class="form-control">
                    <?php
                    foreach($results as $praticien){
                        printf("<option value='%d'>%s %s</option>", $praticien["id"], $praticien["nom"], $praticien["prenom"]);
                    }
                    ?>
                    
            </select>
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>