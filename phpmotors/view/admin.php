<!DOCTYPE html>

<?php

if (!isset($_SESSION['loggedin'])) {


    header('Location:/phpmotors/');
    exit;
    // do something here if the value is FALSE
    // The exclamation mark is a "negation" operator
    // By adding it the resulting test is reversed
    // This test is now "If Session loggedin value is NOT true"
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
</head>

<body>
   
   

    <!-- <nav>
        <ul class="active">
          <li class="grow"><a class="nav" href="homepage.php">Home</a></li>
          <li class="grow"><a class="nav" href="navlink">Classic</a></li>
          <li class="grow"><a class="nav" href="navlink">Sports</a></li>
          <li class="grow"><a class="nav" href="navlink">SUV</a></li>
          <li class="grow"><a class="nav" href="navlink">Trucks</a></li>
          <li class="grow"><a class="nav" href="navlink">Used</a></li>
        </ul>
      </nav> -->
    <main>
   
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    

    <nav>
        <?php echo $navList; ?>
    </nav>
        <!-- <h1> <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' .  $_SESSION['clientData']['clientlastname']; ?> </h1> -->

        <ul>
            <li> First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
            <li> Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
            <li> Email Address: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            <li> Client Level: <?php echo $_SESSION['clientData']['clientLevel']; ?></li>



        </ul>

        <?php if ($_SESSION['clientData']['clientLevel'] > 1) { ?>

            <h3>Inventory Management</h3>
            
            <p> Use this Link to manage the inventory <?php ?></p>

            <p><a href="/phpmotors/vehicles/"> Vehicles Management </a></p>;
        <?php
        } ?>
         <hr>
         <a href='/phpmotors/accounts?action=update'> Manage Account</a>

         <h3>Your Reviews</h3>
        <?php echo $reviewHTML; ?>
    
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>

        
    
    </main>

   
</body>

</html>



