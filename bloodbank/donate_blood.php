<?php  session_start(); ?>
<!-- blood doantion request page for users -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management</title>

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
        <a style="color:white;" class="navbar-brand" href="donate_blood.php">Blood Bank Management</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="index.php">Logout &nbsp; </a>
                
                </li>

            </ul>
        </div>
      </nav>
<br><br>
<div class="wrapper">
    <div class="sidebar">

    <ul>
            <li><a style="text-decoration:none;" href="home.php">Home</a></li>
            <li><a style="text-decoration:none;" href="donate_blood.php">Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="donation_history.php">Donation History</a></li>
            <li><a style="text-decoration:none;" href="request_blood.php">Blood Request</a></li>
            <li><a style="text-decoration:none;" href="request_history.php">Request History</a></li>
            <li><a style="text-decoration:none;" href="inventory.php"> View Inventory</a></li>

        </ul>

    </div>
    <div class="main_content">
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">Donate Blood</h2>
                    </div>
                    <div class="card-body">
                        <form
                          action="donate_blood.php"
                          method="post"
                          style="align-content: center; width: 100%"
                        >
                        <div class="form-row">
                            <div class="name">Unit</div>
                            <input
                              type="text"
                              class="form-control"
                              name="unit"
                              placeholder="Amount of Blood"
                              required
                            />
                          </div>
                          <div class="form-row">
                              <div class="name">Diseases</div>
                            <input
                              type="text"
                              class="form-control"
                              name="diseases"
                              placeholder="diseases you've had"
                              required
                            />

                          </div>
                          <div align= "center">
                            <input
                              type="submit"
                              class="btn btn-primary"
                              name="submit"
                              value="SUBMIT DONATION REQUEST"
                            />
                          </div>
                        </form>

                        <div align = 'center'>
                            <?php

                            #for inserting the donation request to the database.

                               if($_SERVER["REQUEST_METHOD"] == "POST") {

                                include 'database.php';

                                $unit=$_POST['unit'];
                                $diseases=$_POST['diseases'];
                                $request_date=date("Y/m/d h:i:s");
                                $donor_id=$_SESSION['userid'];
                                $donation_id=uniqid();
                                $admin_id='1';
                                $status="pending";
                                $action="none";
                                $sql="INSERT INTO blood_donation VALUES('$donation_id','$donor_id','$unit','$request_date','$diseases','$status','$action','$admin_id')";//







                                if($con->query($sql)==TRUE){    
                                    echo "Requested Succesfully";

                                }
                                else{
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }



                               }
                                ?>
                        </div>
                    </div>
                </div>
            </div>



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
