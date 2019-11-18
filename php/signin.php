<?php
    include "../includes/database_connect.inc.php";
    session_start();


    if(isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $query="SELECT * FROM ambassadors WHERE email='$email' AND password='$password'";
        //echo $email."<br>".$password;
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $_SESSION["fname"]=$row["first_name"];
                $_SESSION["lname"]=$row["last_name"];
                $_SESSION["id"]=$row["reg_id"];
                $full_name=$_SESSION["fname"]." ".$_SESSION["lname"];
                $_SESSION["profile"]=$row["profile_image"];
                
                header("location:../create_project.php");
            }
        }
        else
        {
            echo '<script type="text/javascript">
                    alert("Wrong UserName or Password. Please try again!");
                    window.location=\'../login.php\';</script>';
        }
    }