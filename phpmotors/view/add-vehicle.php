<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Add Vehicle</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <script src="/phpmotors/date.js"></script>
  </head>
  <body>
    <main>
      <header>
        <img
          class="logo"
          src="/phpmotors/images/site/logo.png"
          alt="logo"
        />
        <a class="account" href='/phpmotors/view/login.php'>My Account</a>
      </header>
  

      <nav>
          <?php echo $navList; ?>
      </nav>

      <h2>Add Vehicle</h2>
      <?php

if (isset($message)) {
    echo $message;
}


?>



<p class="center">Note, all fields are Required!</p>

<form action="/phpmotors/vehicles/" method="post">

<?php
echo buildClassificationList($classifications);
?>

    <br>

    <label for="invMake">Make</label>
    <input type="text" name="invMake" id="invMake" required> <br> <br>

    <label for="invModel">Model</label>
    <input type="text" name="invModel" id="invModel" required> <br><br>

    <label for="invDescription">Description</label>
    <textarea id="invDescription" name="invDescription"></textarea> <br><br>

    <label for="invImage">Image Path</label>
    <input type="text" name="invImage" id="invImage" value=" /phpmotors/images/no-image.png" required> <br><br>

    <label for="invThumbnail">Thumbnail Path</label>
    <input type="text"  name="invThumbnail" id="invThumbnail" value=" /phpmotors/images/no-image.png" required><br><br>

    <label for="invPrice">Price</label>
    <input type="text" name="invPrice" id="invPrice" required> <br><br>

    <label for="invStock"> # In Stock</label>
    <input type="text" name="invStock" id="invStock" required> <br><br>

    <label for="invColor">Color</label>
    <input type="text" name="invColor" id="invColor" required> <br><br>


    <input type="submit" value="Add Vehicle">
    <input type="hidden" name="action" value="addVehicle"> <br><br>


</form>   
    <div>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>