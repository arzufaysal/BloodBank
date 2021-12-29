<!-- login page of the user -->
<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="en" dir="ltr">
  <head>
        <meta charset="utf-8">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <link rel = "stylesheet" href = "css/index.css">
   
   <style>


    </style>
  </head>

  <body>



        <div class="bs-example">
          <nav style="background-color: #FF0018;" class="navbar navbar-expand-md navbar-dark fixed-top">
              <a style="color:white;" class="navbar-brand" href="index.php">Blood Bank Management</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


              <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" style="color: white;" href="admin_login.php"  > Admin</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" style="color: white;" href="contact.php" target="_blank"  > Contact Us</a>
                      </li>

                  </ul>
              </div>
            </div>
          </nav>
        </div>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <br><br><br>
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">User Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action = 'login.php'>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      name="userid"
                                      placeholder="UserID"
                                      required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input
                                      type="password"
                                      class="form-control"
                                      name="password"
                                      placeholder="Password"
                                      required
                                    />
                                </div>
                            </div>
                        </div>




                        <div align = 'center'>
                            <button class="btn btn--radius-2 btn-danger" type="submit">Login</button>
                        </div>
                        <br>

                    </form>
                    <!-- signup link-->



                    <div class="form-group" align = "center">
                        <br>
                         No Account? <a href="signup.php" >Sign Up</a><br>
                    </div>

                <?php

                    if(isset($_SESSION['error'])) {
                        echo "<div align='center'> Invalid Credentials</div><br>";
                        unset($_SESSION['error']);
                    }
                    else{
                        echo "<br><br>";
                    }
                    ?>

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