<header>
        <img
          class="logo"
          src="/phpmotors/images/site/logo.png"
          alt="logo">
          <?php
          
           if(isset($_SESSION['clientData']['clientFirstname'])){
            // echo "<span>Welcome $cookieFirstname</span>";
            echo "<a href = '/phpmotors/accounts/'> Welcome " . $_SESSION['clientData']['clientFirstname'] ." </a>";
          }
          if(isset($_SESSION['loggedin'] )){
            if ($_SESSION['loggedin'] == TRUE){
              echo '<a class = "account" href="/phpmotors/accounts?action=logout">Logout</a>';
            }

           } else{
              echo '<a class="account" href = " /phpmotors/accounts?action=displayloginview">My Account</a>';}
          
          ?>
       
      </header>