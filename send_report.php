<?php

    include "includes/database_connect.inc.php";
    error_reporting(false);
    session_start();
    if(!isset($_SESSION["fname"]) || !isset($_SESSION["lname"]))
    {
        $_SESSION["fname"];
        $_SESSION["lname"];
        $full_name=$_SESSION["fname"]." ".$_SESSION["lname"];
    }
    $id=$_GET["project_id"];
    
    $sql="SELECT * FROM `projects` WHERE project_id='$id'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $start=date_create($row["start_date"]);
            $end=date_create($row["end_date"]);
            $week=date_diff($start,$end);
            $week=round($week%7);

        
    
?>
<!DOCTYPE html>
    <html lang ="en">
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="LincolnHub Login">
            <meta name="keywords" content="">
            <meta name="author" content="Ouda Wycliffe">
            <!--<Main CSS-->
            
            <link rel="stylesheet" href="css/main.css">
            
            <!--Bootstrap-->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="MDB-Free/mdb.css">
            <link rel="stylesheet" href="MDB-Free/style.css">
            <link rel="stylesheet" href="MDB-Free/mdb.lite.css">
            <link rel="stylesheet" href="MDB-Free/mdb.lite.min.css">
            <!--Google fonts-->
            <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
            <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet"> 

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <header class="header">
                <nav class="nav">
                    <ul>
                        
                        <li class="logo"><img src="img/lincoln_logo.png" alt="Ouda Logos" class="white"><img src="img/lincoln_logo.png" alt="Ouda Logos" class="black"></a></li>
                        
                    </ul>

                    <a class="nav-icon" href="javascript:void(0);"><span></span><span></span><span></span></a>
                </nav>
            </header>
            <div style="height:500px;"></div>
            <div class="full-nav">
                <div class="logo"><a href="#"><img src="img/lincoln_logo.png"></a></div>
                <nav class="nav2">
                    <ul>
                        <li><a href="create_project.php"><span>01.</span>Create Project</a></li>
                        <li><a href="invite_supervisor.php"><span>02.</span>Invite Supervisor</a></li>
                        <li><a href="myprojetcs"><span>03.</span>My Projects</a></li>
                        <li><a href="ambassador_profile.php"><span>04.</span>Profile</a></li>
                        <li><a href="php/ambassador_logout.php"><span>05.</span>Log Out</a></li>
                        
                    </ul>
                </nav>
                <ul class="social-icons list-inline">
                    <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i> </a></li>
                </ul>

                <div class="corner-circle">
                    <a href="javascript:void(0);" class="nav-close"><span></span><span></span></a>
                </div>

            </div>
            <main>
                <div class="wrapper">
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3 class="text-center">Ambassador Menu</h3>
                        </div>

                        <ul class="list-unstyled components">
                            <p class="text-cenetr"> Menu</p>
                            <hr class="text-center line">
                            <div class="image-holder">
                            <?php echo'<img style="height:300px" src="profile_pictures/'.$_SESSION["profile"].'" alt="" class="img-thumbnail">' ?>
                            <a href="ambassador_profile.php" style="margin-left:180px; margin-bottom:20px;" type="button" class="btn btn-primary"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></a>
                            </div>
                            <li>
                                <a href="create_project.php">Create Project</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="invite_supervisor.php">Invite Supervisor</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="myprojects.php">My Projects</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="ambassador_profile.php">Profile</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="php/ambassador_logout.php">Log Out</a>
                            </li>
                            
                        </ul>
                    </nav>
                    <div class="vl"></div>
                    
                    <span class="border-left form-container">
                    <h3 style="margin-bottom:30px;text-decoration:underline;">Send Weekly Report</h3>
                        <div class="row">
                            <div class="col">
                                <form action="php/reports.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="project_id" value="<?php echo $id?>">
                                    <div class="form-group" >
                                    <label style="text-align:left" for=" name">Week Number</label>
                                    <input type="text"  name="week_number" class="form-control form-control-lg" value="<?php echo $week=round($week%7);?>"required readonly>
                                    
                                    <div class="custom-file" style="width:60%;height:50px;margin-bottom:15px;">
                                        <input type="file"  name="pictures" class="custom-file-input form-control form-control-lg" id="inputGroupFile01">
                                        <label  class="custom-file-label" for="inputGroupFile01">Choose Pictures</label>
                                    </div>
                                    
                                    <div class="custom-file" style="width:60%;height:50px;margin-bottom:15px;">
                                        <input type="file" name="video" class="custom-file-input form-control form-control-lg" id="inputGroupFile01">
                                        <label  class="custom-file-label" for="inputGroupFile01">Choose Video file</label>
                                    </div>
                                    <div class="custom-file" style="width:60%;height:50px;margin-bottom:15px;">
                                        <input type="file" name="pdf" class="custom-file-input form-control form-control-lg" id="inputGroupFile01">
                                        <label  class="custom-file-label" for="inputGroupFile01">Choose PDF or Word</label>
                                    </div>
                                    
                                    <div class="custom-file" style="width:60%;height:50px;margin-bottom:15px;">
                                        <input style="height:50px;" name="slides" type="file" class="custom-file-input form-control form-control-lg" id="inputGroupFile01">
                                        <label  class="custom-file-label" for="inputGroupFile01">Choose Slides</label>
                                    </div>
                                    </div>
                                    <button type="submit"  name="attach" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </span>
                </div>
            </main>
            <hr class="text-center" style="margin-top:120px;">
            <ul class="social-icons list-inline">
                    <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i> </a></li>
                </ul>
            
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="MDB-Free/js/mdb.js"></script>
            <script src="js/main.js"></script>

        </body>
    </html>

    <?php

       

        }
    }

?>