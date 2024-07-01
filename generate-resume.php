<?php

session_start();

$db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="dabse2";

$conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);

     if($_SERVER["REQUEST_METHOD"]=="POST"){
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone_no = $_POST["phone_no"];
                $address = $_POST["address"];
                $hobbies =$_POST["hobbies"];
                $degree_course= $_POST["degree_course"];
                $start_date = $_POST["start_date"];
               // print_r($start_date[1]);die;
                //$start_date = $start_date1;
               // print_r($_POST["start_date"]);die;
                $end_date = $_POST["end_date"];
                //$end_date = $end_date[2]-$end_date[1]-$end_date[0];
                $job_title = $_POST["job_title"];
                $work_profile= $_POST["work_profile"];
                $job_title_start_date = $_POST["job_title_start_date"];
                //$job_title_start_date = $job_title_start_date[2]-$job_title_start_date[1]-$job_title_start_date[0];
                $job_title_end_date = $_POST["job_title_end_date"];
                ///$job_title_end_date = $job_title_end_date[2]-$job_title_end_date[1]-$job_title_end_date[0];
                $skills = $_POST["skills"];
                $project = $_POST["project"];

              //  $sql = "INSERT INTO resume_data(name,email,phone_no,address,hobbies,degree_course,start_date,end_date,job_title,work_profile,job_title_start_date,job_title_end_date,skills,project) VALUES('".$name."','".$email."',$phone_no,'".$address."','".$hobbies."','".$degree_course."','$start_date','$end_date','".$job_title."','".$work_profile."','$job_title_start_date','$job_title_end_date','".$skills."','".$project."')";

                $sql = "UPDATE resume_data set name='$name',email='$email', phone_no=$phone_no, address='$address', hobbies='$hobbies' , degree_course='$degree_course' , start_date='$start_date', end_date='$end_date', job_title='$job_title', work_profile='$work_profile' , job_title_start_date='$job_title_start_date' ,job_title_end_date='$job_title_end_date', skills='$skills' , project='$project'    WHERE email='$email'";
                //echo $sql;die;
                try{
                    
                mysqli_query($conn,$sql);
                header("Location: view-profile.php");
                }catch(e){
                    die(e);
                }
                //die($name. $email. $phone_no. $address. $hobbies. $project. $degree_course. $start_Date. $end_date. $job_title. $job_title_start_date. $job_title_end_date. $skills);



     }



?>