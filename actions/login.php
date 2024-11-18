<?php

    include "../classes/User.php";  //  Include the User class file, so we can use the User class and its method

    // Step 1: Create a new User object (an instance of the User class)
    $user = new User;

    // Step 2: Call the login metod on the User object
    // Pass the form data ($_POST) to the login method to check if the user's credentials are correct
    $user->login($_POST);
?>