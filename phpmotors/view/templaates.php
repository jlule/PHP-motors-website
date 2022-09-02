<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Teemplates</title>
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
        <a class="account" href='/phpmotors/accounts/index.php?action=displayloginview'>My Account</a>
      </header>
      <nav>
        <ul class="active">
        <li class="grow"><a class="nav" href='/phpmotors/view/home.php'>Home</a></li>
          <li class="grow"><a class="nav" href="navlink">Classic</a></li>
          <li class="grow"><a class="nav" href="navlink">Sports</a></li>
          <li class="grow"><a class="nav" href="navlink">SUV</a></li>
          <li class="grow"><a class="nav" href="navlink">Trucks</a></li>
          <li class="grow"><a class="nav" href="navlink">Used</a></li>
        </ul>
      </nav>

      <h2>Content Title Here</h2>
     
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>