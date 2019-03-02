<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Date= $_POST['date'];
    $Course= $_POST['course'];
    $Semester= $_POST['semester'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select S.RollNo, S.Name, A.Subject, SB.Name as sub_name from student as S 
    inner join attendance as A on S.RollNo=A.RollNo 
    inner join subject as SB on A.Subject=SB.Code 
    where A.RollNo != 'DUMMY' and A.Date='$Date' and S.Course='$Course' and S.Semester='$Semester'";

    $result_q1=mysqli_query($conn,$q1);
    $final_result_q1=mysqli_fetch_array($result_q1);
    $num=mysqli_num_rows($result_q1);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC | Admin</title>
    <link rel="stylesheet" href="../main/index.css">
    <link rel="shortcut icon" type="image/jpg" href="../main/logo.jpg">

    <!-- user and logout start -->
    <div id="goBack" onclick="window.history.back();">
        <h2 style="text-align:center;margin-top:19px"><< Go Back</h2>
    </div>
    <div id="logout" onclick="javascript:location.href='../main/logout.php'">
        <h2 style="text-align:center;margin-top:19px">Logout</h2>
    </div>
    <div id="user">
        <h2>Admin: <span style="color:green;" ><?php echo $_SESSION['usernameA'] ?></span></h2>
    </div>
    <!-- user and logout end -->

    <div class="title">
        <h1>Student Attendance Record</h1>
        <h2>Date: <?php echo $Date ?></h2>
        <h2><?php echo "$Course | Semester: $Semester"?></h2>
    </div>
    
</head>
<body>  
        <table class="table" cellspacing="5" cellpadding="5">
            <tr>
                <th style="font-size:25px;"> <u>RollNo</u> </th>
                <th style="font-size:25px;"> <u>Name</u> </th>
                <th style="font-size:25px;"> <u>Subject</u> </th>
            </tr>
            <?php
            for($i=0;$i<$num-1;$i++)
            { 
                $final_result_q1=mysqli_fetch_array($result_q1);
                $code= $final_result_q1['Subject'];
                $name= $final_result_q1['sub_name'];
            ?>        
            <tr>
                <td> <?php echo  $final_result_q1['RollNo']; ?> </td>
                <td> <?php echo  $final_result_q1['Name']; ?> </td>
                <td> <?php echo  "$code | $name" ?> </td>
            </tr>

            <?php
            }
            ?>

            </div>
        </table>
</body>
</html>