<?php
     
     require "database_connect.inc.php";
     $id=$_GET["id"];

     $sql="DELETE FROM `supervisor` WHERE d='$id'";
     if(mysqli_query($conn,$sql))
     {
         echo "<script>alert('Supervisor deleted successfully')</script>";
     }
     else
     {
         die("Error:".mysqli_error($conn));
     }