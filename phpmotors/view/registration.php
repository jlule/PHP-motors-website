<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Register</title>
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
        <a class ="" href='/phpmotors/accounts/index.php?action=displayloginview'>My Account</a>
      </header>
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
        <?php  echo $navList; ?>
     </nav>

      <h2>Register</h2>
      <div class="login-div">
      <?php
        if (isset($message)) {
            echo $message;
          }
        ?>

        <form class="form"  method= "POST" action="/phpmotors/accounts/index.php" >
         <!-- first name -->
         <?php 
         if(isset($clientFirstname))
         {echo "value='$clientFirstname'";} 
          ?>
        <label for ="fname">First Name</label>
        <input type ="text" placeholder ="First Name" name ="clientFirstname" id = "fname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required>

         <!-- last name -->
         <?php 
         if(isset($clientLastname))
         {echo "value='$clientLastname'";} 
          ?>
        <label for = "lname" >Last Name</label>
        <input type ="text" placeholder = "Last Name" name = "clientLastname"  id = "lname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required>

         
         <!-- email -->
         <?php 
         if(isset($clientEmail))
         {echo "value='clientEmail'";} 
          ?>
        <label for = "email">Email or Username</label>
        <input type="text" placeholder = "Username or Email" name = "clientEmail" id = "email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>

          
          <!-- password -->
         
            <label for = "password">Password</label>
            
            <input class = "password" placeholder = "Password" type = "password"  name ="clientPassword" id="password" required pattern ="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <label><strong>Pick a strong password and write it down somewhere</strong></label>
          <!-- remeber me div -->
          <br>

          <div class="options">
           

            <button class="block" type="submit" name="submit" id="regbtn" value="Register"> Register  </button>
            <br>
           
          </div>
          
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="register">
        </form>
      </div>
      

    
      <div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>