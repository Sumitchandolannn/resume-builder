<?php
include("cret.php");
session_start();


if(isset($_SESSION["email"])) {
$email = $_SESSION["email"];
//echo $email;
$sql= "SELECT * from resume_data where email='$email'";
$result=mysqli_query($conn,$sql);
//echo  "<pre>";print_r($result); die;
if(mysqli_num_rows($result)>0) {
    $row=mysqli_fetch_assoc($result);
   // echo  "<pre>";print_r($row); die;
  }
} else{
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
    
</head>

<body>
    
    <div  class="container" id="cv-form-container" >
        <h1 class="text-center my-2">Resume Generator</h1>
        <p class="text-center">GENERATING RESUME MADE EASY</p>
<form  method="POST" action="generate-resume.php">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Personal Details</h3>
                <div class="from group">
                    <label for="nameField" >Name</label>
                    <input type="text" id="nameField" name="name" placeholder="Enter your name here" class="form-control"  value="<?php echo $row["name"] ; ?>">
                    <div class="error-message" id="name-error"></div>
                </div>
                <div class="from group mt-2">
                    <label for="emailField">Email</label>
                    <input type="text" id="emailField" name="email" placeholder="Enter your email address here" class="form-control" value="<?php echo $row["email"] ; ?>">
                    <div class="error-message" id="email-error"></div>
                </div>
                <div class="from group mt-2">
                    <label for="phoneField">Phone No.</label>
                    <input type="text" id="phoneField" name="phone_no" placeholder="Enter your phone.no here" class="form-control" value="<?php echo $row["phone_no"] ; ?>">
                    <div class="error-message" id="phone-error"></div>
                </div>
                <div class="from group mt-2">
                    <label for="addressField">Address</label>
                    <textarea type="text" id="addressField" name="address" placeholder="Enter your address here"
                        class="form-control"><?php echo $row["address"] ; ?></textarea>
                </div>
                <!-- <div class="form-group mt-2">
                    <label for="imageUpload">Select Image</label>
                    <input type="file" id="imageUpload"  accept="image/*" class="form-control" onchange="displaySelectedImage(event)">
                </div> -->
                <div class="hobbiesFieldsContainer mt-2">
                    <h3 class="text-center">Hobbies</h3>
                    <div class="hobbies">
                        <input type="text" name="hobbies"placeholder="Enter a hobby" class="form-control hobby-input"value="<?php echo $row["hobbies"] ; ?>">
                        <div class="error-message" id="hobby-error"></div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addHobby()">Add</button>
                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeHobby()">Remove</button>
                </div>
                <div class="mt-2">
                    <h3 class="text-center">Educational Details</h3>
                    <div class="educationalDetailsFieldsContainer">
                        <div class="form-group mt-2">
                            <label for="degreeField">Degree/Course</label>
                            <input type="text" name="degree_course" id="degreeField" placeholder="Enter Degree/course" class="form-control degree-course"value="<?php echo $row["degree_course"] ; ?>">
                            <label for="startDateEducationField">Start Date</label>
                            <input type="date" id="startDateEducationField" name="start_date" placeholder="Start Date" class="form-control start-date-education"value="<?php echo $row["start_date"] ; ?>">
                            <label for="endDateEducationField">End Date</label>
                            <input type="date" id="endDateEducationField"name="end_date" placeholder="End Date" class="form-control end-date-education"value="<?php echo $row["end_date"] ; ?>">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addEducationalDetails()">Add</button>
                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeEducationalDetails()">Remove</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mt-2">
                    <h3 class="text-center">Work Experience</h3>
                    <div class="workExperienceFieldsContainer">
                        <div class="form-group mt-2">
                            <label for="jobTitleField">Job Title</label>
                            <input type="text" id="jobTitleField" name="job_title" placeholder="Job Title" class="form-control job-title" value="<?php echo $row["job_title"] ; ?>">
                            <label for="workProfileField">Work Profile</label>
                            <input type="text" id="workProfileField" name="work_profile" placeholder="Work Profile" class="form-control work-profile" value="<?php echo $row["work_profile"] ; ?>">
                            <label for="startDateField">Start Date</label>
                            <input type="date" id="startDateField" name="job_title_start_date" placeholder="Start Date" class="form-control start-date"  value="<?php echo $row["job_title_start_date"] ; ?>">
                            <label for="endDateField">End Date</label>
                            <input type="date" id="endDateField"  name="job_title_end_date" placeholder="End Date" class="form-control end-date"value="<?php echo $row["job_title_end_date"] ; ?>">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addWorkExperience()">Add </button>
                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeWorkExperience()">Remove</button>
                </div>

                <div class="mt-2">
                    <h3 class="text-center">Projects</h3>
                    <div class="projectFieldsContainer">
                        <textarea type="text" name="project" placeholder="Enter Project Name" rows="2" class="form-control project-name"><?php echo $row["project"] ?></textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addProject()">Add</button>
                        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeProject()">Remove</button>
                    </div>
                </div>

                <div class="mt-2">
                    <h3 class="text-center">Skills</h3>
                    <div class="skillsFieldsContainer">
                        <input type="text" id="skillInput" name="skills" placeholder="Enter Skills" class="form-control skill-input" value="<?php echo $row["skills"] ; ?>">
                        <div class="error-message" id="skill-error"></div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addSkill()">Add</button>
                        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeSkill()">Remove</button>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <!-- <button class="btn btn-primary btn-lg" type="submit">Generate Resume</button> -->
                <input class="btn btn-primary btn-lg" type="submit"  value="Generate Resume"/>
            </div>
    </div>
</form>
    </div>


    <div id="cv-template-container" class="container" style="display: none;">
            <div class="row">
                <div class="col-md-4 text-center mt-5" style="background-color: #333; color: #fff;">
                    <img id="imagePreview" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    style="width: 200px ; border-radius: 50%; margin-top: 20%; border: #fff solid 2px;" />
                    <div class="mt-2">
                        <p id="cv-name">Jatin Jayal</p>
                        <p id="cv-email">jayaljatin07@gmail.com</p>
                        <p id="cv-phone">7906037137</p>
                        <p id="cv-address">Haripur Ratansingh, near Reliance petrol pump, Rampur road, Haldwani</p>
                    </div>
                    <div class="section" id="hobbiesSection">
                        <div>
                            <h2>Hobbies</h2>
                        </div>
                        <ul id="hobbiesList"></ul>
                    </div>
                </div>
                <div class="col-md-8 text-center mt-5">
                    <div class="section" id="educationSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Educational Details</h2>
                        </div>
                        <ul id="educationList">
                                <strong>Degree/Course:</strong> <span class="degree-course">Your Degree</span><br>
                                <strong>School/College:</strong> <span class="school-college">Your School/College</span><br>
                                <strong>Start Date:</strong> <span class="start-date-education">Start Date</span><br>
                                <strong>End Date:</strong> <span class="end-date-education">End Date</span>
                        </ul>
                    </div>
            
                    <div class="section" id="workExperienceSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Work Experience</h2>
                        </div>
                        <ul id="workExperienceList">
                            <strong>Job Title:</strong> <span class="job-title">Your Job Title</span><br>
                            <strong>Work Profile:</strong> <span class="work-profile">Work Profile</span><br>
                            <strong>Start Date:</strong> <span class="start-date">Start Date</span><br>
                            <strong>End Date:</strong> <span class="end-date">End Date</span>
                        </ul>
                    </div>

                    <div class="section" id="projectsSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Projects</h2>
                        </div>
                        <ul id="projectsList"></ul>
                    </div>

                    <div class="section" id="skillsSection">
                        <div style="background-color: #333; color: #fff;">
                            <h2>Skills</h2>
                        </div>
                        <ul id="skillsList"></ul>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">
                    <button id="printCvButton" class="btn btn-primary btn-lg" style="">Print Cv</button>
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