<?php
    include "database_connect.inc.php";
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $image=$_FILES["profile"]["name"];
        $password=md5($_POST["password"]);
        $email=$_POST["email"];

    if(isset($_POST["register_supervisor"]))
    {
        
        $target_dir="../profile_pictures/";
        $target=$target_dir.basename($_FILES["profile"]["name"]);

        $sql="INSERT INTO `supervisor`(`first_name`, `last_name`, `email`, `image`, `password`) VALUES ('$fname','$lname','$email','$image','$password')";
        if(mysqli_query($conn,$sql))
        {
            if(move_uploaded_file($_FILES['profile']['tmp_name'],$target_dir.$image))
            {
                echo '<script type="text/javascript">
                            alert("Registration Successful");
                            window.location=\'../supervisor_login.php\';</script>';
            }
            else
            {
                die("Error:".mysqli_error($conn));
            }
        }
        else
        {
            die("Failed:".mysqli_error($conn));
        }
    }
    