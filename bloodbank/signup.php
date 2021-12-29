<!-- singup page for usere -->
<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="en" dir="ltr">
  <head>
        <meta charset="utf-8">
        <title>Blood Bank Management</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link rel = "stylesheet" href = "css/index.css">
    <style>


    </style>
  </head>

  <body>


        <div class="bs-example">
          <nav style="background-color: #FF0018;" class="navbar navbar-expand-md navbar-dark fixed-top">
              <a style="color:white;" class="navbar-brand"></i>Blood Bank Management</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


              <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" style="color: white;" href="index.php"  > Login</a>
                      </li>

                  </ul>
              </div>
            </div>
          </nav>
        </div>

</header>
    <!-- user login form -->

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <br><br><br>
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">User SingUp</h2>
                </div>
                <div class="card-body">
                    <form  action="signup.php" method="post" style="align-content: center; width: 100%; ">
                        <div class="form-row">
                            <div class="name">Userid</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="userid" placeholder="UserID" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                        <input type="password"   class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">First Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="first name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Last Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" size="12" class="form-control" name="phone_number" placeholder="phone number" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="gender" class="form-control">
                                        <option value="m">M</option>
                                        <option value="f">F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Blood Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="blood_type" class="form-control">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Age</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="number" min="16" max="80"class="form-control" name="age" placeholder="age" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Signup">
                        </div>

                    </form>

                    <div align = 'center'>

                    <?php
                       if($_SERVER["REQUEST_METHOD"] == "POST") {

                        include 'database.php';

                        $userid=$_POST['userid'];
                        $password=$_POST['password'];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $firstname=$_POST['first_name'];
                        $lastname=$_POST['last_name'];
                        $phone_number=$_POST['phone_number'];
                        $gender=$_POST['gender'];
                        $blood_type=$_POST['blood_type'];
                        $age=$_POST['age'];

                        $sql="INSERT INTO user VALUES ('$userid','$firstname','$lastname','$phone_number','$gender','$blood_type','$hashed_password','$age')";

                        if($con->query($sql)==TRUE){
                            echo "user registered";
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
</body>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

</html>