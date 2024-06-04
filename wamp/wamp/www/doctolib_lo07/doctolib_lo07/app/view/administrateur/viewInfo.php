<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
    <h2>affichage de la liste des spécialités </h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">Label</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($result1 as $element) {
              echo "<tr>";
              foreach ($element as $value) {
                  echo "<td>$value</td>";
              }
              echo "</tr>";
          }
          ?>
      </tbody>
    </table>
    <br>
    <hr>

    <h2>affichage de la liste des praticiens </h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($result2 as $element) {
              echo "<tr>";
              foreach ($element as $value) {
                  echo "<td>$value</td>";
              }
              echo "</tr>";
          }
          ?>
      </tbody>
    </table>



    <hr>

    <h2>affichage de la liste des patients </h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($result3 as $element) {
              echo "<tr>";
              foreach ($element as $value) {
                  echo "<td>$value</td>";
              }
              echo "</tr>";
          }
          ?>
      </tbody>
    </table>

    <hr>

    <h2>affichage de la liste des administrateurs </h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($result4 as $element) {
              echo "<tr>";
              foreach ($element as $value) {
                  echo "<td>$value</td>";
              }
              echo "</tr>";
          }
          ?>
      </tbody>
    </table>


    <hr>

    <h2>affichage de la liste des rendez-vous</h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">patient_id</th>
          <th scope = "col">praticien_id</th>
          <th scope = "col">rdv_date</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($result5 as $element) {
              echo "<tr>";
              foreach ($element as $value) {
                  echo "<td>$value</td>";
              }
              echo "</tr>";
          }
          ?>
      </tbody>
    </table>



  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->