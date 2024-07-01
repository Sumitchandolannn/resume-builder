<?php 
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $conn=new mysqli($db_server,$db_user,$db_pass);
    $sql= "CREATE DATABASE IF NOT EXISTS dabse2";
    mysqli_query($conn,$sql);  
    mysqli_close($conn);
    $db_name="dabse2";
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    $sql="CREATE TABLE IF NOT EXISTS `dabse2`.`records` (`Email` VARCHAR(30) NOT NULL , `Password` CHAR(255) NOT NULL, PRIMARY KEY (`Email`)) ENGINE = InnoDB";
   
?>
