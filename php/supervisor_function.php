<?php

    session_start();

    if(!isset($_SESSION["id"]))
    {
        header("location:supervisor_login.php");
    }
    
    if(isset($_POST["update_pic"]))
    {
        require "database_connect.inc.php";
        $pic=$_FILES["picture"]["name"];
        $user_id=$_SESSION["id"];
        $target_dir="../profile_pictures/";
        $target=$target_dir.basename($target_dir,$_FILES["picture"]["name"]);
        $sql="UPDATE `supervisor` SET `image`='$pic' WHERE d='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$target_dir.$pic))
            {
                echo '<script type="text/javascript">
                    alert("Profile Picture Updated Successfully");
                    window.location=\'../supervisor_profile.php\';</script>';
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
        

        $sql="UPDATE `supervisor` SET `first_name`='$fname',`last_name`='$lname',`email`='$email', WHERE d='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/javascript">
                    alert("Bio-Data Updated Successfully");
                    window.location=\'../supervisor_profile.php\';</script>';
        }
        else
        {
            die("Error:".mysqli_error($conn));
        }
    }

    function getTableData($value)
    {
        require "database_connect.inc.php";
        $user=$_SESSION["id"];
        $sql="SELECT * FROM `progress` WHERE project_id='$value'";
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
                $the_id=$row["id"];

                echo '<tr>
                    <td>'.$week.'</th>
                    <td><a href="php/img_downloader.php?img='.$the_id.'">'.$img.'</a></td>
                    <td><a href="php/downloader.php?vid='.$the_id.'">'.$vid.'</a></td>
                    <td><a href="php/downloader.php?download='.$the_id.'">'.$pdf.'<a/></td>
                    <td><a href="php/downloader.php?slide='.$the_id.'">'.$slides.'</a></td>
                    </tr>';
            }
            echo'</tbody>
            </table>';
        }
        else
        {
            
        }
    }


    function getSupDetails($value)
    {
        require "database_connect.inc.php";
        $user=$_SESSION["id"];
        $sql="SELECT * FROM `supervisor` WHERE d='$user'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];
            }
        }
       
    }
    
    function fullName()
    {
        require "database_connect.inc.php";
        $user=$_SESSION["id"];
        $sql="SELECT * FROM `supervisor` WHERE d='$user'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $fname=$row["first_name"];
                $lname=$row["last_name"];

                $full=$fname." ".$lname;
                return $full;
            }
        }
    }
    
    
    if(isset($_POST["update_pic"]))
    {
        require "database_connect.inc.php";
        $pic=$_FILES["picture"]["name"];
        $user_id=$_SESSION["id"];
        $target_dir="../profile_pictures/";
        $target=$target_dir.basename($target_dir,$_FILES["picture"]["name"]);
        $sql="UPDATE `supervisor` SET `image`='$pic' WHERE d='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$target_dir.$pic))
            {
                echo "Success";
                
                
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
        

        $sql="UPDATE `supervisor` SET `first_name`='$fname',`last_name`='$lname',`email`='$email' WHERE d='$user_id'";
        if(mysqli_query($conn,$sql))
        {
            echo "Success";
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

        $sql="SELECT * FROM `supervisor` WHERE d='$user_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];
            }
        }
    }

    function getProjects()
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];

        $sql="SELECT * FROM `supervisor` WHERE d='$user_id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $fname=$row["first_name"];
            $lname=$row["last_name"];
            $full_name=$fname." ".$lname;
            
            $sql1="SELECT * FROM `supervisor_invitation` WHERE full_name='$full_name'";
            $result1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)>0)
            {
                while($row1=mysqli_fetch_assoc($result1))
                {
                    $invitee=$row1["invited_by"];
                    
                    $sql2="SELECT * FROM `projects` WHERE user_id='$invitee'";
                    $result2=mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($result2))
                    {
                        while($row3=mysqli_fetch_assoc($result2))
                        {
                            $name=$row3["project_name"];
                            $status=$row3["status"];
                            $start=date_create($row3["start_date"]);
                            $end=date_create($row3["end_date"]);
                            $date_diff=date_diff($start,$end);
                            $diff=$date_diff->format('%R%a days');
                            $string=null;
                            $id=$row3["project_id"];
                            if($status==0)
                            {
                                $string="In Progress";
                            }
                            else
                            {
                                $string="Complete";
                            }
                            echo '<div class="responsive">
                                    <div class="gallery img-thumbnail">
                                    <a hfref="#">
                                        <div class=""><i style="font-size:130px;" class="fa fa-folder-open"></i></div>
                                    </a>
                                    <div class="desc"><strong>Project Name:&nbsp &nbsp &nbsp </strong>'.$name.'</div>
                                    <div class="desc"><strong>Due:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong>'.$diff.'</div>
                                    <div class="desc"><strong>Project Status:&nbsp &nbsp</strong>'.$string.'</div>
                                    <div class="desc"><a  href="supervisor_see_reports.php?project_id='.$id.'"class="btn btn-info" method="GET" >View Progress</a></div>
                                    </div>
                                </div>';
                        }
                    }
                    else
                    {
                        echo "No such user";
                    }
                }
            }
            else
            {
                echo "0 data";
            }
        }
    }


    function approveProjects()
    {
        require "database_connect.inc.php";
        $user_id=$_SESSION["id"];

        $sql="SELECT * FROM `supervisor` WHERE d='$user_id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $fname=$row["first_name"];
            $lname=$row["last_name"];
            $full_name=$fname." ".$lname;
            
            $sql1="SELECT * FROM `supervisor_invitation` WHERE full_name='$full_name'";
            $result1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)>0)
            {
                while($row1=mysqli_fetch_assoc($result1))
                {
                    $invitee=$row1["invited_by"];
                    
                    $sql2="SELECT * FROM `projects` WHERE user_id='$invitee'";
                    $result2=mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($result2))
                    {
                        while($row3=mysqli_fetch_assoc($result2))
                        {
                            $name=$row3["project_name"];
                            $status=$row3["status"];
                            $start=date_create($row3["start_date"]);
                            $end=date_create($row3["end_date"]);
                            $date_diff=date_diff($start,$end);
                            $diff=$date_diff->format('%R%a days');
                            $string=null;
                            $id=$row3["project_id"];
                            if($status==0)
                            {
                                $string="In Progress";
                            }
                            else
                            {
                                $string="Complete";
                            }
                            echo '<div class="responsive">
                                    <div class="gallery img-thumbnail">
                                    <a hfref="#">
                                        <div class=""><i style="font-size:130px;" class="fa fa-folder-open"></i></div>
                                    </a>
                                    <div class="desc"><strong>Project Name:&nbsp &nbsp &nbsp </strong>'.$name.'</div>
                                    <div class="desc"><strong>Due:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong>'.$diff.'</div>
                                    <div class="desc"><strong>Project Status:&nbsp &nbsp</strong>'.$string.'</div>
                                    <div class="desc"><a  href="approve.php?project_id='.$id.'"class="btn btn-info" method="GET" >Aprrove</a></div>
                                    </div>
                                </div>';
                        }
                    }
                    else
                    {
                        echo "No such user";
                    }
                }
            }
            else
            {
                echo "0 data";
            }
        }
    }

    
    