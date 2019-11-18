<?php
     
     require "database_connect.inc.php";
     $id=$_GET["id"];

     $sql="DELETE FROM `projects` WHERE project_id='$id'";
     if(mysqli_query($conn,$sql))
     {
        echo "<script>alert('Project Deleted')</script>";
     }
     else
     {
         die("Error:".mysqli_error($conn));
     }