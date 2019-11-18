<?php 

    include "database_connect.inc.php";

    if (isset($_GET['download'])) {
    $file = $_GET['download'];

    $sql="SELECT * FROM `progress` WHERE id='$file'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $my_file="../uploads/".$row["pdf"];
        if (file_exists($my_file)) {
            $name=$row["pdf"];
                header('Content-Type: pdf/docs');
                header("Content-Disposition: attachment; filename=\"$name\"");
                readfile($file);
        }
        else {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>";
        }
            
    }
}

if (isset($_GET['vid'])) {
    $file = $_GET['vid'];

    $sql="SELECT * FROM `progress` WHERE id='$file'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $my_file="../videos/".$row["vid"];
        if (file_exists($my_file)) {
            $name=$row["video"];
                header('Content-Type: '.mp4);
                header("Content-Disposition: attachment; filename=\"$name\"");
                readfile($file);
        }
        else {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>";
        }
            
    }
}

if (isset($_GET['slide'])) {
    $file = $_GET['slide'];

    $sql="SELECT * FROM `progress` WHERE id='$file'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $my_file="../uploads/".$row["slides"];
        if (file_exists($my_file)) {
            $name=$row["slides"];
                header('Content-Type: '.ppt);
                header("Content-Disposition: attachment; filename=\"$name\"");
                readfile($file);
        }
        else {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>";
        }
            
    }
}

?>