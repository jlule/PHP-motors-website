<?php

if ($_SESSION['clientData']['clientLevel'] < 2 ){
  header("Location: /phpmotors/");

}


?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Vehicle Management</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <script src="/phpmotors/date.js"></script>
  </head>
  <body>
    <main>
      
        <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/header.php'; ?>
    
      <!-- <nav>
        <ul class="active">
          <li class="grow"><a class="nav" href='/phpmotors/view/home.php'>Home</a></li>
          <li class="grow"><a class="nav" href="navlink">Classic</a></li>
          <li class="grow"><a class="nav" href="navlink">Sports</a></li>
          <li class="grow"><a class="nav" href="navlink">SUV</a></li>
          <li class="grow"><a class="nav" href="navlink">Trucks</a></li>
          <li class="grow"><a class="nav" href="navlink">Used</a></li>
        </ul>
      </nav> -->

      <nav>
        <?php echo $navList; ?>
    </nav>

      



      <h2>Register</h2>

      
        <h1>Vehicle Management </h1>
        <ul>
            <li> <a href='/phpmotors/vehicles/?action=displayaddclassificationform'>Add Classification</a></li>
            <li> <a href='/phpmotors/vehicles/?action=displayaddvehicleform'> Add Vehicle</a></li>

        </ul>

        <?php
          if (isset($message)) { 
          echo $message; 
          } 
          if (isset($classificationList)) { 
          echo '<h2>Vehicles By Classification</h2>'; 
          echo '<p>Choose a classification to see those vehicles</p>'; 
          echo $classificationList; 
          }
         ?>

         <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
          </noscript>

          <table id="inventoryDisplay"></table>

          <script src="../main_inventory.js/inventory.js"></script>

    


    
      <div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
  
</html>