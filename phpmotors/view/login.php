<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>Login</title>
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
    

      <?php
        echo $navList;
      
      ?>

      <h2>Sign in</h2>
      <div class="login-div">
      <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
     }
      ?>

        <form class="form" method = "POST" action = "../accounts/index.php">
        
          <!-- username/email div -->
          <!-- <?php 
         if(isset($clientEmail))
          {echo "value='clientEmail'";} 
          ?> -->
          
            <label for = "email"> Email or Username</label>
            <input type="text" placeholder = "Username or Email" id = "email" name = "clientEmail"  <?php if(isset($clientEmail)){echo "value ='$clientEmail'";} ?>>
            

          <!-- password div -->
         
            <label for="password">Password</label>
            <input class = "password" type = "password"  placeholder = "Password" id  ="password" name ="clientPassword" required pattern = "(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
          
         
          <br>

          <div class="options">
            
           

            <button type="submit"  value = "Login"class="formBtn">Login</button>
            <input type="hidden" name="action" value="Login">
            <br>
            <div class="signup">
              <a href="/phpmotors/accounts/index.php?action=displayregistrationview">Not a member yet?</a>
            </div>
          </div>
        </form>
      </div>
      

    
      <div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>