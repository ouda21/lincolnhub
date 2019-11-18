<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include "../includes/database_connect.inc.php";
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);

    if(isset($_POST["register"]))
    {
        $profile=$_FILES["profile"]["name"];
        $fname=$_POST["firstName"];
        $lname=$_POST["lastName"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $password2=$_POST["password2"];
        $age=$_POST["age"];
        $class=$_POST["class"];

        $target_dir="../profile_pictures/";
        $target_file=$target_dir.basename($_FILES["profile"]["name"]);

        $gName=$_POST["guardianName"];
        $gPhone=$_POST["guardianPhone"];
        $gEmail=$_POST["guardianEmail"];

        $eName=$_POST["emergencyName"];
        $ePhone=$_POST["emergencyPhone"];
        $full_name=$fname." ".$lname;
        if($password !== $password2)
        {
            die("<script>alert password mismatch</script>");
        }
        else
        {
            $checker=$conn->prepare("SELECT * FROM `ambassadors` WHERE email=?");
            $checker->bind_param("s",$email);
            $checker->execute();
            $result=$checker->get_result();
            $user_count=$checker->num_rows;
            if($user_count>0)
            {
                $errors["email"]="Email address is taken";
            }
            else
            {
                $password=md5($_POST["password"]);
                
                $token=bin2hex(random_bytes(50));
                $verified =0;
                $query="INSERT INTO `ambassadors`(`profile_image`,`first_name`, `last_name`, `email`, `password`, `age`, `class`, `guardian_name`, `guardian_phone`, `guardian_email`, `emergency_name`, `emergency_phone`, `token`, `verified`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt=$conn->prepare($query);
                $stmt->bind_param("sssssisssssssi",$profile,$fname,$lname,$email,$password,$age,$class,$gName,$gPhone,$gEmail,$eName,$ePhone,$token,$verified);
                if($stmt->execute())
                {
                    $mail = new PHPMailer(true);
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
                        $mail->addAddress($email, $full_name);     
                        
                        $mail->isHTML(true);                                 
                        $mail->Subject = 'Lincoln Hub Account Verification';
                        $mail->Body    = 'Thank you for taking your time to register with <a href="http://localhost/lincolnhub/register.php">Lincoln Hub</a><br>
                        Kindly verify your account by clicking on the following link <a href="http://localhost/lincolnhub/login.php">'.$token.'</a>
                        <br><br>
                        Warm Regard,<br>
                        Lincoln Hub Team';
                        $mail->AltBody = 'Testing the mailer system';
                    
                        $mail->send();
                        if(move_uploaded_file($_FILES["profile"]["name"],$target_dir.$profile))
                        {
                            echo '<script type="text/javascript">
                            alert("A verification link was sent to your email address");
                            window.location=\'../login.php\';</script>';
                        }
                        else
                        {
                            die("Error:".mysqli_stmt_error($stmt));
                        }
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    } 
                }
                else
                {
                    $error=$conn->errno ." ".$conn->error;
                    echo $error;
                }
            }
        }
    }