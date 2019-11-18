<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8"> 
            <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
            <meta name="description" content="LincolnHub Login">
            <meta name="keywords" content="">
            <meta name="author" content="Ouda Wycliffe">

            <title>LincolnHub/LogIn</title>
            
            <link rel="stylesheet" href="css/signup.css">
            <link rel="stylesheet" href="css/main.css">
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
                    <li class="logo"><a href="#"><img src="img/lincoln_logo.png" alt="" class="white"><img src="img/lincoln_logo.png" alt="" class="black"></a></li>
                </ul>
            </nav>
        </header>
        <hr class="text-center ">
        <div class="container">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Sign In</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="php/signin.php">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter an email address.
                                    </div>
                                    
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="password" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter password.
                                    </div>
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox">Remember Me
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" value="Login" class="text-center btn btn-primary login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links">
                                Don't have an account?<a href="register.php">Sign Up</a>
                                
                            </div>
                            <div class="d-flex justify-content-center links">
                                Click here to login as a <a href="supervisor_login.php">Supervisor</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="#">Forgot your password?</a>
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