<?php
    include "php/functions.php";
?>
<!DOCTYPE html>
    <html lang ="en">
        <head>
            <title>LincolnHub |Supervisor View Projects</title>
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
                        <li><a href="supervisor_view.php"><span>01.</span>View Reports</a></li>
                        <li><a href="supervisor_final_approval.php"><span>02.</span>Approve Reports</a></li>
                        <li><a href="supervisor_profile"><span>05.</span>Profile</a></li>
                        <li><a href="#"><span>06.</span>Log Out</a></li>
                        
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
                            <h3 class="text-center">Supervisor's Menu</h3>
                        </div>

                        <ul class="list-unstyled components">
                            <p class="text-cenetr"> Menu</p>
                            <hr class="text-center line">
                            <div class="image-holder">
                            <img src="profile_pictures/787552.jpg" alt="" class="img-thumbnail">
                            <button style="margin:auto" type="button" class="btn btn-primary">Full Name</button>
                            </div>
                            <li>
                                <a href="supervisor_view.php">View Reports</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="supervisor_final_approval.php">Approve Reports</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="supervisor_profile.php">Profile</a>
                            </li>
                            <hr class="text-center line">
                            <li>
                                <a href="send_report.php">Log Out</a>
                            </li>
                            <hr class="text-center line">
                        </ul>
                    </nav>
                    <div class="vl"></div>
                    
                    <span class="border-left form-container">
                    <h3 style="margin-bottom:30px;text-decoration:underline;">Repotrs on: </h3>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive-md">
                                    <?php echo getTableData() ?>
                                </div>
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