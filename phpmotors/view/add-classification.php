<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Add Classification</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <script src="/phpmotors/date.js"></script>
  </head>
  <body>
    <main>
      <header>
           <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/header.php'; ?>

      </header>
     

      <nav>
          <?php
            echo  $navList;
          ?>
      </nav>

      <h2>Add Classification</h2>
      <?php

        if (isset($message)) {
            echo $message;
        }

        ?>

        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="carClassification">Classification Name </label><br>
            <input type="text" name="classificationName" id="carClassification" required> <br>


            <input type="submit" value="Add Classification">
            <input type="hidden" name="action" value="addClassification">

        </form>


      

    
      <div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>