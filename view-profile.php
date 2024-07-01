<?php
include("cret.php");
session_start();


if(isset($_SESSION["email"])) {
$email = $_SESSION["email"];
$sql= "SELECT * from resume_data where email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0) {
    $row=mysqli_fetch_assoc($result);
   // echo $row["name"];

}    

}else{
    header("Location: login2.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ebe7e7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            font-weight: bold;
            font-size: 30px;
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
        }

        .my-2 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .text-secondary {
            color: #888;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #555;
        }

        .btn-danger {
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .row {
            margin-top: 20px;
        }


        /* Styling for the Objective, Academic Qualifications, Work Experience, and Skills sections */
        .section {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-top: 20px;
        }

        .section-label {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }

        .add-remove-buttons {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-remove-buttons button {
            padding: 5px 10px;
        }

        /* Additional custom styling for responsiveness on smaller devices */
        @media (max-width: 767px) {
            .container {
                padding: 10px;
            }

            .important-links input {
                max-width: none; 
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script>
        function printInfo(){
            window.print()
        }

</script>
    
</head>

<body> 
<div id="cv-template-container" class="container">
            <div class="row">
                <div class="col-md-4 text-center mt-5" style="background-color: #333; color: #fff;">
                    <img id="imagePreview" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    style="width: 200px ; border-radius: 50%; margin-top: 20%; border: #fff solid 2px;" />
                    <div class="mt-2">
                        <p id="cv-name"><?php echo $row["name"] ?></p>
                        <p id="cv-email"><?php echo $row["email"] ?></p>
                        <p id="cv-phone"><?php echo $row["phone_no"] ?></p>
                        <p id="cv-address"><?php echo $row["address"] ?></p>
                    </div>
                    <div class="section" id="hobbiesSection">
                        <div>
                            <h2>hobbies</h2>
                        </div>
                        <ul id="hobbiesList"><?php echo $row["hobbies"] ?></ul>
                    </div>
                </div>
                <div class="col-md-8 text-center mt-5">
                    <div class="section" id="educationSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Educational Details</h2>
                        </div>
                        <ul id="educationList">
                                <strong>Degree/Course:</strong> <span class="degree-course"><?php echo $row["degree_course"] ?></span><br>
                                <!-- <strong>School/College:</strong> <span class="school-college"></span><?php echo $row["school_college"] ?><br> -->
                                <strong>Start Date:</strong> <span class="start-date-education"><?php echo $row["start_date"] ?></span><br>
                                <strong>End Date:</strong> <span class="end-date-education"><?php echo $row["end_date"] ?></span>
                        </ul>
                    </div>
            
                    <div class="section" id="workExperienceSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Work Experience</h2>
                        </div>
                        <ul id="workExperienceList">
                            <strong>Job Title:</strong> <span class="job-title"><?php echo $row["job_title"] ?></span><br>
                            <strong>Work Profile:</strong> <span class="work-profile"><?php echo $row["work_profile"] ?></span><br>
                            <strong>Start Date:</strong> <span class="start-date"><?php echo $row["job_title_start_date"] ?></span><br>
                            <strong>End Date:</strong> <span class="end-date"><?php echo $row["job_title_end_date"] ?></span>
                        </ul>
                    </div>

                    <div class="section" id="projectsSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Projects</h2>
                        </div>
                        <ul id="projectsList"><?php echo $row["project"] ?></ul>
                    </div>

                    <div class="section" id="skillsSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Skills</h2>
                        </div>
                        <ul id="skillsList"><?php echo $row["skills"] ?></ul>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">
                    <button id="printCvButton" class="btn btn-primary btn-lg" style="" onclick="printInfo()">Print Cv</button>
                </div>
            </div>
    </div>
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>