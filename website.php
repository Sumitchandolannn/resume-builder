<?php
include("cret.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="facebook-domain-verification" content="wzk7a93j8hy9oe07zw2oxj5x85id7m" />
    <meta charset="utf-8">
    <title>Resume Generator</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&amp;display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <style>
        header {
            background-color: #225ff9;
            width: 1600px;
            position:fixed;
            margin-top: -8px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo img {
            max-width: 1000px;
        }

        .nav-list {
            list-style: none;
            display: flex;  `
        }

        .nav-list li {
            margin-right: 20px;
        }

        .nav-list li:last-child {
            margin-right: 0;
        }

        .nav-list a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }


        /* Add responsive CSS for smaller screens */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-list {
            margin-top: 10px;
            }

            .nav-list li {
            margin-right: 0;
            margin-bottom: 10px;
            }
        }

    .container {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Style the content section */
    .content {
        flex: 1;
        padding: 20px;
        background-color: #fff;
    }

    .content h2 {
        font-size: 30px;
        margin-bottom: 10px;
        font-family: 'Times New Roman';
    }

    .content h5 {
        font-size: 18px;
        margin-bottom: 10px;
        font-family: 'Times New Roman';
    }

    /* Style the image section */
    .image {
        flex: 1;
        padding: 20px;
    }

    .image img {
        max-width: 100%;
         height: auto;
        display: block;
    }

    .form-group {
    margin-bottom: 20px;
}

label {
    font-family: 'Times New Roman';
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

textarea {
    height: 150px;
}

button[type="submit"] {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: grab;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #555;
}
button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: grab;
    font-size: 16px;
    size: 300px;
}

button:hover {
    background-color: #555;
}
.b1[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: grab;
            font-size: 16px;
        }

        .b1[type="submit"]:hover {
            background-color: #555;
        }

        .b1 {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            size: 300px;
        }

        .b1:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1 style="font-size: 30px; font-weight: 1500; color: #333;">Resume Generator</h1>
            </div>
            <ul class="nav-list">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <button style="margin-left: 100px;" onclick="goto1()">Log In</button>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <br>
    <section id="home" class="section">
        <div class="container">
            <div class="content">
                <h2>Generate your Resume within seconds!</h2>
                <h5>Resume Generator, generating Resume made easy.</h5>
                <p>Created to be suitable for all levels of job seekers. Our host of powerful features ranges from an excellent spell-checker, 
                to job tracking, multi-format export, auto-generated summaries and more.</p>
                <br>
                <h5>Main Features</h5>
                <ul>
                    <li>Generate Resume with in no time</li>
                    <li>Easy to use</li>
                    <li>Download your resume in one click</li>
                    <li>Professional Format</li>
                </ul>
                <br>
                <br>
                <br>
                <button onclick="goto()">Sign Up for free today!</button>
            </div>
            <div class="image">
                <img src="resume5.jpeg" alt="Sample Image">
            </div>
        </div>
        <br>
        <br>
        <br>
    </section>
    <section id="about" class="section">
        <div class="container">
            <div class="image">
                <img src="resume6.jpeg" alt="Sample Image" style="height: 500px; width: 800px;">
            </div>
            <div class="content">
                <h2>About Us</h2>
                <h5>Helping you to get your dream job</h5>
                <p>Getting that dream job can seem like an impossible task. We’re here to change that. Give yourself a real advantage with the best online resume maker: 
                created by experts, improved by data, trusted by millions of professionals.</p>
                <h5>Customization made simple</h5>
                <p>Fine-tune your resume for a specific job with ease. We help you turn a generic document into a cutting-edge instrument that wins interviews.
                Transform universal resumes into perfect sales pitches with a few key-strokes.</p>
                <h5>Make a resume that wins interviews</h5>
                <p>Use our resume maker with its advanced creation tools to tell a professional story that engages recruiters,
                 hiring managers and even CEOs.</p>
                <br>
                <br>
                <br>
                <button onclick="goto()">Sign Up for free today!</button>
            </div>
        </div>
    </section>
    <br>
        <br>
        <br>
    <section id="contact" class="section">
        <div class="container">
            <div class="content">
                <h2>Get in touch with us!</h2><br>
                <form id="contactForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="n1" required="required" placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="m1" required="required" placeholder="johndoe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="t1" required="required" placeholder="Enter your message here"></textarea>
                    </div>
                    <!-- <button type="submit">Submit</button> -->
                    <input type="submit" class="b1" value="Submit">
                </form>
            </div>
            <div class="image">
                <img src="resume7.jpeg" alt="Image">
            </div>
        </div>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nm = filter_input(INPUT_POST, "n1", FILTER_SANITIZE_SPECIAL_CHARS);
        $em = filter_input(INPUT_POST, "m1", FILTER_SANITIZE_SPECIAL_CHARS);
        $tx = filter_input(INPUT_POST, "t1", FILTER_SANITIZE_SPECIAL_CHARS);
        $t1 = "/@yahoo.com/i";
        $t2 = "/@gmail.com/i";
        $t3 = "/@email.com/i";
        $t4 = "/@hotmail.com/i";
        //preg_match checks if some charachter exist in a string
        if (preg_match($t1, $em) || preg_match($t2, $em) || preg_match($t3, $em) || preg_match($t4, $em)) {
            function endsWith($string, $endString)
            {
                $len = strlen($endString);
                if ($len == 0) {
                    return true;
                }
                return (substr($string, -$len) === $endString);
            }
            if (endsWith($em, "@yahoo.com") || endsWith($em, "@gmail.com") || endsWith($em, "@email.com") || endsWith($em, "@hotmail.com")) {
                $querry = "CREATE TABLE IF NOT EXISTS `dabse2`.`feedback10` (`name` VARCHAR(100) NOT NULL , `mail` VARCHAR(50) NOT NULL , `feedback` VARCHAR(5000) NOT NULL ) ENGINE = InnoDB";
                mysqli_query($conn, $querry);
                $z = "insert into feedback10(name,mail,feedback)values('$nm','$em','$tx')";
                if (mysqli_query($conn, $z)) {
                    echo '<script language="javascript">';
                    echo 'alert("Response Submitted!! We will get in touch shortly")';
                    echo '</script>';
                }
            } else {
                echo '<script language="javascript">';
                echo 'alert("Please Enter Valid Mail")';
                echo '</script>';
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Please Enter Valid Mail")';
            echo '</script>';
        }
    }
    ?>
    


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Smooth scroll to sections when clicking on navbar links
        const navLinks = document.querySelectorAll(".nav-list a");

        navLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                const targetId = this.getAttribute("href").substring(1);
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - 50, // Adjust as needed
                        behavior: "smooth",
                    });
                }
            });
        });
    });

    function goto(){
        location='signup2.php';
    }

    function goto1(){
        location='login2.php';
    }

    </script>
</body>
</html>