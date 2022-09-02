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
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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

      <h1><?php echo $classificationName; ?> vehicles</h1>

      <?php if(isset($message)){
          echo $message; }
        ?>
   <?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>


<div>
      <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
</div> 
<!-- <script>
  let vehiclePrice = document.getElementsByClassName(".priceright");
  vehiclePrice.forEach(element =>{
    var number = numeral (parseInt(elemtn.textContent));
    console.log(number.format('0,0.00'));
  });
  </script> -->

    
      
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