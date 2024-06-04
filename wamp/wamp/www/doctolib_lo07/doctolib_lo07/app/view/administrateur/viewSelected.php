<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <h2>la spécialité selectionnée est <?php echo $results[1]?></h2>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>