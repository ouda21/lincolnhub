<?php
     
     require "database_connect.inc.php";
     $id=$_GET["project_id"];

     $sql="UPDATE `projects` SET `status`=1 WHERE project_id='$id'";
     if(mysqli_query($conn,$sql))
     {
        echo '<script type="text/javascript">
                    alert("Project Approved");
                    window.location=\'../supervisor_approve.php\';</script>';
     }
     else
     {
         die("Error:".mysqli_error($conn));
     }
