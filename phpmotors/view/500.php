<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Server error Page</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <script src="/phpmotors/date.js"></script>
  </head>
  <body>
    <main>
      <header>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/header.php'; ?>
    
      </header>
      <nav>
        <ul class="active">
          <li class="grow"><a class="nav" href="homepage.php">Home</a></li>
          <li class="grow"><a class="nav" href="navlink">Classic</a></li>
          <li class="grow"><a class="nav" href="navlink">Sports</a></li>
          <li class="grow"><a class="nav" href="navlink">SUV</a></li>
          <li class="grow"><a class="nav" href="navlink">Trucks</a></li>
          <li class="grow"><a class="nav" href="navlink">Used</a></li>
        </ul>
      </nav>
      <nav>
        <?php  echo $navList; ?>
     </nav>

      <h2>Server Error</h2>
      <p>Sorry our server seems to be experiencing some technical difficulties </p>
      <p>Please check back later.</p>
      <div class="c">

      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>

      </div>
    </main>
  </body>
</html>