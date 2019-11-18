<?php

    require "database_connect.inc.php";

    session_start();
    if(isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $pass=md5($_POST["password"]);

        $sql="SELECT * FROM `supervisor` WHERE email='$email' AND password='$pass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $_SESSION["fname"]=$row["fname"];
                $_SESSION["lname"]=$row["lname"];
                $_SESSION["id"]=$row["d"];
                $full_name=$_SESSION["fname"]." ".$_SESSION["lname"];
                $_SESSION["profile"]=$row["image"];
                header("location:../supervisor_projects.php");
            }
        }
        else
        {
            echo '<script type="text/javascript">
                            alert("Wrong Username or Password");
                            window.location=\'../supervisor_login.php\';</script>';
        }
    }