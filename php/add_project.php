<?php

    include "../includes/database_connect.inc.php";
    session_start();
    if(!isset($_SESSION["id"]) )
    {
        header("location:../login.php");
    }
    if(!isset($_SESSION["profile"]) )
    {
        header("location:../login.php");
    }
    if(!isset($_SESSION["fname"]) )
    {
        header("location:../login.php");
    }
    if(!isset($_SESSION["lname"]) )
    {
        header("location:../login.php");
    }


    if(isset($_POST["create_project"]))
    {   
        
        $project_name=$_POST["project_name"];
        $user_id=$_SESSION["id"];
        $project_description=$_POST["description"];
        $start=$_POST["start_date"];
        $end=$_POST["end_date"];
        $sdg=$_POST["sdg"];
        $sql="INSERT INTO `projects`(`user_id`, `project_name`, `project_description`, `start_date`, `end_date`, `sdg`,`status`) VALUES ('$user_id','$project_name','$project_description','$start','$end','$sdg',0)";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/javascript">
                    alert("Project Created Successfully");
                    window.location=\'../create_project.php\';</script>';
        }
        else
        {
            die("Error".mysqli_error($conn));
        }

        
    }