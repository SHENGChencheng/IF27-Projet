<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenuIndex.php';
      include $root . 'app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <form action="router2.php" role="form" method="post">
        <input type="hidden" name="action" value="Login">
            <label class="form-label" for="login" >login</label>
            <input class="form-control" type="text" name="login" placeholder="login" required><br>
            <label class="form-label" for="password">password</label>
            <input class="form-control" type="password" name="password" required>
            <button class="btn btn-primary" type="submit">envoyer</button>
        </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>