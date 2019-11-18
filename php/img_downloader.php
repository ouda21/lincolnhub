<?php 

    include "database_connect.inc.php";

    if (isset($_GET['img'])) {
    $file = $_GET['img'];

    $sql="SELECT * FROM `progress` WHERE id='$file'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $my_file="../images/".$row["pictures"];
        if (file_exists($my_file)) {
            $name=$row["pictures"];
                header('Content-Type: '.jpg/png/jpeg);
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