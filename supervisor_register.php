<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8"> 
            <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
            <meta name="description" content="LincolnHub Login">
            <meta name="keywords" content="">
            <meta name="author" content="Ouda Wycliffe">

            <title>LincolnHub/LogIn</title>
            
            <link rel="stylesheet" href="css/register.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <!--fonts-->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Cantarell|Open+Sans|Roboto&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Cantarell|El+Messiri|Open+Sans|Roboto&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Cantarell|El+Messiri|Frijole|Open+Sans|Roboto&display=swap" rel="stylesheet">
        </head>
        <body>
        <header class="header">
            <nav class="nav">
                <ul>
                    <li class="logo"><a href="#"><img src="img/lincoln_logo.png" alt=""></a></li>
                </ul>
            </nav>
        </header>
        <hr class="text-center ">
        <div class="container">
                <div class="d-flex justify-content-center h-100">
                <div class="valid-feedback">
                                        Registration Successful
                                    </div>
                                    <div class="invalid-feedback">
                                        Registration failed
                                    </div>
                    <div class="card" id="card">
                    
                    <div className="col-md-6">
                            <form class="needs-validation" novalidate method="POST" action="php/handle_supervsor_info.php" enctype="multipart/form-data">
                                <div className="card card-body text-center"><h4 class="text-ccenter">Ambassador Registration</h4></div>
                                <hr>
                                <div className="form-row">
                                <span className="form-group col-md-6">
                                <input type="file" style="margin-top:20px;margin-bottom:15px;" id="fname" name="profile" class="form-control" placeholder="Profile picture" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a profile picture.
                                    </div>
                                    <input type="text" style="margin-top:20px;margin-bottom:15px;" id="fname" name="fname" class="form-control" placeholder="First Name" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a first name.
                                    </div>
                            
                                    <input type="text" style="margin-top:20px;margin-bottom:15px;" id="lname" name="lname" class="form-control" placeholder="Last Name" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a last name.
                                    </div>
                                </span>
                                <div className="form-group col-md-6">
                                    <input style="margin-top:20px;margin-bottom:15px;" type="text" id="email" name="email" class="form-control" placeholder="Email" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose an email address.
                                    </div>
                                </div>
                                </div>
                                <div className="form-row">
                                <span className="form-group col-md-6">
                                    <input type="password" style="margin-top:20px;margin-bottom:15px;" id="pass1" name="password" class="form-control" placeholder="Password" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a password.
                                    </div>
                                    
                                </span>
                                
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="register_supervisor" value="Register" class="text-center btn btn-primary login_btn">
                                </div>
                            </form>
                            </div>
                            <div class="card-footer">
                            <div class="d-flex justify-content-center links">
                                Already a memeber?<a href="supervisor_login.php">Login</a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text text-center">
                <h2>Educate, 
                    Stimulate,Inspire
                </h2>
            </div>
            <hr class="text-center ">
            <ul class="social-icons list-inline">
                    <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i> </a></li>
                </ul>
        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin=" anonymous"></script>
        <script src="js/main.js"></script>
        <script src="js/validator.js"></script>
    </body>
</html>