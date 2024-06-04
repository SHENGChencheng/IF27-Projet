<!-- ----- début viewInserted -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenuIndex.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    
    ?>
      
        <form action="router2.php" method="post">
            <input type='hidden' name='action' value='inscription'>
            <label for="nom" class="form-label">nom:</label>
            <input type="text" name="nom" id="nom"  class="form-control" required >
            <label for="prenom" class="form-label">prenom:</label>
            <input type="text" name="prenom" id="prenom" required class="form-control" >
            <label for="adresse" class="form-label">adresse:</label>
            <input type="text" name="adresse" id="adresse"  class="form-control" required >
            <label for="login" class="form-label">login:</label>
            <input type="text" name="login" id="login"  class="form-control" required >
            <label for="pass" class="form-label">password:</label><br>
            <input type="password" name="pass" id="pass"  class="form-control" required >
            <br><label><b>Votre statut:</b></label><br>
            <select name="statut" required class="form-control">
                <option value="0">administrateur</option>
                <option value="1">praticien</option>
                <option value="2" selected>patient</option>
            </select><br>
            <br><label><b>Votre spécialité si vous êtes praticien:</b></label><br>
            <select name="specialite" required class="form-control">
                <?php
                
                foreach($results as $specialite){
                    printf("<option value='%d'>%s</option>", $specialite["id"], $specialite["label"]);
                }
                
                ?>
            </select><br>
            <input type="submit" class="btn btn-primary">
        </form>
        
   </div>
    <?php
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
</body>
</html>
    <!-- ----- fin viewInserted -->    