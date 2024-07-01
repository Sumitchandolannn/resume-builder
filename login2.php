<?php 
    include("cret.php");
	session_start();
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
            background-color: #E0F2F1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #555;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h1>Login</h1>
        <label>Email</label>
        <input type="text" name="inp" placeholder="johndoe@example.com" required><br>
        <label>Password</label>
        <input type="password" name="pass" placeholder="*****" required><br>
        <br>
        <br>
        <br>
        <br>
        <input type="submit" name="sub" value="Login">
        <!-- <a href="passrecover.php">Forgot your password?</a> -->
        <p>Or</p>
        <input type="button" onclick="signu()" value="Create an account">
        <?php
    $id=filter_input(INPUT_POST,"inp",FILTER_SANITIZE_SPECIAL_CHARS);
    $pass=filter_input(INPUT_POST,"pass",FILTER_SANITIZE_SPECIAL_CHARS);
    $id = preg_replace('/\s/', '', $id);
    $pass = preg_replace('/\s/', '', $pass);
    if(!empty($id) && !empty($pass))
    {
        $a="SELECT * FROM records WHERE Email='$id'";
        $result=mysqli_query($conn,$a);
        if(mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
            $x=$row["Email"];
            $y=$row["Password"];
            if (password_verify($pass, $y)){
                $_SESSION["email"] = $x;
                header('Location:index.php');
            }
            else {
                echo "<h1>Incorrect Password</h1>";
            }
            
        }
        else{
            echo "<p>No such record found Please Sign Up!!</p>";
        }
    }
    // else {
    //     echo "<ps>Credentials cannot be Empty</ps>";
    // }
      
?>
    </form>
</body>
</html>
<script>
    function signu(){
        location='signup2.php';
    }
</script>
