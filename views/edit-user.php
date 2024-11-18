<?php
    // Start or resume the session to access session data (like user information)
    session_start();

    // Include the User class file so we can use its method
    require "../classes/User.php";

    // Step 1: Create a new User object (an instance of the User class)
    $user_obj = new User;

    // Step 2: Retrieve the current logged-in user's details
    // Use the user ID stored in the session ($_SESSION['id']) to fetch the user's data
    $user = $user_obj->getUser($_SESSION['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark px-5" style="margin-bottom: 80px">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
        </div>
        <div class="navbar-nav">
            <span class="navbar-text"><?= $_SESSION['full_name']?></span>
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
            </form>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">EDIT USER</h2>

            <!-- enctype is useed when user upload files -->
            <form action="../actions/edit-user.php" method="post" enctype="multipart/form-data"> 
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php
                        if($user['photo']){
                        ?>
                            <img src="../assets/images/<?= $user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto edit-photo">

                        <?php
                        }else{
                        ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                        <?php
                        }
                        ?>

                        <input type="file" name="photo" class="form-control mt-2" accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first-name" class="form-control" value="<?= $user['first_name']?>" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last-name" class="form-control" value="<?= $user['last_name']?>" required>
                </div>


                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" value="<?= $user['username']?>" required>
                </div>
                
                <div class="text-end">
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>