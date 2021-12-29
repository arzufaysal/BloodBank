<?php  session_start(); ?>
<!-- user details for admin -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">



    <link rel="stylesheet" href = "css/home.css">

    <style>



    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="user_details.php">Blood Bank Management</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="admin_login.php">Logout &nbsp</a>
                </li>

            </ul>
        </div>
      </nav>
    <br><br>
    <div class="wrapper">
    <div class="sidebar">

        <ul>
            <li><a style="text-decoration:none;" href="admin.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a style="text-decoration:none;" href="admin_donation_request.php"><i class="fas fa-hand-holding-medical"></i>Donation Request</a></li>
            <li><a style="text-decoration:none;" href="admin_blood_request.php"><i class="fas fa-history"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="users.php"> <i class="fas fa-user"></i>Users</a></li>

        </ul>

    </div>

    <div class = "main_content">
        <br><br>
        <div class="container">
            <H4 class="text-center">Users</H4><br>
        <?php
        # retrieving the user details which the admin clicked.
            include 'database.php';

            $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE userid = '" . $_POST['userid'] . "'"));
         ?>


         <div class="info">
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">User ID</h5>
                             <!-- print userid -->
                             <p class="card-text"><?php

                             echo $row['userid'];

                             ?></p>


                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">User Name</h5>
                             <p class="card-text">
                             <?php

                            echo $row['first_name'] . " " . $row['last_name'];

                             ?>
                             </p>


                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Mobile Number</h5>
                             <p class="card-text">
                             <?php

                            echo $row['phone_number'];

                            ?>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Blood Type</h5>
                             <p class="card-text">
                             <?php

                            echo $row['blood_type'];

                            ?>
                             </p>
                         </div>
                     </div>
                 </div>
                 <?php

                     if(isset($_POST['remove'])) {

                         #to remove the user admin specified.

                         $sql = "DELETE FROM user WHERE userid = '" . $_POST['id'] . "'";

                         if ($con->query($sql) == TRUE) {

                             header("location: users.php");

                             }
                         else {
                             echo "error";
                             echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                             <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                             </div>";
}
                     }
                 ?>

                 <div align = 'center' class="col-md-4">
                 </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Age</h5>
                             <p class="card-text"><?php

                            echo $row['age'];

                            ?></p>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-md-4">
                </div>
                <div class="col-md-4">
             <form method = 'post'>
                 <br><br>
                 <input type = 'submit' name = 'remove' value = 'Remove User' class='btn btn-danger badge-pill' >
                 <?php echo "<input type = 'hidden' name = 'id' value = " . $row['userid'] ." >"; ?>
             </form>
         </div>
 </div>
</div>
</div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

</body>
</html
