<html lang="en">
<?php

if (!isset($_SESSION['loggedin'])) {


    header('Location:/phpmotors/');
    exit;
    // do something here if the value is FALSE
    // The exclamation mark is a "negation" operator
    // By adding it the resulting test is reversed
    // This test is now "If Session loggedin value is NOT true"
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors</title>

    <link rel="stylesheet" href="/phpmotors/stylesheet/Template.css">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>

    <main>





        <h2> Update Account Info</h2>

        <?php

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>

        <form method="Post" action="/phpmotors/accounts/">
            <label for="clientFirstname">First Name</label><br>
            <input type="text" name="clientFirstname" id="clientFirstname" required value="<?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                                echo $_SESSION['clientData']['clientFirstname'];
                                                                                            } else if (isset($clientFirstname)) {
                                                                                                echo $clientFirstname;
                                                                                            } ?>"><br>



            <label for="clientLastname">Last Name</label><br>
            <input type="text" name="clientLastname" id="clientLastname" required value="<?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                                echo $_SESSION['clientData']['clientLastname'];
                                                                                            } else if (isset($clientLastname)) {
                                                                                                echo $clientLastname;
                                                                                            } ?>"><br>


            <label for="clientEmail">Email</label><br>
            <input type="text" name="clientEmail" id="clientEmail" required value="<?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                        echo $_SESSION['clientData']['clientEmail'];
                                                                                    } else if (isset($clientEmail)) {
                                                                                        echo $clientEmail;
                                                                                    } ?>"><br>

            <input type="submit" value="Update Info">
            <input type="hidden" name="action" value="updateAccount">
            <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
        </form>

        <h2> Update Password</h2>
                                                                                        
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>

        <form method="POST" action="/phpmotors/accounts/">
            <span> Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> <br>

            <p class="red"> Note your original password will be changed.</p>
            <label for="clientPassword">Password <br>
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?>^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.[a-z]).">
            </label>
                <input type="submit" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
            

        </form>
    </main>


   <div>
     <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
   </div>
    

</body>

</html>