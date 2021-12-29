<?php  session_start(); ?>
<!-- admin blood reqeust page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">




    <link rel = "stylesheet" href = "css/home.css">

    <style>


        .label {
            color: white;
            padding: 8px;
        }

        .success {background-color: #4CAF50;} /* Green */
        .info {background-color: #2196F3;} /* Blue */
        .warning {background-color: #ff9800;} /* Orange */
        .danger {background-color: #f44336;} /* Red */
        .other {background-color: #e7e7e7; color: black;} /* Gray */

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin_blood_request.php">Blood Bank Management </a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="admin_login.php">Logout &nbsp; </a>
                </li>

            </ul>
        </div>
      </nav>
    <br><br>
    <div class="wrapper">
    <div class="sidebar">

        <ul>
            <li><a style="text-decoration:none;" href="admin.php">Home</a></li>
            <li><a style="text-decoration:none;" href="admin_donation_request.php">Donation Request</a></li>
            <li><a style="text-decoration:none;" href="admin_blood_request.php">Blood Request</a></li>
            <li><a style="text-decoration:none;" href="users.php"> Users</a></li>
        </ul>

    </div>
    <div class="main_content">

        <?php

            #retrieving all the pending requests and admin specific approved or rejected requests.

            include 'database.php';

            $admin= $_SESSION['adminid'];   #currently logged in admin in this session
            $sql = "SELECT * FROM blood_request WHERE ( admin_id = '1' AND status = 'pending' ) OR admin_id = '" . $admin . "'";
            $result = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($result);

            if (!$num_rows){
                $num_rows = 0;
            }
        ?>

            <br><br>
            <div class="container">
                <H4 class="text-center">Blood Requests</H4><br>

            <h5 class="text-center" style="color: red;"><?php echo $num_rows; ?> Records</h5><br>

                <table class="table table-light table-hover table-bordered table-striped">
                    <thead class="bg-info">
                        <tr>


                        <th scope="col">Request ID</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Reasons</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>

                    <?php

                        if(isset($_POST['approve'])) {

                            #this is executed if the request is approved. The blood_stock and blood_request table is updated.
                            #echo $_POST['donor_id'];

                            $bloodtype = mysqli_fetch_array(mysqli_query($con, "SELECT blood_type FROM user WHERE userid = '" . $_POST['requester_id'] . "'"));
                            $currentunit = mysqli_fetch_array(mysqli_query($con, "SELECT  unit FROM blood_stock WHERE blood_type = '" . $bloodtype['blood_type'] . "'"));


                            $updatedonation = "UPDATE blood_request SET status = 'approved', action = 'removed " . $_POST['unit'] . " units' , admin_id = '" . $admin . "' WHERE request_id = '" . $_POST['request_id'] . "'";

                            $update = $currentunit['unit'] - $_POST['unit'];
                            $updatestock = "UPDATE blood_stock SET unit = '" . $update . "', admin_id='" . $admin . "' WHERE blood_type = '" . $bloodtype['blood_type'] . "'";



                            if ($con->query($updatedonation) == TRUE && $con->query($updatestock) == TRUE) {

                                header("location: admin_blood_request.php");

                            }
                            else {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                                <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }

                        }

                        else if(isset($_POST['reject'])) {

                            #if the request is rejected, the blood_reqeust table is updated.

                            $updatedonation = "UPDATE blood_request SET status = 'rejected', action = 'rejected', admin_id = '" . $admin . "' WHERE request_id = '" . $_POST['request_id'] . "'";

                            if($con->query($updatedonation)) {

                                header("location: admin_blood_request.php");
                            }
                            else{
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                                <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }

                        }


                        while ($row = mysqli_fetch_assoc($result)){
                            #printing all the request

                            echo "<tr>";
                                echo "<td>" . $row['request_id'] . "</td>";
                                echo "<td>" . $row['request_date'] . "</td>";
                                echo "<td>" . $row['requester_id'] . "</td>";
                                echo "<td>" . $row['unit'] . "</td>";
                                echo "<td>" . $row['reasons'] . "</td>";

                                if ($row['status'] == 'pending')
                                {
                                    #request specific details for transfering with the post request.
                                    echo "<td align='center'><form method = 'POST'><input type = 'submit' name = 'approve' value = 'Approve' class='btn btn-primary badge-pill'><br><br> ";
                                    echo "<input type = 'submit' name = 'reject' value = 'Reject' class='btn btn-danger badge-pill' >";
                                    echo "<input type = 'hidden' name = 'request_id' value = " . $row['request_id'] ." >";
                                    echo "<input type = 'hidden' name = 'requester_id' value = " . $row['requester_id'] ." >";
                                    echo "<input type = 'hidden'  name = 'unit' value = " . $row['unit'] ."></form></td>";

                                }

                                else{
                                    echo "<td>" . $row['status'] . "</td>";
                                }

                                echo "<td>" . $row['action'] . "</td>";



                            echo "</tr>";
                        }
                    ?>


                </tbody>

            </table>

        </div>




    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>
</html>