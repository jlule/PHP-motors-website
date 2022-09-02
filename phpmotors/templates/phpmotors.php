<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Home|PHP Motors</title>
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
        <a class="account" href="myaccount">My Account</a>
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

      <h2>Welcome to PHP Motors!</h2>
      <h3>DMC Delorean</h3>

      <div class="b">
        <p class = "dmc">Cup holders</p>
        <p class ="dmc">Superman doors</p>
        <p class = "dmc" >Fuzzy dice</p>
      </div>

      <h3><button class="block">Own Today</button></h3>

      <img
        id="car"
        src="/phpmotors/images/delorean.jpg"
        alt="car"
      />

<!--       <div class="ratings">
          

         
      </div> -->

       <div class="container">
        <div class="quote">
            <section class="upgrades">
              
            <h4 id ="delorean">Delorean Upgrades</h4>

              <figure id = "flux">
                <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux-cap" />
                <figcaption><a href="#">Flux Capacitor </a></figcaption>
              </figure>

              <figure id =" flame">
                <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame" />
                <figcaption><a href="#">Flame Decals </a></figcaption>
              </figure>

              <figure id = "bumper">
                <img
                  src="/phpmotors/images/upgrades/bumper_sticker.jpg"
                  alt="bumper"
                />
                <figcaption><a href="#">Bumper Stickers </a></figcaption>
            </figure>

              <figure id = "caps">
                <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub-cap" />

                <figcaption><a href="#">Hub Caps </a></figcaption>
              </figure>
          </section>
        </div>
        <div>
             <section class="reviews">
              <h4>DMC Delorean Reviews</h4>
              <li><a>"So fast its almost like traveling in time." [4/5]</a></li>
              <li><a>"Coolest ride on the road." [4/5]</a></li>
              <li><a>"I'm feeling Marty Mcfly!" [5/5]</a></li>
              <li><a>"The most futuristic ride of our day." [4.5/5]</a></li>
              <li><a>"80's livin and I love it!" [5/5]</a></li>
          </section>
        </div>
<!--         <div class="quote">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi nesciunt ullam itaque! Consequuntur, asperiores modi!</p>
            <span>John Doe</span>
        </div>
        <div class="quote">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi nesciunt ullam itaque! Consequuntur, asperiores modi!</p>
            <span>John Doe</span>
        </div> -->
    </div>
      <div class="c">
        <footer>
          <p>&copy;PHP Motors, All rights reserved.</p>

          <p>
            All images used are believed to be in "Fair Use." Please notify the
            author if any are not and they will be removed.
          </p>
          <p>Last Updated: 4/30/2022 <span id="currentdate"> </span></p>
        </footer>
      </div>
    </main>
  </body>
</html>