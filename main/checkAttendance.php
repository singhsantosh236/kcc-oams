<?php

    $roll= $_POST['rollno'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select count(*) as TotalPt from attendance where RollNo='$roll'";
    $q2="select * from student where RollNo='$roll'";
    $q3="select count(date) as TotalCls from attendance where RollNo='DUMMY'";

    $result_q1=mysqli_query($conn,$q1);
    $final_result_q1= mysqli_fetch_array($result_q1);

    $result_q2=mysqli_query($conn,$q2);
    $final_result_q2= mysqli_fetch_array($result_q2);

    $result_q3=mysqli_query($conn,$q3);
    $final_result_q3= mysqli_fetch_array($result_q3);

    $roll = $final_result_q2['RollNo'];
    $name =$final_result_q2['Name'];
    $course = $final_result_q2['Course'];
    $sem = $final_result_q2['Semester'];
    $totalP = $final_result_q1['TotalPt'];
    $totalC = $final_result_q3['TotalCls'];
    $total0 = ($totalP/$totalC)*100;
    $total1 = (int)$total0;

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC</title>
    <link rel="shortcut icon" type="image/jpg" href="logo.jpg">
    <link rel="stylesheet" type="text/css" href="index.css">
    <div id="goBack" onclick="window.history.back();">
        <h2 style="text-align:center;margin-top:19px"><< Go Back</h2>
    </div>
</head>
<body>
    <img src="logo.jpg">

    <!-- student detail area start-->
    <div class="form">
            <h1>RollNo: <?php echo $roll; ?> </h1>
            <h1>Name: <?php echo $name; ?> </h1>
            <h2>Course: <?php echo $course;  ?> </h2>
            <h2>Semester: <?php echo $sem; ?> </h2>
            <h2>Present / Total Class: <?php echo "$totalP / $totalC"; ?> </h2>
            <h1>Attendance: <?php echo $total1; ?>%</h1>
    </div>
    <!-- student detail area end -->

</body>
</html>