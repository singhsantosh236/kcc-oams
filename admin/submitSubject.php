<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Code= $_POST['code'];
    $Name= $_POST['name'];
    $Course= $_POST['course'];
    $Semester= $_POST['semester'];
    $Faculty= $_POST['faculty'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="insert into subject(Code,Name,Course,Semester,Faculty) value('$Code','$Name','$Course','$Semester','$Faculty')";

    mysqli_query($conn,$q1);

    mysqli_close($conn);
    header('location:http://localhost/ams/admin/addSubject.php');

?>