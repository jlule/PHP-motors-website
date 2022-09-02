<?php
/**
 * Proxy connection to the phpmotors database
 */

function phpmotorsConnect(){
    $server = 'localhost';
    $dbname= 'phpmotors';
    $username = 'iClient';
    $password = 'james';


    $dsn = "mysql:host=$server;dbname=$dbname";

    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Create the actual connection object and assign it to a variable
    try {
    //    assigns the  established connection to a variable 
     $link = new PDO($dsn, $username, $password, $options);
    
     // if connection is established
    //  if(is_object($link)){
    //      echo 'It worked!';
    //  }
     return $link;
    } catch(PDOException $e) {
    //  echo 'Sorry, the connection failed';
    header('Location: /phpmotors/view/500.php');
     exit;
    }
}

//    phpmotorsConnect();
?>