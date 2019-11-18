<?php
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



    function getProjectStats($value)
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
        $sql="SELECT * FROM `projects` WHERE user_id='$user_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];

            }
        }
        else
        {
            return "<div class='alert alert-success'>You have no projects to show</div>";
        }
    }

    function getProjects()
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
        $sql="SELECT * FROM `projects` WHERE user_id='$user_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $name=$row["project_name"];
                $status=$row["status"];
                $start=date_create($row["start_date"]);
                $end=date_create($row["end_date"]);
                $date_diff=date_diff($start,$end);
                $diff=$date_diff->format('%R%a days');
                $string=null;
                $id=$row["project_id"];
                if($status==0)
                {
                    $string="In Progress";
                }
                else
                {
                    $string="Complete";
                }
                echo '
                        <div class="gallery img-thumbnail">
                        <a hfref="#">
                            <div class=""><i style="font-size:130px;" class="fa fa-folder-open"></i></div>
                        </a>
                        <div class="desc"><strong>Project Name:&nbsp &nbsp &nbsp </strong>'.$name.'</div>
                        <div class="desc"><strong>Due:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong>'.$diff.'</div>
                        <div class="desc"><strong>Project Status:&nbsp &nbsp</strong>'.$string.'</div>
                        <div class="desc"><a  href="send_report.php?project_id='.$id.'"class="btn btn-info" method="GET" >Select Project</a></div>
                        </div>
                    ';
            }
        }
        else
        {

        }
    }

    
    function getTableData()
    {
        require "database_connect.inc.php";
        $user=$_SESSION["id"];
        $sql="SELECT * FROM `progress` WHERE user_id='$user'";
        $result=mysqli_query($conn,$sql);
        echo '<table class="table">
                <caption>Report Progress</caption>
                    <thead>
                        <tr>
                        <th scope="col">Week</th>
                        <th scope="col">Images</th>
                        <th scope="col">Video</th>
                        <th scope="col">PDF/Word</th>
                        <th scope="col">Slides</th>
                        </tr>
                    </thead>
                    <tbody>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $week=$row["week"];
                $img=$row["pictures"];
                $vid=$row["video"];
                $pdf=$row["pdf"];
                $slides=$row["slides"];

                echo '<tr>
                    <td>'.$week.'</th>
                    <td>'.$img.'</td>
                    <td>'.$vid.'</td>
                    <td>'.$pdf.'</td>
                    <td>'.$slides.'</td>
                    </tr>';
            }
            echo'</tbody>
            </table>';
        }
        else
        {
            
        }
    }

    function getSupervisorProjects()
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
    }
    
    if(isset($_POST["update_pic"]))
    {
        require "database_connect.inc.php";
        $pic=$_FILES["picture"]["name"];
        $user_id=$_SESSION["id"];
        $target_dir="../profile_pictures/";
        $target=$target_dir.basename($target_dir,$_FILES["picture"]["name"]);
        $sql="UPDATE `ambassadors` SET `profile_image`='$pic' WHERE reg_id='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$target_dir.$pic))
            {
                echo '<script type="text/javascript">
                    alert("Profile Picture Updated Successfully");
                    window.location=\'../ambassador_profile.php\';</script>';
            }
            else
            {
                die("Error:".mysqli_error($conn));
            }
        }
    }

    if(isset($_POST["update_bio"]))
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $class=$_POST["class"];
        $age=$_POST["age"];

        $sql="UPDATE `ambassadors` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`age`='$age',`class`='$class' WHERE reg_id='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/javascript">
                    alert("Bio-Data Updated Successfully");
                    window.location=\'../ambassador_profile.php\';</script>';
        }
        else
        {
            die("Error:".mysqli_error($conn));
        }
    }

    if(isset($_POST["update_guardian"]))
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
        $gname=$_POST["fullname"];
        $gphone=$_POST["phone"];
        $gemail=$_POST["email"];

        $sql="UPDATE `ambassadors` SET `guardian_name`='$gname',`guardian_phone`='$gphone',`guardian_email`='$gemail' WHERE reg_id='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/javascript">
                    alert("Guardian Details Updated Successfully");
                    window.location=\'../ambassador_profile.php\';</script>';
        }
        else
        {
            die("Error:".mysqli_error($conn));
        }
    }

    if(isset($_POST["update_emergency"]))
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];
        $name=$_POST["fullname"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];

        $sql="UPDATE `ambassadors` SET `emergency_name`=[value-12],`emergency_phone`=[value-13] WHERE reg_id='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/javascript">
                    alert("Emergency Contact Updated Successfully");
                    window.location=\'../ambassador_profile.php\';</script>';
        }
        else
        {
            die("Error:".mysqli_error($conn));
        }
    }

    function getInitialDetails($value)
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];

        $sql="SELECT * FROM `ambassadors` WHERE reg_id='$user_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];
            }
        }
    }