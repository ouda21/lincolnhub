<?php
    require "database_connect.inc.php";
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location:../login.php");
    }

    if(isset($_POST["attach"]))
    {
        $user_id=$_SESSION["id"];
        $proj_id=$_POST["project_id"];
        $pic=$_FILES["pictures"]["name"];
        $vid=$_FILES["video"]["name"];
        $pdf=$_FILES["pdf"]["name"];
        $slides=$_FILES["slides"]["name"];
        $week=$_POST["week_number"];

        $target_dir_image = "../images/";
        $target_file_image = $target_dir_image . basename($_FILES["pictures"]["name"]);

        $target_dir_video = "../videos/";
        $target_file_video = $target_dir_video . basename($_FILES["video"]["name"]);

        $target_dir_uploads= "../uploads/";
        $target_file_uloads = $target_dir_uploads . basename($_FILES["pdf"]["name"]);

        $target_dir_slides= "../uploads/";
        $target_file_slides = $target_dir_slides . basename($_FILES["slides"]["name"]);



        $sql="INSERT INTO `progress`(`project_id`, `user_id`, `pictures`, `video`, `pdf`, `slides`,`week`) VALUES ('$proj_id','$user_id','$pic','$vid','$pdf','$slides','$week')";

        if(mysqli_query($conn,$sql))
        {
            if(move_uploaded_file($_FILES['pictures']['tmp_name'],$target_dir_image.$pic) && move_uploaded_file($_FILES['video']['tmp_name'],$target_dir_video.$vid) && move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir_uploads.$pdf) && move_uploaded_file($_FILES['slides']['tmp_name'],$target_dir_slides.$slides))
            {
                echo '<script type="text/javascript">
                    alert("This week\'s report was submitted Successfully");
                    window.location=\'../myprojects.php\';</script>';
            }
            else
            {
                die("Error".mysqli_error($conn));
            }
        }
        else
        {
            die("Error".mysqli_error($conn));
        }
    }