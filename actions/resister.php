<?php

    include "../classes/User.php";      // Include the User class file to access User functionalities.

    // create an instance of the User class
    $user = new User;

    // call the store method on the $user object, passing in the form data ($_POST) to save the user in the database
    $user->store($_POST); // to save data to database

?>