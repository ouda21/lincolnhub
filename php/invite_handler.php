<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include "../includes/database_connect.inc.php";
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);
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

    if(isset($_POST["supervisor_invite"]))
    {
        $name=$_POST["full_name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $occupation=$_POST["occupation"];
        $invited_by=$_SESSION["id"];

        $sql="INSERT INTO `supervisor_invitation`(`full_name`, `email`, `phone`, `occupation`, `invited_by`) VALUES ('$name','$email','$phone','$occupation','$invited_by')";
        if(mysqli_query($conn,$sql))
        {   
            
            try {
                        
                $mail->SMTPDebug = 0;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                   
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'ouda.wycliffe@gmail.com';                     
                $mail->Password   = '??Dadi??2';                              
                $mail->SMTPSecure = 'tls';        
                $mail->Port       = 587;                                    
            
                
                $mail->setFrom('ouda.wycliffe@gmail.com', 'Ouda Demo');
                $mail->addAddress($email, $name);     
                
                $mail->isHTML(true);                                 
                $mail->Subject = 'Lincoln Hub Supervisor Invitation';
                $mail->Body    = 'You are receiving this email because you were invited by one of our ambassadors<br>
                                    To be their supervisor. Kindly follow this link to set up your account <a href="http://localhost/lincolnhub/supervisor_register.php">Register</a><br>
                                    If you already have a supervisor account,kindly <a href="http://localhost/lincolnhub/supervisor_login.php">login</a>
                                    <strong>You can only login using the links. So DO NOT DELETE THIS EMAIL </strong>
                <br><br>
                Warm Regard,<br>
                Lincoln Hub Admin';
                $mail->AltBody = 'Testing the mailer system';
                
                if($mail->send())
                {
                    echo '<script type="text/javascript">
                    alert("Supervisor Invited");
                    window.location=\'../invite_supervisor.php\';</script>';
                }
                else
                {
                    die("Could not send email");
                }
               
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            } 
        }
        else
        {
            die("Error:".mysqli_error($conn));
        }
    }