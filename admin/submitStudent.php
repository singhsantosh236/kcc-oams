<?php
    
    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $RollNo= $_POST['rollno'];
    $Name= $_POST['name'];
    $Course= $_POST['course'];
    $Semester= $_POST['semester'];
    $Mobile= $_POST['mobile'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="insert into student(RollNo,Name,Course,Semester,Mobile) value('$RollNo','$Name','$Course','$Semester','$Mobile')";

    mysqli_query($conn,$q1);

    mysqli_close($conn);
    header('location:http://localhost/ams/admin/addStudent.php');

?>