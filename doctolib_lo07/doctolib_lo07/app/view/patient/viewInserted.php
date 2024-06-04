<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenuPatient.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <h2>le rendez vous a été inséré</h2>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>