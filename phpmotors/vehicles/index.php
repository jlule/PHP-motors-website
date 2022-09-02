<?php
//Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
//
require_once '../library/functions.php';

require_once '../model/uploads-model.php';

// Get the review model
require_once '../model/reviews-model.php';







//Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = navigationBar($classifications);




// Build classification select list
$classificationList = "<select name = 'classificationId' id ='classificationList'>";
$classificationList  .= "<option>Choose a Classification</option>";
foreach ($classifications as $classification) {

    $classificationList .= "<option value=' $classification[classificationId] '>$classification[classificationName]</option>";
}

$classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {


    case "displayaddclassificationform":

        include   '../view/add-classification.php';


        break;

    case 'displayaddvehicleform':

        include   '../view/add-vehicle.php';

        break;


    case 'addClassification':
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        if (empty($classificationName)) {
            $message = '<p class="center">Please provide information for all empty form fields.</p>';
            include   '../view/add-classification.php';
            exit;
        }

        // add to database
        $classifAdded = insertClassification($classificationName);

        if ($classifAdded) {
            header('Location: /phpmotors/vehicles/');
        } else {

            $message = '<p class = "center">An error occured while adding the new classification to the database, please try again later.</p>';
            include   '../view/add-classification.php';
            exit;
        }

        break;






    case 'addVehicle':

        $invMake = filter_input(INPUT_POST, "invMake");
        $invModel = filter_input(INPUT_POST, "invModel");
        $invDescription = filter_input(INPUT_POST, "invDescription");
        $invImage = filter_input(INPUT_POST, "invImage");
        $invThumbnail = filter_input(INPUT_POST, "invThumbnail");
        $invPrice = filter_input(INPUT_POST, "invPrice");
        $invStock = filter_input(INPUT_POST, "invStock");
        $invColor = filter_input(INPUT_POST, "invColor");
        $classificationId = filter_input(INPUT_POST, "classificationId", FILTER_SANITIZE_NUMBER_INT);


        if (
            empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription)
            || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) ||
            empty($invMake)

        ) {
            $message = '<p  class="center" > Please provide information for all empty form fields.</p>';
            include "../view/add-vehicle.php";
            exit;
        }

        $vehicleAdded = insertVehicle(
            $invMake,
            $invModel,
            $invDescription,
            $invImage,
            $invThumbnail,
            $invPrice,
            $invStock,
            $invColor,
            $classificationId


        );


        if ($vehicleAdded) {

            $message = '<p class="center">The' . $invMake . '' . $invModel . ' was added Successfully!</p>';
            include "../view/add-vehicle.php";
            exit;
        } else {
            $message = '<p class="center"> Please Try Again Later</p>';
            include "../view/add-vehicle.php";
            exit;
        }


        break;
        /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */
    case 'getInventoryItems':
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId);
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray);

        break;

        // default:

        // $classificationList = buildClassificationList($classifications);

        include   '../view/vehicle-management.php';

        break;

    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

    case 'updateVehicle':
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        if (
            empty($classificationId) || empty($invMake) || empty($invModel) ||
            empty($invDescription) || empty($invImage) || empty($invThumbnail)
            || empty($invPrice) || empty($invStock) || empty($invColor)
        ) {
            $message = '<p>Please complete all information for the new item! Double check the classification of the item.</p>';
            include '../view/vehicle-update.php';
            exit;
        }

        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
        if ($updateResult) {
            $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
            include '../view/vehicle-update.php';
            exit;
        }

        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

    case 'deleteVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='notice'>Error: $invMake $invModel was not
                        deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;


    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vehicles = getVehiclesByClassification($classificationName);
        if (!count($vehicles)) {
            $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        // echo $vehicleDisplay;
        // exit;
        include '../view/classification.php';

        break;

    case 'displayVehicle':
        $invId = filter_input(INPUT_GET, 'vehicleId', FILTER_VALIDATE_INT);
         
        $vehicle = getInvItemInfo($invId);

        //gets the thumbanil images
        $thumbnailsPath = getThumbnails($invId);
        $thumbnailsList = thumbnailHTML($thumbnailsPath);

        //get the vehicle information
        $vehicle = getInvItemInfo($invId);
        
            //gets review
            $reviewList = getInventoryReviews($invId);

          // Build the html for the review list.
          $reviewHTML = '<div class = "reviews">';
          foreach ($reviewList as $review) {
              $reviewHTML .= buildReview($review['clientFirstname'], $review['clientLastname'], $review['reviewDate'], $review['reviewText']);
          }
          $reviewHTML .= "</div>";
        
        // $message = "Test";
        if (count($vehicle) == 0) {
            $message = '<p>Sorry, no vehicle information could be found.</p>';
            // $message = '<p>';
            // $message .= count($vehicle);
            // $message .= '</p>';
        } else {
            // $message = '<p>';
            // $message .= $vehicle['invImage'];
            // $message .= '</p>';
            $vehicleDisplay = displayVehicleDetails($vehicle);
        }
        include '../view/vehicle-detail.php';
        break;
    default:
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-management.php';
        break;
}
