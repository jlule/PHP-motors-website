<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <style>
        .currSign:before {
            content: '$';
        }
    </style>
    <!-- <title>Vehicle Detail</title> -->
    <title><?php echo $vehicle['invMake'] ?>  | PHP Motors, Inc.</title>

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

      


    <!-- <h1 class="center">Vehicle Details</h1> -->
    <p></p>
        <section class="main">

        <?php
          if(isset($message)){
            echo $message;

          }
          if(isset($vehicleDisplay)) {
            echo $vehicleDisplay;
          }


        ?>


            <?php
            if (!empty($vehicleDetailsDisplay)) {
                echo $vehicleDetailsDisplay;
            }
            if (isset($thumbnailsList)) {
                echo $thumbnailsList;
            }
            ?>

       </section>
        <?php if (isset($_SESSION['loggedin']) == false)
        {
            echo "Login to leave a review";
        }else{
        echo '<label><form action = "/phpmotors/reviews/index.php" method="POST" >';
                echo "\r\n<label>Add a review</label>";
                echo "\r\n<br>";
                echo "\r\n<textarea id = 'review' name = 'newReview' rows = '4' cols = '50' required>";
                echo  '</textarea>';
                echo "\r\n<br>";
                echo "\r\n<input type = 'submit' name='submit' id='regbtn' value='Add Review'/> ";
                echo "\r\n<input type = 'hidden' name='action' value='addReview'/> ";
                echo "\r\n<input type = 'hidden' name='userId'";
                echo ' value= "'.$_SESSION['clientData']['clientId'].'" ' . '/> ';
                echo "\r\n<input type = 'hidden' name='carId' ";
                echo 'value = "' . $invId . '"' . '/>';
                echo "\r\n</form></label>";
        }
        ?>
            <!-- <?php 
                // Put the reviews on the page.
                if (isset($reviewHTML)){
                    echo $reviewHTML;
                }
            ?> -->

<h3>Your Reviews</h3>
        <?php echo $reviewHTML; ?>
      <div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
    <script>
        let x = document.querySelectorAll(".priceright");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                      .toLocaleString('en');
            x[i].innerHTML = num;
            x[i].classList.add("currSign");
        }
    </script>
  </body>
  
</html>