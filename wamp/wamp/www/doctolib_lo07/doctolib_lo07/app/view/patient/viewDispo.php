<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenuPatient.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <form action="router2.php" role="form" method="post">
            <div class="form-group">
                <input type="hidden" name="action" value="insertPatientRdv">
                <input type="hidden" name="praticien_id" value='<?php echo $praticien_id;?>'>
                
                <label class="form-label" for="listeDispo">selection d'un rendez-vous</label>
                <select name="listeDispo" id="listeDispo" class="form-control">
                    <?php
                    foreach($results as $rendezvous){
                        printf("<option value='%s'>%s</option>", $rendezvous[0], $rendezvous[0]);
                    }
                    ?>
                    
            </select>
            </div>
            <button class="btn btn-primary m-3" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>