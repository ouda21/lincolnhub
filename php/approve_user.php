<?php
    require "database_connect.inc.php";
    $id=$_GET["id"];

    $sql="UPDATE `ambassadors` SET `verified`=1 WHERE reg_id='$id'";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('New Ambassador Approved');window.location=\'../admin-ambassadors.php\'</script>";
    }
    else
    {
        die("Error:".mysqli_query($conn,$sql));
    }