<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenuIndex.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <?php
    if($results){
       echo"vous avez été ajouté";
    }
    else{
        echo"Le login est déja utilisé";
    }
    ?>

  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>