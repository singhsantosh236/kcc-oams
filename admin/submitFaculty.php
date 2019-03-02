<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Name= $_POST['name'];
    $Qualification= $_POST['qualification'];
    $Department= $_POST['department'];
    $Mobile= $_POST['mobile'];
    $UserID= $_POST['userid'];
    $Password= $_POST['password'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="insert into faculty(Name,Qualification,Department,Mobile,UserID,Password) value('$Name','$Qualification','$Department','$Mobile','$UserID','$Password')";

    mysqli_query($conn,$q1);

    mysqli_close($conn);
    header('location:http://localhost/ams/admin/addFaculty.php');

?>