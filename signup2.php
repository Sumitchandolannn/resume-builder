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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        form {
            background-color: #E0F2F1;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #333;
            color: #fff;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #555;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 200px;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h1>Get started</h1>
        <label>Email</label>
        <input type="mail" name="mail" placeholder="example@gmail.com" required>
        <br>
        <br>
        <label>Password</label>
        <input type="password" name="pass" placeholder="Your password" required>
        <br>
        <br>
        <label>Confirm Password</label>
        <input type="text" name="pass3" placeholder="Confirm your password" required>
        <br>
        <!-- <br>
        <label>Captcha:</label>
        <input type="text" name="cpt" placeholder="Enter captcha here" >
        <img src="captcha.php" href="captcha.php" ondragstart="return false;" oncontextmenu="return false;">
        <br> -->
        <input type="submit" name="sign" value="Sign Up">
        <p>Already Registered?</p>
        <input type="button" onclick="goto()" value="Login">
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['mail'];
    $pass1 = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
    $pass2 = filter_input(INPUT_POST, "pass3", FILTER_SANITIZE_SPECIAL_CHARS);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $t1 = "/@yahoo.com/i";
        $t2 = "/@gmail.com/i";
        $t3 = "/@email.com/i";
        $t4 = "/@hotmail.com/i";

        if (preg_match($t1, $mail) || preg_match($t2, $mail) || preg_match($t3, $mail) || preg_match($t4, $mail)) {
            function endsWith($string, $endString)
            {
                $len = strlen($endString);
                if ($len == 0) {
                    return true;
                }
                return (substr($string, -$len) === $endString);
            }
            if (endsWith($mail, "@yahoo.com") || endsWith($mail, "@gmail.com") || endsWith($mail, "@email.com") || endsWith($mail, "@hotmail.com")) {
                if (!empty($pass1) && !empty($pass2)) {
                    if ($pass1 == $pass2) {
                        $hash = password_hash($pass1, PASSWORD_DEFAULT);
                        try {
                            $x = "insert into records(Email,Password)values('$mail','$hash')";
                            if (mysqli_query($conn, $x)) {
                                $sql = "INSERT into resume_data(email) VALUES('$mail')";
                                mysqli_query($conn, $sql);
                                echo "<script>alert('Registration Successful. Please LOGIN');</script>";
                                echo "<script>location='login2.php';</script>";
                            }
                        } catch (mysqli_sql_exception $z) {
                            echo "<h1>Account already exists with this email!! Please Log In</h1>";
                        }
                    } else {
                        echo "<h1>Passwords do not match!!<br>Please register Again</h1>";
                    }
                } else {
                    echo "<h1>All fields required<br>Please register Again</h1>";
                }
            } else {
                echo "<h1>Invalid email<br>Please register Again</h1>";
            }
        } else {
            echo "<h1>Invalid email<br>Please register Again</h1>";
        }
    } else {
        echo "<h1>Invalid email<br>Please register Again</h1>";
    }
}
?>

    </form>
</body>

</html>
<script>
    function goto() {
        location = 'login2.php';
    }
</script>