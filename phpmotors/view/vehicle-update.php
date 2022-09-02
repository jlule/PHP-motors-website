<?php
  if(!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
    header("Location: /phpmotors/");
    exit;
}
?>

<?php
// Build the classifications option list

 $classifList = '<select name="classificationId" id="classificationId">';
 $classifList .= "<option>Choose a Car Classification</option>";
 foreach ($classifications as $classification) {
  $classifList .= "<option value='$classification[classificationId]'";
  if(isset($classificationId)){
   if($classification['classificationId'] === $classificationId){
    $classifList .= ' selected ';
   }
  } elseif(isset($invInfo['classificationId'])){
  if($classification['classificationId'] === $invInfo['classificationId']){
  $classifList .= ' selected ';
  }
 }
 $classifList .= ">$classification[classificationName]</option>";
 }
 $classifList .= '</select>';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title>
             <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
            elseif(isset($invMake) && isset($invModel)) { 
                echo "Modify $invMake $invModel"; }?> |
                PHP Motors
    </title>
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

      <h2></h2>

     <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	     echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
        elseif(isset($invMake) && isset($invModel)) { 
         echo "Modify$invMake $invModel"; }?></h1>
         

      <?php

            if (isset($message)) {
                echo $message;
            }


        ?>



<p class="center">Note, all fields are Required!</p>

<form action="/phpmotors/vehicles/" method="post">

<label for="cars">Choose Car Classification:</label>
 <?php
 echo   $classifList;
 ?> 

    <br>

    <label for="invMake">Make</label>
    <input type="text" name="invMake" id="invMake" required 
    <?php if(isset($invMake)){ echo "value='$invMake'"; }
     elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?>> <br> <br>

    <label for="invModel">Model</label>
    <input type="text" name="invModel" id="invModel" required 
    <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>> <br><br>
    
    <label for="invDescription">Description</label>
    <textarea name="invDescription" id="invDescription" required>
    <?php if(isset($invDescription)){ echo $invDescription; }
     elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea> <br><br>

    <label for="invImage">Image Path</label>
    <input type="text" name="invImage" id="invImage" value=" /phpmotors/images/no-image.png" 
    required <?php if(isset($invImage)){ echo "value='$invImage'"; }
     elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>> <br><br>

    <label for="invThumbnail">Thumbnail Path</label>
    <input type="text"  name="invThumbnail" id="invThumbnail" value=" /phpmotors/images/no-image.png" required 
    <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; }
     elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>><br><br>

    <label for="invPrice">Price</label>
    <input type="text" name="invPrice" id="invPrice" required
     <?php if(isset($invPrice)){ echo "value='$invPrice'"; }
      elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>> <br><br>

    <label for="invStock"> # In Stock</label>
    <input type="text" name="invStock" id="invStock" required
     <?php if(isset($invStock)){ echo "value='$invStock'"; }
      elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>> <br><br>

    <label for="invColor">Color</label>
    <input type="text" name="invColor" id="invColor" required
     <?php if(isset($invColor)){ echo "value='$invColor'"; } 
     elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>> <br><br>


    <input type="submit" name="submit" value="Update Vehicle">
    <input type="hidden" name="action" value="updateVehicle">
    
<input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
elseif(isset($invId)){ echo $invId; } ?>">


</form>   
    <div>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>