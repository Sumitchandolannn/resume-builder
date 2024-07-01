<?php
    include("cret.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="mail"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h1>Reset your password</h1>
    <p>Enter your email to receive a link to reset your password</p>
    <label>Email address</label>
    <input type="mail" name="mail" placeholder="example@gmail.com" required><br>
    <!-- <input type="submit" name="sub" value="Send password reset email"><br> -->
    <input type="submit" name="sub" value="Recover Passwrod"><br>
    Or<br>
    <input type="button" onclick="goto()" value="Login">
    </form>
</body>
</html>
<script>
    function goto(){
        location='login2.php';
    }
</script>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($x,$token){
    $mail = new PHPMailer(true);                 
    $mail->isSMTP();                      
    $mail->SMTPAuth   = true;           
    $mail->Host       = 'smtp.gmail.com';           
    $mail->Username   = 'identitiesyt@gmail.com';  
    $mail->Password   = '';  
    $mail->SMTPSecure ="tls";

    $mail->setFrom('identitiesyt@gmail.com', 'User');
    $mail->addAddress($x);  
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password';
    $email_template="
        <h2>Hello</h2>
        <h3>You are receiving this email cause we have recieved a password reset request for your account</h3>
        <br></br>
        <a href='http://localhost/PROJECTPSL/newpass.php?token=$token&email=$x'>Click Here</a>
    ";
    $mail->Body=$email_template;
    $mail->send();    
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(filter_var( $_POST['mail'] ,FILTER_VALIDATE_EMAIL)){
        //bin2hex is used to generate random hexamdeciaml string of lenght 10(10byte* 2 hex charchter per byte)
        $email=$_POST['mail'];
        $token=bin2hex(random_bytes(10));
        $check_mail="SELECT Email FROM records WHERE Email='$email'";
        $a=mysqli_query($conn,$check_mail);
        if(mysqli_num_rows($a)>0) {
            $row=mysqli_fetch_assoc($a);
            $x=$row["Email"];
            $update_token="UPDATE records SET Token='$token' WHERE Email='$email'";
            $b=mysqli_query($conn,$update_token);
            if($b){
                // echo $x;
                send_password_reset($x,$token);
                echo"<p>We emailed you the password reset link</p>";
                header("Location: newpass.php");
            }
            else{
                echo"<p>Something went wrong</p>";        
            }
            }
            else{
                echo"<p>No such record found</p>";
            }
        }
    else{
        echo"<p>Enter valid email!!</p>";
    }    
}

?>