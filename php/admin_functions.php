<?php
    include "database_connect.inc.php";

    function getAmbassadors()
    {
        include "database_connect.inc.php";
        $sql="SELECT * FROM `ambassadors`";
        $result=mysqli_query($conn,$sql);
        echo '<table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Registration</th>
                    <th scope="col">Project</th>
                    <th scope="col">Reports</th>
                    <th scope="col">User Info</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $id_user=$row["reg_id"];
                $id=1;
                $status=$row["verified"];
                $string;
                if($status==0)
                {
                    $string="Appove";
                }
                else
                {
                    $string="Appoved";
                }
                $fname=$row["first_name"];
                $lname=$row["last_name"];
                $full_name=$fname." ".$lname;
                $reid=$row["reg_id"];

                echo '<tbody>
                        <tr>
                            <td>'.$id.'</a></td>
                            <td>'.$full_name.'</td>
                            <td><a href="php/approve_user.php?id='.$reid.'">Approve</a></td>
                            <td><a href="admin_see_projects.php?ambassador_id='.$id_user.'">View</a></td>
                            <td><a href="admin_see_reports.php?ambassador_id='.$id_user.'">View</a></td>
                            <td><a href="admin_view_ambassador.php?ambassador_id='.$id_user.'">View</a></td>
                            <td><a href="#">DELETE</a></td>
                        </tr>';
            }
            $id++;
            echo '</tbody>
            </table>';
        }
    }

    function getInitialDetails($value,$id)
    {
        require "database_connect.inc.php";

        $sql="SELECT * FROM `ambassadors` WHERE reg_id='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];
            }
        }
    }

    function getInitialSupDetails($value,$id)
    {
        require "database_connect.inc.php";

        $sql="SELECT * FROM `supervisor` WHERE d='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                return $row["$value"];
            }
        }
    }

    function getReports($value)
    {
        require "database_connect.inc.php";
        $sql="SELECT * FROM `projects` WHERE user_id='$value'";
        $result=mysqli_query($conn,$sql);
        echo '<div class="card mb-3" style="max-width: 600px;">
            <div class="row no-gutters">
            <div class="col-md-4">';
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $name=$row["project_name"];
                $proj_id=$row["project_id"];
                $query="SELECT * FROM `progress` WHERE project_id='$proj_id'";
                $result1=mysqli_query($conn,$query);
                echo '<h3>'.$name.'</h3>';
                if(mysqli_num_rows($result1)>0)
                {
                    while($row1=mysqli_fetch_assoc($result1))
                    {
                        $pic=$row1["pictures"];
                        $vid=$row1["video"];
                        $pdf=$row1["pdf"];
                        $slides=$row1["slides"];
                        $week=$row1["week"];
                        $the_id=$row1["id"];
                        
                        echo '<h3>Week:'.$week.'</h3>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Pictures:&nbsp &nbsp &nbsp<a href="php/img_downloader.php?img='.$the_id.'">Download</a></h5>
                            <h5 class="card-title">Video:&nbsp &nbsp &nbsp<a href="php/img_downloader.php?vid='.$the_id.'">Download</a></h5>
                            <h5 class="card-title">Pdf:&nbsp &nbsp &nbsp<a href="php/img_downloader.php?dowload='.$the_id.'">Download</a></h5>
                            <h5 class="card-title">Slides:&nbsp &nbsp &nbsp<a href="php/img_downloader.php?slide='.$the_id.'">Download</a></h5>
                            <a class="btn btn-danger stretched-link" href="php/delete_report?report='.$the_id.'">Delete</a>
                        </div>
                        </div>
                        </div>
                        </div>';
                    }
                }
                else
                {

                }
            }
        }
        else
        {
            echo '<div class="card mb-3" style="max-width: 600px;">
            <div class="row no-gutters">
            <div class="col-md-4">
            <h3>Projects</h3>
            
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">No project reports</h5>
                
            </div>
            </div>
        </div>
    </div>';
        }
    }

    function getProjects($value)
    {
        require "database_connect.inc.php";
        $sql="SELECT * FROM `projects` WHERE user_id='$value'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $name=$row["project_name"];
                $desc=$row["project_description"];
                $status=$row["status"];
                $id=$row["project_id"];
                $string;
                if($status==0)
                {
                    $string="In Progress";
                }
                else
                {
                    $string="Complete";
                }
                echo '<div class="row no-gutters">
                <div class="col-md-4">
                
                <a hfref="#">
                    <div class=""><i style="font-size:130px;" class="fa fa-folder-open"></i></div>
                </a>
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>Project Name:</strong>&nbsp'.$name.'</h5>
                    <h5 class="card-title"><strong>Project Description:</strong>&nbsp'.$desc.'</h5>
                    <h5 class="card-title"><strong>Status:</strong>&nbsp'.$string.'</h5>
                    <a class="btn btn-danger" href="php/delete_project.php?id='.$id.'">Delete</a>
                </div>
                </div>
            </div>';

            }
        }
    }

    function getSupervisors()
    {
        include "database_connect.inc.php";
        $sql="SELECT * FROM `supervisor`";
        $result=mysqli_query($conn,$sql);
        echo '<table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Fast Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">View</th>
                    <th scope="col">Action</th>
                    
                </tr>
                </thead>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $id_user=$row["d"];
                $id=1;
                
                $fname=$row["first_name"];
                $lname=$row["last_name"];
                $full_name=$fname." ".$lname;
                $email=$row["email"];

                echo '<tbody>
                        <tr>
                            <td>'.$id.'</a></td>
                            <td>'.$fname.'</td>
                            <td>'.$lname.'</td>
                            <td>'.$email.'</td>
                            <td><a href="admin_see_supervisor.php?ambassador_id='.$id_user.'">View</a></td>
                            <td><a class="btn btn-danger" href=php/delete_supervisor.php?id='.$id_user.'">Delete</a></td>
                            
                        </tr>';
            }
            $id++;
            echo '</tbody>
            </table>';
        }
    }
