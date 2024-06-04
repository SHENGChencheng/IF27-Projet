<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      if($results){
        echo"<h2>La specialité a été ajoutée</h2><br>";
      }
      else{
        echo"<h2>La specialité existe déja dans la table</h2><br>";
      }
    ?> 

      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>