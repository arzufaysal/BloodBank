<!-- use include 'database.php' for accessing all the database variables.-->

<?php

    $localhost = "localhost";
    $root = "root";
    $password = "";
    $con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');
    mysqli_select_db($con,"bloodbankdb");
    
?>