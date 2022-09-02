<?php
//This is the accounts conttroller

//Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';

// Get the functions library
require_once '../library/functions.php';

// Get the review model
require_once '../model/reviews-model.php';



//Get the array of classifications
$classifications = getClassifications();

// Get the array of classifications
// $classifications = getClassifications();
// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = navigationBar($classifications);


//Get the value from the action key - value pair
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
//  switch ($action){
//     case '':
     
//      break;

//     default:
//    }

switch ($action) {
    case 'displayloginview':
       include   '../view/login.php';
       break;

    case "displayregistrationview":
       include  '../view/registration.php';
       break;

      //  case 'register':
      //    echo 'You are in the register case statement.';
      //    break;

    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim( filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
       
        // functions to validate email and password
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for existing email address in the table
        $existingEmail = checkExistingEmail($clientEmail);

        //Deal with existing email during registration
        if($existingEmail){
           $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
           include '../view/login.php';
           exit;
           }

        //  Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
           $message = '<p class ="notice">Please provide information for all empty form fields.</p>';
           include '../view/registration.php';
           exit;
        }
        
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        //  Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword );
     
       // Check and report the result
       if ($regOutcome === 1) {
           setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
           $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
        //    include '../view/login.php';
        header('Location: /phpmotors/accounts/?action=login');
        // include '../view/admin.php';
           exit;
       } else {
           $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
           include '../view/registration.php';
           exit;
       }

       // Check and report the result
        if ($regOutcome === 1) {
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        $message = "<p>Thanks for registering $clientFirstname! Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
        }
        break;

    case 'Login':
       // echo "<h1>Login route</h1>";
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordCheck = checkPassword($clientPassword);
      

       // Run basic checks, return if errors
       if (empty($clientEmail) || empty($passwordCheck)) {
           $message = '<p class="notice">Please provide a valid email address and password.</p>';
        //    echo "run test";
           include '../view/login.php';
           exit;
       
       }
   
       $clientData = getClient($clientEmail);
   
       $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    
       if (!$hashCheck) {
           $message = '<p class="notice">Please check your password and try again.</p>';
           echo " resting 123" ;
           include '../view/login.php';
           exit;
       
       }
       // A valid user exists, log them in
       $_SESSION['loggedin'] = TRUE;
       // Remove the password from the array
       // the array_pop function removes the last
       // element from an array
       array_pop($clientData);
       // Store the array into the session
       $_SESSION['clientData'] = $clientData;
       
         // The list of reviews for the client.
         $reviewList = getClientReviews($_SESSION['clientData']['clientId']);
         $reviewHTML = '<ul>';
         foreach ($reviewList as $review) {
             $reviewHTML .= adminReview($review['reviewDate'], $review['reviewId'],$reviewText);
         }
         $reviewHTML .= '</ul>';

       // Send them to the admin view

       header("Location: /phpmotors/accounts");
       exit;
  

       break;
    //     $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    //     $clientPassword =  trim( filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
         
    //     // functions to validate email and password
    //     $clientEmail = checkEmail($clientEmail);
    //     $checkPassword = checkPassword($clientPassword);
        
    //     //  Check for missing data
    //    if (empty($clientEmail) || empty($clientPassword)) {
    //     $message = '<p class ="notice">Please provide information for all empty form fields.</p>';
    //     include '../view/login.php';
    //     // header(Location: /phpmotors/)
    //     exit;
    
      case "update":
          include '../view/client-update.php';

      break;

      case "updateAccount":
               // echo "<h1>Login route</h1>";

        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientLastname =  filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

      //checking for identical email address if email is laready inside the database

      if($clientEmail != $_SESSION['clientData']['clientEmail']){
         
        $existing_email = checkExistingEmail($clientEmail);
         if( $existing_email){
            $message = '<p class="notice">This email already exists please enter a different one.</p>';
            include '../view/client-update.php';
            exit;

         }

         
      }

      
      
      

       // Run basic checks, return if errors
       if (empty($clientEmail) || empty($clientFirstname) || empty($clientLastname)) {
           $message = '<p class="notice">Please provide input for all empty fields.</p>';
           include '../view/client-update.php';
           exit;
       
       }

      //  Get client info by clientid
       $clientData = getClientById($clientId);
   
      
       array_pop($clientData);
       // Store the array into the session
       $_SESSION['clientData'] = $clientData;

       //update client information in database
       $updatedclientinfo = updateclientinfo($clientFirstname, $clientLastname, $clientEmail, $clientId);

       if ($updatedclientinfo) {
         $_SESSION['clientData'] = getClientByID($clientId);
         $_SESSION['message'] = "<p class= 'notice'> $clientFirstname, Your Information has been Updated.</p>";

         include '../view/client-update.php';
         exit;

      }


    else{
      $_SESSION['message'] = "<p class= 'notice'> Sorry $clientFirstname, We could not update your account information. Please try again.</p>";
      include '../view/client-update.php';
      exit;
  }

  break;

     case "updatePassword":

      $clientPassword = filter_input(INPUT_POST, "clientPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // htmlspeacialchars() filter_sanitize_speacial_chars FILTER_SANITIZE_FULL_SPECIAL_CHARS
      $clientId = filter_input(INPUT_POST, "clientId", FILTER_SANITIZE_NUMBER_INT);
      $checkPassword = checkPassword($clientPassword);
          

      if (empty($checkPassword)){
          $_SESSION['message'] = '<p class= "notice">Please Provide information for all empty form fields.</p>';
          include '../view/client-update.php';
          exit;

      }

   

          $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

          $updatePass = updatePassword($hashedPassword, $clientId);

        

          if ($updatePass){
            $clientFirstname = $_SESSION['clientData']['clientFirstname'];
            $_SESSION['message'] = "<p class= 'notice'> $clientFirstname, Your password has been updated.</p>";
            include '../view/client-update.php';
            exit;
        } else {
            $_SESSION['message'] = '<p class= "notice"> An error occured and the password could not be updated.</p>';
            include '../view/client-update.php';
            exit;

        }



      break;


       

        case "logout":
            session_destroy();
           session_unset();
            setcookie('PHPSESSID', '', strtotime('-1 hour'), '/');
            header("Location: /phpmotors/");
            break;

    // default;
    include '../view/admin.php';
    break;
default:
    
    // The list of reviews for the client.

    
    $reviewList = getClientReviews($_SESSION['clientData']['clientId']);
    $reviewHTML = '<ul>';
    foreach ($reviewList as $review) {
        $reviewHTML .= adminReview($review['reviewDate'], $review['reviewId'], $review['reviewText']);
    }
    $reviewHTML .= '</ul>';

    include '../view/admin.php';
    break;
    
    


    
}