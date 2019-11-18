<?php
    require "database_connect.inc.php";
    $id=$_GET["report"];

    $sql="DELETE FROM `progress` WHERE id='$id'";
    if(mysqli_query($conn,$sql))
    {
        echo"<script>alert('Report deleted');window.location=\'../admin_see_reports.php\'</script>";
    }
    else
    {
        die("Error:".mysqli_error($conn));
    }