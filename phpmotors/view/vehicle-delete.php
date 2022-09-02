<?php
if($_SESSION['clientData']['clientLevel'] < 2){
 header('location: /phpmotors/');
 exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/phpmotors/css/phpmotors.css" />
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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

      <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>

       <p>Confirm Vehicle Deletion. The delete is permanent.</p>
         

      <?php

            if (isset($message)) {
                echo $message;
            }


        ?>



<p class="center">Note, all fields are Required!</p>

<form method="post" action="/phpmotors/vehicles/">
<fieldset>
	<label for="invMake">Vehicle Make</label>
	<input type="text" readonly name="invMake" id="invMake" <?php
if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>

	<label for="invModel">Vehicle Model</label>
	<input type="text" readonly name="invModel" id="invModel" <?php
if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>

	<label for="invDescription">Vehicle Description</label>
	<textarea name="invDescription" readonly id="invDescription"><?php
if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
?></textarea>

<input type="submit" class="regbtn" name="submit" value="Delete Vehicle">

	<input type="hidden" name="action" value="deleteVehicle">
	<input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
echo $invInfo['invId'];} ?>">

</fieldset>
</form>
    <div>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>
      </div>
    </main>
  </body>
</html>